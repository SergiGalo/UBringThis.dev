<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			$faker = Faker::create();
			foreach (range(1, 50) as $index) {
				DB::table('users')->insert([
					'name' => $faker->name,
					'lastname' => $faker->lastName,
					'email' => $faker->email,
					'password' => bcrypt('sec'),
				]);
			}
		}
}
