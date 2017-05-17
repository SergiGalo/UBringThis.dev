<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Producte extends Model
{
	public static function deleteProduct($product_id)
	{
		DB::table('productes')
						->where('id', $product_id)
						->update(['active' => 0]);
	}
}
