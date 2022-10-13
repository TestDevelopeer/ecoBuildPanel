<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Answer
{
	public function getAnswersByQuestionId($questionId)
	{
		return DB::table('answers')
			->where('answer_question_id', '=', $questionId)
			->inRandomOrder()
			->get();
	}

	public function saveUserAnswer($questionId, $asnwerId, $userId)
	{
		return DB::table('user_answers')->insert([
			'question_id' => $questionId,
			'asnwer_id' => $asnwerId,
			'user_id' => $userId
		]);
	}
}
