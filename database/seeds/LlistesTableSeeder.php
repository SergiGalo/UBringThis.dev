<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LlistesTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			for ($i=0; $i < 25; $i++) {
				$owner = DB::table('users')->select('id')->inRandomOrder()->first();
				DB::table('llistes')->insert([
					'title' => str_random(15),
					'owner' => $owner->id,
					'event_date' => Carbon::now(),
					'location' => str_random(15),
				]);
			}
		}
}
