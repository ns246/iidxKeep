<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\score;
use Symfony\Component\VarDumper\VarDumper;

class ScoreimportController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function Index(Request $request)
	{
		$res = '';
		$c = $request->input('c'); // 何件登録したか結果を返す
		$res = $request->input('res'); // 何件登録したか結果を返す
		if (Auth::id() > 0) {
			$djdata = DB::table('dj_datas')->where('id', Auth::id())->first();
			$data = DB::table('scores_sp')->where('uid', Auth::id())->get(); // データ登録対象のテーブルからデータを取得する
		}
		if (is_null($djdata)) {
			$error = '不正なアクセスです';
			return redirect('Profile/profile', compact('djdata', 'error'));
			exit;
		}

		return view('score_import', compact('djdata', 'data', 'c', 'res'));
	}

	public function upload(Request $request)
	{
		$res = 0;
		try {
			// 一旦アップロードされたCSVファイルを受け取り保存する
			$uploaded_file = $request->file('csvdata'); // inputのnameはcsvdataとする 
			$orgName = date('YmdHis') . "_" . $request->file('csvdata')->getClientOriginalName();
			$spath = storage_path('app\\');
			$path = $spath . $request->file('csvdata')->storeAs('', $orgName);

			// CSVファイル（エクセルファイルも可）を読み込む
			//$result = (new FastExcel)->importSheets($path); //エクセルファイルをアップロードする時はこちら
			$result = (new FastExcel)->configureCsv(',')->importSheets($path); // カンマ区切りのCSVファイル時
		} catch (\Exception $e) {
			report($e);
			session()->flash('flash_message', '更新が失敗しました');
		}

		try {
			// DB::beginTransaction();
			// DB登録処理

			$score = new score();
			foreach ($result as $row) {
			}
			for ($i = 0; $i < count($row); $i++) {
				// foreach ($row as $row[$i]) {
				// ここでCSV内データとテーブルのカラムを紐付ける（左側カラム名、右側CSV１行目の項目名）
				$param = [
					'uid' =>  $request["id"],
					'iidxid' => $request["iidx_id"],
					'title' => $row[$i]["タイトル"],
					'genre' => $row[$i]["ジャンル"],
					'artist' => $row[$i]["アーティスト"],
					'playcount' => $row[$i]["プレー回数"],
					'sp_b_cleartype' => $row[$i]["BEGINNER クリアタイプ"],
					'sp_b_djlevel' => $row[$i]["BEGINNER DJ LEVEL"],
					'sp_b_score' => $row[$i]["BEGINNER スコア"],
					'sp_b_pgreat' => $row[$i]["BEGINNER PGreat"],
					'sp_b_great' => $row[$i]["BEGINNER Great"],
					'sp_b_misscount' => $row[$i]["BEGINNER ミスカウント"],
					'sp_n_cleartype' => $row[$i]["NORMAL クリアタイプ"],
					'sp_n_djlevel' => $row[$i]["NORMAL DJ LEVEL"],
					'sp_n_score' => $row[$i]["NORMAL スコア"],
					'sp_n_pgreat' => $row[$i]["NORMAL PGreat"],
					'sp_n_great' => $row[$i]["NORMAL Great"],
					'sp_n_misscount' => $row[$i]["NORMAL ミスカウント"],
					'sp_h_cleartype' => $row[$i]["HYPER クリアタイプ"],
					'sp_h_djlevel' => $row[$i]["HYPER DJ LEVEL"],
					'sp_h_score' => $row[$i]["HYPER スコア"],
					'sp_h_pgreat' => $row[$i]["HYPER PGreat"],
					'sp_h_great' => $row[$i]["HYPER Great"],
					'sp_h_misscount' => $row[$i]["HYPER ミスカウント"],
					'sp_a_cleartype' => $row[$i]["ANOTHER クリアタイプ"],
					'sp_a_djlevel' => $row[$i]["ANOTHER DJ LEVEL"],
					'sp_a_score' => $row[$i]["ANOTHER スコア"],
					'sp_a_pgreat' => $row[$i]["ANOTHER PGreat"],
					'sp_a_great' => $row[$i]["ANOTHER Great"],
					'sp_a_misscount' => $row[$i]["ANOTHER ミスカウント"],
					'sp_l_cleartype' => $row[$i]["LEGGENDARIA クリアタイプ"],
					'sp_l_djlevel' => $row[$i]["LEGGENDARIA DJ LEVEL"],
					'sp_l_score' => $row[$i]["LEGGENDARIA スコア"],
					'sp_l_pgreat' => $row[$i]["LEGGENDARIA PGreat"],
					'sp_l_great' => $row[$i]["LEGGENDARIA Great"],
					'sp_l_misscount' => $row[$i]["LEGGENDARIA ミスカウント"],
					'lastplay_at' => $row[$i]["最終プレー日時"],
				];
				$check_score = DB::table('scores_sp')
					->where('uid', '=', Auth::id())
					->where('title', '=',  $param['title'])
					->first();

				// DBにinsertする（更新フラグなどに対応するため１行ずつinsertする）
				if (is_null($check_score)) {
					$score->insert_score_sp($param);
				} else {
					$score->update_score_sp($param);
				}

				// DB::table('scores_sp')->insert($param);
				// DB::commit();
				$res = 0;
				$c = $i;	// 登録件数確認用
				// }
			}
		} catch (\Throwable $e) {
			// DB::rollBack();
			$res = 1;
			$c = 0;
		}
		return redirect(route('import', compact(['c', 'res'])));
	}
}
