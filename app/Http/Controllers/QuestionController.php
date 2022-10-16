<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
	public $question, $answer, $users;

	public function __construct()
	{
		$this->question = new Question;
		$this->answer = new Answer;
		$this->users = new Users;
	}
	// SESSION: questions, currentQuestion
	public function Index(Request $request, $type = null)
	{
		$user = Auth::user();
		if ($type == 'eco') {
			$isEnd = $user->end_test_eco_date;
		} else if ($type == 'build') {
			$isEnd = $user->end_test_build_date;
		}
		if ($isEnd !== NULL) {
			return redirect(route('result'));
		}
		$count = 10;
		session()->put('questions', []);
		session()->put('answers', []);
		$questions = $this->question->getQuestions($type, $count);
		if (count($questions) > 0) {
			$questions[0]->question_answers = $this->answer->getAnswersByQuestionId($questions[0]->id);
			$sessionQuestions = [];
			foreach ($questions as $key => $value) {
				array_push($sessionQuestions, $value->id);
			}
			session()->put('questions', $sessionQuestions);
			session()->put('currentQuestion', 0);
		} else {
			abort(404);
		}
		return view('pages.questions.questions', [
			'type' => $type,
			'question' => $questions[0],
			'currentQuestion' => 0,
			'count' => $count,
			'tutorial' => !isset($_COOKIE['tutorial']) ? true : false
		]);
	}

	public function save(Request $request)
	{
		if ((session()->has('questions') && session()->has('currentQuestion')) && isset($request->currAnswerId)) {
			$user = Auth::user();
			$questions = session()->get('questions');
			$currentQuestion = session()->get('currentQuestion');
			$questionId = $questions[$currentQuestion];
			$answerId = $request->currAnswerId;
			$userId = $user->id;
			$count = 10;
			if (session()->has('answers')) {
				session()->push('answers', [
					'questionId' => $questionId,
					'answerId' => $answerId,
					'userId' => $userId
				]);
			}
			$type = $request->type;
			$currentQuestion++;
			if ($currentQuestion < count($questions)) {
				$question = $this->question->getQuestionById($questions[$currentQuestion]);
				if ($question) {
					$question->question_answers = $this->answer->getAnswersByQuestionId($question->id);
					$res['success'] = 1;
					$res['question'] = view('pages.questions.include.question', [
						'question' => $question,
						'currentQuestion' => $currentQuestion,
						'count' => $count,
					])->render();
					session()->put('currentQuestion', $currentQuestion);
				} else {
					$res['success'] = 0;
					$res['error'] = 'Вопрос не найден';
				}
			} else {
				$answers = session()->get('answers');
				$res['success'] = 2;
				if ($type == 'eco') {
					$isEnd = $user->end_test_eco_date;
				} else if ($type == 'build') {
					$isEnd = $user->end_test_build_date;
				}
				if ($isEnd == NULL) {
					$cntTrueAnswersUser = 0;
					foreach ($answers as $key => $value) {
						$isAnswerTrue = $this->answer->checkIsAnswerTrue($value['answerId']);
						if ($isAnswerTrue->answer_true == 1) {
							$cntTrueAnswersUser++;
						}
						$saveAnswers = $this->answer->saveUserAnswer($value['questionId'], $value['answerId'], $value['userId']);
					}
					if ($saveAnswers) {
						$percentForOneQuestion = round(100 / $count, 3);
						$percent = round($cntTrueAnswersUser * $percentForOneQuestion, 2);
						if ($percent > 99.89) {
							$percent = ceil($percent);
						}
						$this->users->setEndTestDate($user->id, $type, $percent);
						$this->createCertificate($user->last_name . " " . $user->first_name, $user->id, $type);
						if ($percent >= 40 && $percent <= 60) {
							$this->createDiplom($user->last_name, $user->first_name, $user->id, $type, 'III');
						} else if ($percent > 60 && $percent <= 80) {
							$this->createDiplom($user->last_name, $user->first_name, $user->id, $type, 'II');
						} else if ($percent > 80) {
							$this->createDiplom($user->last_name, $user->first_name, $user->id, $type, 'I');
						}
					}
				} else {
					$res['success'] = 0;
					$res['error'] = 'Вы уже прошли данное тестирование';
				}
			}
		} else {
			$res['success'] = 0;
			$res['error'] = 'Ошибка запроса нового вопроса';
		}

		echo json_encode($res, JSON_UNESCAPED_UNICODE);
	}

	public function createCertificate($name, $id, $type)
	{
		// наше изображение
		switch ($type) {
			case 'eco':
				$img = ImageCreateFromJPEG(config('certificate-diplom.ecoCertificate'));
				$userPath = resource_path() . "/users/{$id}/eco/certificate.jpg";
				break;
			case 'build':
				$img = ImageCreateFromJPEG(config('certificate-diplom.buildCertificate'));
				$userPath = resource_path() . "/users/{$id}/build/certificate.jpg";
				break;
			default:
				# code...
				break;
		}

		// определяем цвет, в RGB
		$color = imagecolorallocate($img, 29, 37, 43);

		// указываем путь к шрифту
		$font = config('certificate-diplom.fontBebas');

		imagettftext($img, 100, 0, 820, 1050, $color, $font, $name);
		// 24 - размер шрифта
		// 0 - угол поворота
		// 365 - смещение по горизонтали
		// 159 - смещение по вертикали
		imagejpeg($img, $userPath, 100);
		/*$image = 'templates/images/users/' . $id . '/certificate.jpg';
		$pdf = new Imagick($image);

		$pdf->setImageFormat('pdf');
		$pdf->writeImages('templates/images/users/' . $id . '/certificate.pdf', true);*/
		imagedestroy($img);
	}

	public function createDiplom($lastName, $firstName, $id, $type, $degree)
	{

		switch ($type) {
			case 'eco':
				$image_path = config('certificate-diplom.ecoDiplom');
				$userPath = resource_path() . "/users/{$id}/eco/diplom.jpg";
				break;
			case 'build':
				$image_path = config('certificate-diplom.buildDiplom');
				$userPath = resource_path() . "/users/{$id}/build/diplom.jpg";
				break;
			default:
				# code...
				break;
		}

		$size = getimagesize($image_path); //Узнаем размер изображения
		$imageWidth = (int) $size[0]; // ширина
		$img = ImageCreateFromJPEG($image_path); // наше изображение шаблон
		$color = imagecolorallocate($img, 0, 0, 0); // определяем цвет шрифта, в RGB
		$fontBold = config('certificate-diplom.fontArialBold'); // указываем путь к шрифту жирному
		$font_size = 48; // указываем размер шрифта

		if ($degree == 'II' || $degree == 'I') { // у разных типов диплома немного отличается отступ
			$left = 500;
		} else {
			$left = 488;
		}

		imagettftext($img, $font_size, 0, $left, 685, $color, $fontBold, $degree);

		// текст по центру фамилия
		$box = imagettfbbox($font_size, 0, $fontBold, $lastName);
		$x = ($imageWidth / 2) - ($box[2] - $box[0]) / 2; //по оси x, погрешность 9
		imagettftext($img, $font_size, 0, $x - 9, 1118, $color, $fontBold, $lastName);

		// текст по центру имя отчество
		$box = imagettfbbox($font_size, 0, $fontBold, $firstName);
		$x = ($imageWidth / 2) - ($box[2] - $box[0]) / 2; //по оси x, погрешность 9
		imagettftext($img, $font_size, 0, $x - 9, 1198, $color, $fontBold, $firstName);

		imagejpeg($img, $userPath, 100);

		imagedestroy($img);
	}
}
