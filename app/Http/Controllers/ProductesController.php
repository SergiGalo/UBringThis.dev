<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Producte;

class ProductesController extends Controller
{
	// public function index($list_id)
	// {
	// 	//$user_id = Auth::user();
	// 	return view('lists.products', array('list'=>'products'=>Producte::all()));
	// }

	public function store(Request $request)
	{

		$this->validate(request(), [
			'name' => 'required|min:2|max:50',
			'quantity' => 'nullable|numeric',
			'units' => 'nullable',
			'price' => 'nullable|numeric',
			'assigned_to' => 'nullable|integer'
		]);

		if ($request->input('quantity') == '') { $quantity = 0; } else { $quantity = $request->input('quantity'); }
		if ($request->input('units') == '') { $units = "unitats"; } else { $units = $request->input('units'); }
		if ($request->input('price') == '') { $price = 0.00; } else { $price = $request->input('price'); }
		if ($request->input('assigned_to') == 0) { $assigned_to = null; } else { $assigned_to = $request->input('assigned_to'); }

		DB::table('productes')->insert([
			'list_id' => $request->input('list_id'),
			'name' => $request->input('name'),
			'quantity' => $quantity,
			'units' => $units,
			'price' => $price,
			'assigned_to' => $assigned_to
		]);

		return redirect('/lists/'.$request->input('list_id'));
	}

	public function delete(Request $request)
	{
		Producte::deleteProduct($request->input('product_id'));

		return redirect('/lists/'.$request->input('list_id'));
	}
}
