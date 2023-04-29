<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Models\VersionTitle;
use App\Http\Controllers\Controller;

class VersionTitleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		// バージョンタイトルをペジネーションした結果で返す
		return VersionTitle::paginate();
	}

	public function fetch(Request $request)
	{
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		// リクエストパラメータから取得した値をもとにPostを作成する
		return VersionTitle::create($request->all());
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		// Eloquentオブジェクトを返す
		return VersionTitle::where('id', '=', $id)->get();
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
