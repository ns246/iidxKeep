<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\dj_data;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function Dashboard()
	{
		$id = Auth::id();
		$authority = Auth::user()->{'authority'};
		if ($authority !== 1) {
			return redirect()->route('index');
		}

		$registAccounts = DB::table('users')->get();
		$registScores = DB::table('scores_sp')->get();

		return view('dashboard', compact('id', 'registAccounts','registScores'));
	}

	public function ProfileEdit()
	{
		$id = Auth::id();
		$areas = DB::table('areas')->select('area')->get();
		$class = DB::table('class_sp')->select('class')->get();
		$arena_class = DB::table('arena_class_sp')->select('class')->get();

		if ($id > 0) {
			$djdata = DB::table('dj_datas')->where('id', $id)->get();
		}
		return view('Profile/profile_edit', compact('djdata', 'areas', 'class', 'arena_class'));
	}

	public function ProfileSend(Request $request)
	{
		$id = Auth::id();
		if ($request['djp_sp'] == '') {
			$request['djp_sp'] = '0';
		}
		if ($request['djp_dp'] == '') {
			$request['djp_dp'] = '0';
		}
		if ($request['pcount'] == '') {
			$request['pcount'] = '0';
		}

		// バリデーション
		$request->validate([
			'dj_name' => 'required|alpha_dash|max:6',
			'iidx_id_1' => 'required|numeric|digits_between:4,4',
			'iidx_id_2' => 'required|numeric|digits_between:4,4',
			'playcount' => 'numeric|digits_between:0,5',
			'djp_sp' => 'numeric|digits_between:0,5',
			'djp_dp' => 'numeric|digits_between:0,5',
			'area_id' => 'string',
			'class_id_sp' => 'string',
			'class_id_dp' => 'string',
			'arena_class_sp' => 'string',
			'arena_class_dp' => 'string',
		]);

		// DBにユーザが存在しているか確認
		$check_id = DB::table('dj_datas')->where('id', $id)->first();

		$data = $request->all();
		$dj_data = new dj_data();

		if (is_null($check_id)) {
			$dj_data->insert_dj_datas($data, $id);
		} else {
			// $profile->edit_dj_datas($data, $id);
			$dj_data->edit_dj_datas($data, $id);
		}

		// 二重送信対策 トークン再発行
		$request->session()->regenerateToken();
		return redirect()->route('profile');
	}

	public function AdminProfileSend(Request $request)
	{
		$id = $request->id;
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
		return redirect()->route('dashboard');
	}

	public function AdminAccountDelete(Request $request)
	{
		$id = $request->id;
		$user = DB::table('users')->find($id);
		$score_sp = DB::table('scores_sp')->find($id);
		// $score_dp = DB::table('scores_dp')->find($id);

		if (!empty($user)) {
			DB::table('users')->where('id', $id)->delete();
		}
		if (!empty($score_sp)) {
			DB::table('$score_sp')->where('uid', $id)->delete();
		}

		return redirect()->route('dashboard');
	}
}
