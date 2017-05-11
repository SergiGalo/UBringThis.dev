<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			for ($i=0; $i < 25; $i++) {
				DB::table('users')->insert([
					'name' => str_random(8),
					'lastname' => str_random(10),
					'email' => str_random(8).'@mail.com',
					'password' => bcrypt('sec'),
				]);
			}
		}
}
