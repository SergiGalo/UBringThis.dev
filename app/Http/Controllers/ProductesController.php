<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lliste;
use App\Producte;
use App\Colaborador;
use App\User;

class ProductesController extends Controller
{

	public function create($id)
	{
		return view('products.create', array(
			'list' => Lliste::findOrFail($id),
			'owner' => User::getOwner($id),
			'colaboradors' => User::getColaboradors($id)
		));
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
			'name' => 'required|min:2|max:100',
			'quantity' => 'nullable|numeric',
			'units' => 'nullable',
			'price' => 'nullable|numeric',
			'assigned_to' => 'nullable|integer'
		]);

		if ($request->input('quantity') == '') { $quantity = 0; } else { $quantity = $request->input('quantity'); }
		if ($request->input('price') == '') { $price = 0.00; } else { $price = $request->input('price'); }
		if ($request->input('assigned_to') == 0) { $assigned_to = null; } else { $assigned_to = $request->input('assigned_to'); }
		if ($request->input('editable') == null) { $editable = 0; } else { $editable = 1; }

		$product = new Producte();
		$product->list_id = $request->input('list_id');
		$product->name = $request->input('name');
		$product->quantity = $quantity;
		$product->units = $request->input('units');
		$product->price = $price;
		$product->assigned_to = $assigned_to;
		$product->editable = $editable;
		$product->save();

		return redirect('/lists/'.$request->input('list_id'));
	}

	public function edit($id)
	{
		$product = Producte::findOrFail($id);

		return view('products.edit', array(
			'product' => $product,
			'owner' => User::getOwner($product->list_id),
			'colaboradors' => User::getColaboradors($product->list_id)
		));
	}

	public function update(Request $request, $id)
	{
		$this->validate(request(), [
			'name' => 'required|min:2|max:50',
			'quantity' => 'nullable|numeric',
			'units' => 'nullable',
			'price' => 'nullable|numeric',
			'assigned_to' => 'nullable|integer'
		]);

		if ($request->input('quantity') == '') { $quantity = 0; } else { $quantity = $request->input('quantity'); }
		if ($request->input('price') == '') { $price = 0.00; } else { $price = $request->input('price'); }
		if ($request->input('assigned_to') == 0) { $assigned_to = null; } else { $assigned_to = $request->input('assigned_to'); }
		if ($request->input('editable') == null) { $editable = 0; } else { $editable = 1; }

		$product = Producte::findOrFail($id);
		$product->list_id = $request->input('list_id');
		$product->name = $request->input('name');
		$product->quantity = $quantity;
		$product->units = $request->input('units');
		$product->price = $price;
		$product->assigned_to = $assigned_to;
		$product->editable = $editable;
		$product->save();

		return redirect('/lists/'.$request->input('list_id'));
	}

	public function destroy(Request $request)
	{
		Producte::deleteProduct($request->input('product_id'));

		return redirect('/lists/'.$request->input('list_id'));
	}
}
