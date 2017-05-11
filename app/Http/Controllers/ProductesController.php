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
			'quantity' => 'nullable',
			'units' => 'nullable',
			'price' => 'nullable',
			'assigned_to' => 'nullable',
		]);

		DB::table('productes')->insert([
			'list_id' => $request->input('list_id'),
			'name' => $request->input('name'),
			'quantity' => $request->input('quantity'),
			'units' => $request->input('units'),
			'price' => $request->input('price'),
			'assigned_to' => $request->input('assigned_to'),
		]);

		// $product = new Producte();
		// $product->list_id = $request->input('list_id');
		// $product->name = $request->input('name');
		// $product->quantity = $request->input('quantity');
		// $product->units = $request->input('units');
		// $product->price = $request->input('price');
		// $product->save();

		return redirect('/lists/'.$request->input('list_id'));
	}
}
