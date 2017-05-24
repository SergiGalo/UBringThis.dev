<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class RegistrationController extends Controller
{
		public function create()
		{
			return view('registration.create');
		}

		public function store()
		{
			$this->validate(request(), [
				'name' => 'required|min:2|max:150',
				'last_name' => 'required|min:2|max:250',
				'email' => 'required|unique:users|email',
				'password' => 'required|min:6|confirmed'
			]);

			$user = User::create(request(['name', 'last_name', 'email', bcrypt('password')]));

			auth()->login($user);

			return redirect('/lists');
		}
}
