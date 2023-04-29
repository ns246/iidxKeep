<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicList extends Model
{
	use HasFactory;
	protected $table = 'music_lists';
	protected $fillable = [
		'vid',
		'title',
		'version',
		'artist',
		'genre',
		'bpm',
		'sp_b_lv',
		'sp_n_lv',
		'sp_h_lv',
		'sp_a_lv',
		'sp_l_lv',
		'time',
		'created_at',
		'updated_at',
	];

	public function musicLvValuesUnion($level)
	{
		$result = MusicList::join('music_lists as B', 'B.title', '=', 'music_lists.title')
			->select(
				'music_lists.vid',
				'music_lists.version',
				'music_lists.title',
				'music_lists.artist',
				'music_lists.genre',
				'B.sp_b_lv',
				'B.sp_b_notes',
				'B.sp_n_lv',
				'B.sp_n_notes',
				'B.sp_h_lv',
				'B.sp_h_notes',
				'B.sp_a_lv',
				'B.sp_a_notes',
				'B.sp_l_lv',
				'B.sp_l_notes'
			)
			->where('B.sp_b_lv', '=', $level)
			->orWhere('B.sp_n_lv', '=', $level)
			->orWhere('B.sp_h_lv', '=', $level)
			->orWhere('B.sp_a_lv', '=', $level)
			->orWhere('B.sp_l_lv', '=', $level);
		return ($result);
	}

	public function musicLvValuesBeginner()
	{
		$result = MusicList::join('music_lists as B', 'B.title', '=', 'music_lists.title')
			->select(
				'music_lists.vid',
				'music_lists.version',
				'music_lists.title',
				'music_lists.artist',
				'music_lists.genre',
				'B.sp_b_lv',
				'B.sp_b_notes',
			)
			->where('B.sp_b_lv', '!=', '');
		return ($result);
	}

	public function musicLvValuesLeggendaria()
	{
		$result = MusicList::join('music_lists as B', 'B.title', '=', 'music_lists.title')
			->select(
				'music_lists.vid',
				'music_lists.version',
				'music_lists.title',
				'music_lists.artist',
				'music_lists.genre',
				'B.sp_l_lv',
				'B.sp_l_notes',
			)
			->where('B.sp_l_lv', '!=', '');
		return ($result);
	}

	public function musicVersionUnion($ver)
	{
		$result = MusicList::join('music_lists as B', 'B.title', '=', 'music_lists.title')
			->select(
				'music_lists.vid',
				'music_lists.version',
				'music_lists.title',
				'music_lists.artist',
				'music_lists.genre',
				'B.sp_b_lv',
				'B.sp_b_notes',
				'B.sp_n_lv',
				'B.sp_n_notes',
				'B.sp_h_lv',
				'B.sp_h_notes',
				'B.sp_a_lv',
				'B.sp_a_notes',
				'B.sp_l_lv',
				'B.sp_l_notes'
			)
			->where('music_lists.version', '=', $ver);
		return ($result);
	}


}
