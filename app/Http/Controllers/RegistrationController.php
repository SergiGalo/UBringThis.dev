<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class RegistrationController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest')->except(['edit', 'update', 'stats']);
	}

	public function create()
	{
		return view('users.create');
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

	public function edit()
	{
		return view('users.profile');
	}

	public function update(Request $request)
	{
		$name = $request->input('name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');

		if ( $email == auth()->user()->email ){
			$this->validate(request(), [
				'name' => 'required|min:2|max:150',
				'last_name' => 'required|min:2|max:250',
			]);

			$user = User::findOrFail(auth()->user()->id);
			$user->name = $name;
			$user->last_name = $last_name;
			$user->save();
		} else {
			$this->validate(request(), [
				'name' => 'required|min:2|max:150',
				'last_name' => 'required|min:2|max:250',
				'email' => 'required|unique:users|email',
			]);

			$user = User::findOrFail(auth()->user()->id);
			$user->name = $name;
			$user->last_name = $last_name;
			$user->email = $email;
			$user->save();
		}

		return redirect('/profile');
	}

	public function stats()
	{
		return view('users.stats', array('stats' => User::getUserStats()));
	}
}
