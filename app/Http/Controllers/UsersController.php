<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\dj_data;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function Index()
	{
		$id = Auth::id();
		$user = '';
		$user_id = '';
		$djdata = '';

		if ($id > 0) {
			$users = DB::table('users')->where('id', $id)->first();
		}
		return view('Account/profile', compact('users'));
	}

	public function ProfileEdit()
	{
		$id = Auth::id();

		if ($id > 0) {
			$users = DB::table('users')->where('id', $id)->get();
		}
		return view('Account/profile_edit', compact('users'));
	}

	public function ProfileSend(Request $request)
	{
		$id = Auth::id();

		// バリデーション
		$request->validate([
			'name' => 'required', 'string', 'max:63',
			'email' => 'required', 'string', 'email:strict,dns,spoof', 'max:255',
		]);

		// DBにユーザが存在しているか確認
		$check_id = DB::table('users')->where('id', $id)->first();
		$data = $request->all();

		if (is_null($check_id)) {
			
		} else {
			// $profile->edit_dj_datas($data, $id);
			DB::table('users')->where('id', $id)->update([
				'name' => $data['name'],
				'email' => $data['email'],
				'updated_at' => now(),
				]);
		}

		// 二重送信対策 トークン再発行
		$request->session()->regenerateToken();
		return redirect()->route('account.profile');
	}
	
}
