<?php

use Illuminate\Database\Seeder;

class ColaboradorsTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			for ($i=0; $i < 20; $i++) {
				$list = DB::table('llistes')->inRandomOrder()->first();
				$user = DB::table('users')->inRandomOrder()->first();
				$exist = DB::table('colaboradors')->where('user_id', '=', $user->id)->where('list_id', '=', $list->id)->count();
				if ($exist == 0) {
					DB::table('colaboradors')->insert([
						'list_id' => $list->id,
						'user_id' => $user->id,
					]);
				} else {
					$i--;
				}
			}
		}
}
