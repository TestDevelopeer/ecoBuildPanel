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
			$asnwerId = $request->currAnswerId;
			$userId = $user->id;
			if (session()->has('answers')) {
				session()->push('answers', [
					'questionId' => $questionId,
					'asnwerId' => $asnwerId,
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
						'count' => 10,
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
					foreach ($answers as $key => $value) {
						$saveAnswers = $this->answer->saveUserAnswer($value['questionId'], $value['asnwerId'], $value['userId']);
					}
					if ($saveAnswers) {
						$this->users->setEndTestDate($user->id, $type);
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
}