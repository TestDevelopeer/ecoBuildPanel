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

	public function getAnswersByUserId($userId)
	{
		return DB::table('user_answers')
			->where('user_id', '=', $userId)
			->get();
	}

	public function checkIsAnswerTrue($answerId)
	{
		return DB::table('answers')
			->select('answer_true')
			->where('id', '=', $answerId)
			->first();
	}
}
