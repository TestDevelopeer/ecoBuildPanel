<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('first_name');
			$table->string('patronymic');
			$table->string('last_name');
			$table->string('city');
			$table->string('phone');
			$table->string('social');
			$table->string('school');
			$table->string('class');
			$table->string('teacher_name');
			$table->string('teacher_job');
			$table->string('email');
			$table->string('password');
			$table->string('sex');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
};
