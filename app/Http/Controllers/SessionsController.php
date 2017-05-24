<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	public function create()
	{
		return view('sessions.login');
	}

	public function store()
	{
		if ( ! auth()->attempt(request(['email', 'password'])) )
		{
			return back()->withErrors([
				'message' => 'Revisa les dades d\'accés i intenta accedir de nou.'
			]);
		}

		return redirect('/lists');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/login');
	}
}
