<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductesTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			for ($i=0; $i < 50; $i++) {
				$list_id = DB::table('llistes')->select('id')->inRandomOrder()->first();
				$asigned = DB::table('users')->select('id')->inRandomOrder()->first();
				DB::table('productes')->insert([
					'list_id' => $list_id->id,
					'name' => str_random(8),
					'units' => 'U',
					'quantity' => 6,
					'price' => 1.00,
					'assigned_to' => $asigned->id,
				]);
			}
		}
}
