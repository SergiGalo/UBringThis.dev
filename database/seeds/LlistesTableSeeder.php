<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;


class LlistesTableSeeder extends Seeder
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
				$owner = DB::table('users')->select('id')->inRandomOrder()->first();
				DB::table('llistes')->insert([
					'title' => $faker->word.' '.$faker->word,
					'owner' => $owner->id,
					'event_date' => Carbon::now(),
					'location' => $faker->city,
					'description' => $faker->paragraph,
					'created_at' => $faker->dateTime($max = 'now'),
					'updated_at' => $faker->dateTime($min = 'now')
				]);
			}
		}
}
