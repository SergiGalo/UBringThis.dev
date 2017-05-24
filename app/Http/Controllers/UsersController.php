<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lliste;
use App\Producte;
use App\Colaborador;
use App\User;

class UsersController extends Controller
{
	public function searchUser($query)
	{
		$result = DB::table('users')->where('email','like','%'.$query.'%')

		return $result;
	}
}
