<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lliste;
use App\Producte;
use App\Colaborador;
use App\User;

class ColaboradorsController extends Controller
{

	public function show($id)
	{
		return view('colaborations.show', array('colaboradors' => User::getColaboradors($id)));
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
			'mail' => 'email'
		]);

		$count = DB::table('users')->where('email', $request->input('mail'))->count();
		$user = DB::table('users')->where('email', $request->input('mail'))->first();

		if ($count != 0)	//L'usuari existeix
		{
			$colaborador = new Colaborador();
			$colaborador->user_id = $user->id;
			$colaborador->list_id = $request->input('list_id');
			$colaborador->save();

			return redirect()->action('LlistesController@show', $request->input('list_id'));
		}
		else
		{
			return back()->withErrors([
				'message' => 'Aquest correu no es correspon amb cap usuari registrat.'
			]);
		}
	}
}
