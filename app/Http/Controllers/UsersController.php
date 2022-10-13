<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	public $answers, $questions, $users;

	public function __construct()
	{
		$this->answers = new Answer;
		$this->questions = new Question;
		$this->users = new Users;
	}

	public function Result()
	{
		$user = Auth::user();
		$allAnswers = $this->answers->getAnswersByUserId($user->id);
		$allQuestions = [
			'eco' => [],
			'build' => []
		];
		if (count($allAnswers) > 0) {
			$questions = [];
			foreach ($allAnswers as $key => $value) {
				$question = $this->questions->getQuestionById($value->question_id);
				$question->user_answer_id = $value->asnwer_id;
				$question->question_answers = $this->answers->getAnswersByQuestionId($value->question_id);
				if ($question) {
					array_push($questions, $question);
				}
			}

			if (count($questions) > 0) {
				foreach ($questions as $key => $value) {
					array_push($allQuestions[$value->question_view], $questions[$key]);
				}
			}
		}
		return view('pages.users.result', [
			'allQuestions' => $allQuestions
		]);
	}
}
