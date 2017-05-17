<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lliste extends Model
{

	protected $guarded = [];

	public static function userOwnerLists($owner)
	{
		$ownerLists = DB::table('llistes')
						->where('owner', '=', $owner)
						->where('active', '=', 1)
						->orderBy('event_date', 'asc')
						->get();

		return $ownerLists;
	}

	public static function userColaborationLists($collaborator)
	{
		//SELECT * FROM llistes JOIN colaboradors WHERE llistes.id = colaboradors.list_id AND colaboradors.user_id = 5//
		$collaborationLists = DB::table('llistes')
						->join('colaboradors', 'llistes.id', '=', 'colaboradors.list_id')
						->where('colaboradors.user_id', '=', 1)
						->get();

		return $collaborationLists;
	}

	public static function deleteList($id)
	{
		DB::table('llistes')
						->where('id', $id)
						->update(['active' => 0]);
	}
}
