<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lliste;
use App\Producte;
use App\Colaborador;
use App\User;


class LlistesController extends Controller
{
	public function index()
	{
		//$user_id = Auth::user()->id;
		return view('lists.index', array(
			'lists' => Lliste::userOwnerLists(1),
			'collaborations' => Lliste::userColaborationLists(1)
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
		]);

		$list = new Lliste();
		$list->title = $request->input('title');
		$list->owner = 1;
		$list->event_date = $request->input('event_date').' '.$request->input('event_time').':00';
		$list->location = $request->input('location');
		$list->save();

		return redirect('/lists');
	}

	public function show($id)
	{
		return view('lists.show', array(
			'list' => Lliste::findOrFail($id),
			'owner' => User::getOwner($id),
			'products' => Producte::all()->where('list_id', '=', $id)->where('active', 1),
			'colaboradors' => User::getColaboradors($id)
			));
	}

	public function edit()
	{
		return view('lists.edit');
	}

	public function update()
	{
		return view('lists.create');
	}

	public function destroy(Request $request, $id)
	{
		Lliste::deleteList($id);

		return redirect('/lists');
	}

}
