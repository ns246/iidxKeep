<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\score;
use App\Models\MusicList;
use Carbon\Carbon;

class ScoreViewController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	private $id;
	private $per_page = 50;
	public $sortable = ['id', 'companyname_kana', 'email', 'status'];

	public function __construct()
	{
		$this->id = Auth::id();
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function Recent()
	{
		$id = Auth::id();
		$result = DB::table('scores_sp')
			->where('uid', $id)
			->whereRaw("updated_at >= DATE_SUB( CURDATE(),INTERVAL 10 DAY )")
			->paginate($this->per_page);

		return view('ScoreView/recent', compact('result'));
	}

	public function LevelView(int $level)
	{
		$id = Auth::id();
		$musicLists = new MusicList;
		$musiclistUnion =  $musicLists->musicLvValuesUnion($level)->paginate($this->per_page);
		return view('ScoreView/level', compact('level', 'musiclistUnion'));
	}

	public function LevelViewBeginner()
	{
		$id = Auth::id();
		$musicLists = new MusicList;
		$musiclistUnion =  $musicLists->musicLvValuesBeginner()->paginate($this->per_page);
		return view('ScoreView/beginner', compact('musiclistUnion'));
	}

	public function LevelViewLeggendaria()
	{
		$id = Auth::id();
		$musicLists = new MusicList;
		$musiclistUnion =  $musicLists->musicLvValuesLeggendaria()->paginate($this->per_page);
		return view('ScoreView/leggendaria', compact('musiclistUnion'));
	}

	public function LevelViewFullCombo()
	{
		$id = Auth::id();
		$musicLists = new MusicList;
		$musiclistUnion =  $musicLists->musicLvValuesLeggendaria()->paginate($this->per_page);
		return view('ScoreView/leggendaria', compact('musiclistUnion'));
	}

	public function CleartypeFullcombo()
	{
		$type = "FULLCOMBO CLEAR";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function CleartypeExHard()
	{
		$type = "EX HARD CLEAR";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function CleartypeHard()
	{
		$type = "HARD CLEAR";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function CleartypeClear()
	{
		$type = "CLEAR";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function CleartypeAssistClear()
	{
		$type = "ASSIST CLEAR";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function CleartypeEasyClear()
	{
		$type = "EASY CLEAR";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function CleartypeFailed()
	{
		$type = "FAILED";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function CleartypeNoPlay()
	{
		$type = "NO PLAY";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getClearTypeScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/type', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankAAA()
	{
		$type = "AAA";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankAA()
	{
		$type = "AA";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankA()
	{
		$type = "A";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankB()
	{
		$type = "B";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankC()
	{
		$type = "C";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankD()
	{
		$type = "D";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankE()
	{
		$type = "E";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankF()
	{
		$type = "F";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function RankNoScore()
	{
		$type = "---";
		$id = Auth::id();
		$scores = new score;
		$scoresUnion =  $scores->getRankScores($type, $id)->paginate($this->per_page);
		$musicDatas = DB::table('music_lists')->get();
		return view('ScoreView/rank', compact('scoresUnion', 'musicDatas', 'type'));
	}

	public function VersionView(int $ver)
	{
		$id = Auth::id();
		$musicLists = new MusicList;
		$musiclistUnion =  $musicLists->musicVersionUnion($ver)->paginate($this->per_page);
		$musicDatas =  $musicLists->musicVersionUnion($ver)->get();
		
		return view('ScoreView/version', compact('musiclistUnion', 'musicDatas', 'ver'));
	}
}
