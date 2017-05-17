<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;


class ProductesTableSeeder extends Seeder
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
				$list_id = DB::table('llistes')->select('id')->inRandomOrder()->first();
				$asigned = DB::table('users')->select('id')->inRandomOrder()->first();
				DB::table('productes')->insert([
					'list_id' => $list_id->id,
					'name' => $faker->word,
					'units' => 'U',
					'quantity' => $faker->numberBetween(1,24),
					'price' => $faker->numberBetween(1,20),
					'assigned_to' => $asigned->id,
				]);
			}
		}
}
