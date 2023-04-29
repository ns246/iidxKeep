<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Music;
use Exception;
use App\Http\Controllers\Controller;

class MusicController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		// 曲一覧をペジネーションした結果で返す
		return Music::paginate();
		// try {
		// 	$music = Music::first();
		// 	$result = [
		// 		'result' => true,
		// 		'id' => $music->id,
		// 		'title' => $music->title,
		// 		'version' => $music->version,
		// 		'artist' => $music->artist,
		// 		'genre' => $music->genre,
		// 		'bpm' => $music->bpm,
		// 		'time' => $music->time
		// 	];
		// } catch (\Exception $e) {
		// 	$result = [
		// 		'result' => false,
		// 		'error' => [
		// 			'messages' => [$e->getMessage()]
		// 		],
		// 	];
		// 	return $this->resConversionJson($result, $e->getCode());
		// }
		// return $this->resConversionJson($result);
	}

	public function resConversionJson($result, $statusCode = 200)
	{
		if (empty($statusCode) || $statusCode < 100 || $statusCode >= 600) {
			$statusCode = 500;
		}
		return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
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
		return Music::create($request->all());
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		// Eloquentオブジェクトを返す
		return Music::where('vid','=',$id)->get();
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
