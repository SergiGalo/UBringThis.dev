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
			DB::table('users')->insert([
				'name' => 'Sergi',
				'last_name' => 'Galobardes Sánchez',
				'email' => 'sergi@mail.com',
				'password' => bcrypt('123123'),
			]);

			DB::table('users')->insert([
				'name' => 'Eva',
				'last_name' => 'Jerónimo Bou',
				'email' => 'eva@mail.com',
				'password' => bcrypt('123123'),
			]);

			DB::table('users')->insert([
				'name' => 'Edu',
				'last_name' => 'Galobardes Sánchez',
				'email' => 'edu@mail.com',
				'password' => bcrypt('123123'),
			]);

			DB::table('users')->insert([
				'name' => 'Laura',
				'last_name' => 'Sánchez López',
				'email' => 'laura@mail.com',
				'password' => bcrypt('123123'),
			]);

			DB::table('users')->insert([
				'name' => 'Quim',
				'last_name' => 'Galobardes Abancó',
				'email' => 'quim@mail.com',
				'password' => bcrypt('123123'),
			]);

			$faker = Faker::create();
			foreach (range(1, 30) as $index) {
				DB::table('users')->insert([
					'name' => $faker->name,
					'last_name' => $faker->lastName,
					'email' => $faker->email,
					'password' => bcrypt('sec'),
				]);
			}
		}
}
