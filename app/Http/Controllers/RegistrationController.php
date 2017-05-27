<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class RegistrationController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function create()
	{
		return view('registration.create');
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
			'name' => 'required|min:2|max:150',
			'last_name' => 'required|min:2|max:250',
			'email' => 'required|unique:users|email',
			'password' => 'required|min:6|confirmed'
		]);

		$name = $request->input('name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$password = bcrypt($request->input('password'));

		$user = new User();
		$user->name = $name;
		$user->last_name = $last_name;
		$user->email = $email;
		$user->password = $password;
		$user->save();

		auth()->login($user);

		return redirect('/lists');
	}
}
