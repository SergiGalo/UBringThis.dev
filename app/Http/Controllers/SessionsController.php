<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except(['index', 'destroy']);
	}

	public function index()
	{
		return view('sessions.welcomepage');
	}

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

		return redirect('/');
	}
}
