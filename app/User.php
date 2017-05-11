<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
		use Notifiable;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
				'name', 'email', 'password',
		];

		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
				'password', 'remember_token',
		];

		public static function getColaboradors($list_id)
		{
			$colaboradors = DB::table('users')->join('colaboradors', 'users.id', '=', 'colaboradors.user_id')
																				->where('colaboradors.list_id', '=', $list_id)
																				->get();
			return $colaboradors;
		}
}
