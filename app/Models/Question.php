<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Question
{
	public function getQuestions($type, $limit)
	{
		return DB::table('questions')
			->where('question_view', '=', $type)
			->inRandomOrder()
			->limit($limit)
			->get();
	}

	public function getQuestionById($id)
	{
		return DB::table('questions')
			->where('id', '=', $id)
			->first();
	}
}
