<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopPageController extends Controller
{

	public function Index()
	{
		$djdata = '';
		if (Auth::id() > 0) {
			$djdataTable = DB::table('dj_datas');
			$djdata = $djdataTable->where('id', Auth::id())->get();
		}

		return view('index', compact('djdata'));
	}
}
