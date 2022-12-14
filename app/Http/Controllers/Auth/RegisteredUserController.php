<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Users;

class RegisteredUserController extends Controller
{
	public $users;

	public function __construct()
	{
		$this->users = new Users;
	}

	/**
	 * Display the registration view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		view()->share('title', 'Регистрация | ИСОиП АБИТУРИЕНТ');
		return view('auth.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(Request $request)
	{
		$request->validate([
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'min:8'],
		]);

		$user = User::create([
			'first_name' => $request->first_name,
			'patronymic' => $request->patronymic,
			'last_name' => $request->last_name,
			'city' => $request->city,
			'phone' => $request->phone,
			'social' => $request->social,
			'school' => $request->school,
			'class' => $request->class,
			'teacher_name' => $request->teacher_name,
			'teacher_job' => $request->teacher_job,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'sex' => $request->sex,
			'ip' => $this->users->getIp()
		]);
		if ($user->id) {
			$ecoUserCert = resource_path() . "/users/{$user->id}/eco";
			$buildUserCert = resource_path() . "/users/{$user->id}/build";
			if (!is_dir($ecoUserCert)) {
				mkdir($ecoUserCert, 0777, true);
			}
			if (!is_dir($buildUserCert)) {
				mkdir($buildUserCert, 0777, true);
			}
		}
		event(new Registered($user));

		Auth::login($user);

		echo json_encode(RouteServiceProvider::HOME, JSON_UNESCAPED_UNICODE);
	}
}
