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

	public function create($id)
	{
		return view('colaborations.show', array(
			'colaboradors' => User::getColaboradors($id),
			'list_id' => $id
		));
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
			'mail' => 'email'
		]);

		$list_id = $request->input('list_id');
		$count = DB::table('users')->where('email', $request->input('mail'))->count();
		$user = DB::table('users')->where('email', $request->input('mail'))->first();

		if ($count != 0)	//L'usuari existeix
		{
			$count_colab = DB::table('colaboradors')->where('user_id', $user->id)->where('list_id', $list_id)->count();
			if ($count_colab) {
				return back()->withErrors([
					'message' => 'Aquest usuari ja colabora amb la llista!'
				]);
			} else {
				$colaborador = new Colaborador();
				$colaborador->user_id = $user->id;
				$colaborador->list_id = $request->input('list_id');
				$colaborador->save();

				return redirect()->action('LlistesController@show', $list_id);
			}
		}
		else
		{
			return back()->withErrors([
				'message' => 'Aquest correu no es correspon amb cap usuari registrat.'
			]);
		}
	}

	public function destroy(Request $request)
	{
		$colaboradors = $request->input('colaboradors');
		$list_id = $request->input('list_id');

		DB::table('colaboradors')->where('list_id', $request->input('list_id'))->delete();

		for ($i=0; $i < sizeof($colaboradors); $i++) {
			DB::table('colaboradors')->insert([
				'user_id' => $colaboradors[$i],
				'list_id' => $list_id
			]);
		}

		return redirect('/lists/'.$list_id);
	}
}
