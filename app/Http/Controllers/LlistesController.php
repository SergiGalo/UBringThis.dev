<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lliste;
use App\Producte;
use App\Colaborador;
use App\User;


class LlistesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$user_id = auth()->user()->id;

		return view('lists.index', array(
			'lists' => Lliste::userOwnerLists($user_id),
			'collaborations' => Lliste::userColaborationLists($user_id)
		));
	}

	public function create()
	{
		return view('lists.create');
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
			'title' => 'required|min:2',
			'event_date' => 'required|date',
			'event_time' => 'required',
			'description' => 'max:500'
		]);

		$list = new Lliste();
		$list->title = $request->input('title');
		$list->owner = auth()->user()->id;
		$list->event_date = $request->input('event_date').' '.$request->input('event_time').':00';
		$list->location = $request->input('location');
		$list->description = $request->input('description');
		$list->save();

		return redirect('/lists');
	}

	public function show($id)
	{
		//Càlcul Productes per persona
		$products = Producte::all()->where('list_id', '=', $id)->where('active', 1);

		$owner = User::getOwner($id);
		$owner_p_count = DB::table('productes')->where('productes.list_id', $id)->where('productes.assigned_to', $owner->owner)->count();
		$owner_price = 0;

		foreach ($products as $product) {
			if ( $product->assigned_to == $owner->owner ) {
				$owner_price += ($product->quantity*$product->price);
			}
		}

		$colaboradors = User::getColaboradors($id);

		$data_labels_name = array($owner->name.' '.$owner->last_name);
		$data_labels_count = array($owner_p_count);
		$data_labels_price = array($owner_price);

		foreach ($colaboradors as $colaborador) {
			$colab = ($colaborador->name.' '.$colaborador->last_name);
			$count = DB::table('productes')->where('productes.list_id', $id)->where('productes.assigned_to', $colaborador->id)->count();
			$colab_price = 0;

			foreach ($products as $product) {
				if ( $product->assigned_to == $colaborador->id ) {
					$colab_price += ($product->quantity*$product->price);
				}
			}

			array_push( $data_labels_name, $colab );
			array_push( $data_labels_count, $count );
			array_push( $data_labels_price, $colab_price);
		}

		return view('lists.show', array(
			'list' => Lliste::findOrFail($id),
			'owner' => $owner,
			'products' => $products,
			'colaboradors' => $colaboradors,
			'data_labels_name' => json_encode($data_labels_name),
			'data_labels_count' => json_encode($data_labels_count),
			'data_labels_price' => json_encode($data_labels_price),
		));
	}

	public function edit($id)
	{
		return view('lists.edit', array('list' => Lliste::findOrFail($id)));
	}

	public function update(Request $request, $id)
	{
		$this->validate(request(), [
			'title' => 'required|min:2',
			'event_date' => 'required|date',
			'event_time' => 'required',
			'description' => 'max:500'
		]);

		$list = Lliste::findOrFail($id);
		$list->title = $request->input('title');
		$list->owner = auth()->user()->id;
		$list->event_date = $request->input('event_date').' '.$request->input('event_time').':00';
		$list->location = $request->input('location');
		$list->description = $request->input('description');
		$list->save();

		return redirect() -> action('LlistesController@show', $list->id);
	}

	public function destroy(Request $request, $id)
	{
		Lliste::deleteList($id);

		return redirect('/lists');
	}

}
