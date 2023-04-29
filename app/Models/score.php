<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class score extends Model
{
	use HasFactory;
	protected $table = 'scores_sp';
	protected $guarded = [
		'iidxid',
		'title',
		'artist',
		'genre',
		'playcount',
		'sp_b_score',
		'sp_b_misscount',
		'sp_b_cleartype',
		'sp_b_djlevel',
		'sp_n_score',
		'sp_n_misscount',
		'sp_n_cleartype',
		'sp_n_djlevel',
		'sp_h_score',
		'sp_h_misscount',
		'sp_h_cleartype',
		'sp_h_djlevel',
		'sp_a_score',
		'sp_a_misscount',
		'sp_a_cleartype',
		'sp_a_djlevel',
		'sp_l_score',
		'sp_l_misscount',
		'sp_l_cleartype',
		'sp_l_djlevel',
	];

	public function getClearTypeScores($type, $uid)
	{
		$clear_type = $type;
		$result = score::select(
			'scores_sp.uid',
			'scores_sp.iidxid',
			'scores_sp.title',
			'scores_sp.artist',
			'scores_sp.genre',
			'scores_sp.playcount',
			'B.sp_b_score',
			'B.sp_b_misscount',
			'B.sp_b_cleartype',
			'B.sp_b_djlevel',
			'B.sp_n_score',
			'B.sp_n_misscount',
			'B.sp_n_cleartype',
			'B.sp_n_djlevel',
			'B.sp_h_score',
			'B.sp_h_misscount',
			'B.sp_h_cleartype',
			'B.sp_h_djlevel',
			'B.sp_a_score',
			'B.sp_a_misscount',
			'B.sp_a_cleartype',
			'B.sp_a_djlevel',
			'B.sp_l_score',
			'B.sp_l_misscount',
			'B.sp_l_cleartype',
			'B.sp_l_djlevel'
		)
			->join('scores_sp as B', 'B.title', '=', 'scores_sp.title')
			->where('scores_sp.uid', '=', $uid)
			->where(function ($query)use($clear_type) {
				$query->where('B.sp_b_cleartype', '=', $clear_type)
					->orWhere('B.sp_n_cleartype', '=', $clear_type)
					->orWhere('B.sp_h_cleartype', '=', $clear_type)
					->orWhere('B.sp_a_cleartype', '=', $clear_type)
					->orWhere('B.sp_l_cleartype', '=', $clear_type);
			});
		return ($result);
	}

	public function getRankScores($type, $uid)
	{
		$rank = $type;
		$result = score::select(
			'scores_sp.uid',
			'scores_sp.iidxid',
			'scores_sp.title',
			'scores_sp.artist',
			'scores_sp.genre',
			'scores_sp.playcount',
			'B.sp_b_score',
			'B.sp_b_misscount',
			'B.sp_b_cleartype',
			'B.sp_b_djlevel',
			'B.sp_n_score',
			'B.sp_n_misscount',
			'B.sp_n_cleartype',
			'B.sp_n_djlevel',
			'B.sp_h_score',
			'B.sp_h_misscount',
			'B.sp_h_cleartype',
			'B.sp_h_djlevel',
			'B.sp_a_score',
			'B.sp_a_misscount',
			'B.sp_a_cleartype',
			'B.sp_a_djlevel',
			'B.sp_l_score',
			'B.sp_l_misscount',
			'B.sp_l_cleartype',
			'B.sp_l_djlevel'
		)
			->join('scores_sp as B', 'B.title', '=', 'scores_sp.title')
			->where('scores_sp.uid', '=', $uid)
			->where(function ($query)use($rank) {
				$query->where('B.sp_b_djlevel', '=', $rank)
					->orWhere('B.sp_n_djlevel', '=', $rank)
					->orWhere('B.sp_h_djlevel', '=', $rank)
					->orWhere('B.sp_a_djlevel', '=', $rank)
					->orWhere('B.sp_l_djlevel', '=', $rank);
			});
		return ($result);
	}

	public function insert_score_sp($item)
	{
		score::insert([
			'uid' => $item['uid'],
			'iidxid' => $item['iidxid'],
			'title' => $item['title'],
			'genre' => $item['genre'],
			'artist' => $item['artist'],
			'playcount' => $item['playcount'],
			'sp_b_cleartype' => $item['sp_b_cleartype'],
			'sp_b_djlevel' => $item['sp_b_djlevel'],
			'sp_b_score' => $item['sp_b_score'],
			'sp_b_pgreat' => $item['sp_b_pgreat'],
			'sp_b_great' => $item['sp_b_great'],
			'sp_b_misscount' => $item['sp_b_misscount'],
			'sp_n_cleartype' => $item['sp_n_cleartype'],
			'sp_n_djlevel' => $item['sp_n_djlevel'],
			'sp_n_score' => $item['sp_n_score'],
			'sp_n_pgreat' => $item['sp_n_pgreat'],
			'sp_n_great' => $item['sp_n_great'],
			'sp_n_misscount' => $item['sp_n_misscount'],
			'sp_h_cleartype' => $item['sp_h_cleartype'],
			'sp_h_djlevel' => $item['sp_h_djlevel'],
			'sp_h_score' => $item['sp_h_score'],
			'sp_h_pgreat' => $item['sp_h_pgreat'],
			'sp_h_great' => $item['sp_h_great'],
			'sp_h_misscount' => $item['sp_h_misscount'],
			'sp_a_cleartype' => $item['sp_a_cleartype'],
			'sp_a_djlevel' => $item['sp_a_djlevel'],
			'sp_a_score' => $item['sp_a_score'],
			'sp_a_pgreat' => $item['sp_a_pgreat'],
			'sp_a_great' => $item['sp_a_great'],
			'sp_a_misscount' => $item['sp_a_misscount'],
			'sp_l_cleartype' => $item['sp_l_cleartype'],
			'sp_l_djlevel' => $item['sp_l_djlevel'],
			'sp_l_score' => $item['sp_l_score'],
			'sp_l_pgreat' => $item['sp_l_pgreat'],
			'sp_l_great' => $item['sp_l_great'],
			'sp_l_misscount' => $item['sp_l_misscount'],
			'lastplay_at' => $item['lastplay_at'],
			'created_at' => now(),
		]);
	}

	public function update_score_sp($item)
	{
		score::update([
			'uid' => $item['uid'],
			'iidxid' => $item['iidxid'],
			'title' => $item['title'],
			'genre' => $item['genre'],
			'artist' => $item['artist'],
			'playcount' => $item['playcount'],
			'sp_b_cleartype' => $item['sp_b_cleartype'],
			'sp_b_djlevel' => $item['sp_b_djlevel'],
			'sp_b_score' => $item['sp_b_score'],
			'sp_b_pgreat' => $item['sp_b_pgreat'],
			'sp_b_great' => $item['sp_b_great'],
			'sp_b_misscount' => $item['sp_b_misscount'],
			'sp_n_cleartype' => $item['sp_n_cleartype'],
			'sp_n_djlevel' => $item['sp_n_djlevel'],
			'sp_n_score' => $item['sp_n_score'],
			'sp_n_pgreat' => $item['sp_n_pgreat'],
			'sp_n_great' => $item['sp_n_great'],
			'sp_n_misscount' => $item['sp_n_misscount'],
			'sp_h_cleartype' => $item['sp_h_cleartype'],
			'sp_h_djlevel' => $item['sp_h_djlevel'],
			'sp_h_score' => $item['sp_h_score'],
			'sp_h_pgreat' => $item['sp_h_pgreat'],
			'sp_h_great' => $item['sp_h_great'],
			'sp_h_misscount' => $item['sp_h_misscount'],
			'sp_a_cleartype' => $item['sp_a_cleartype'],
			'sp_a_djlevel' => $item['sp_a_djlevel'],
			'sp_a_score' => $item['sp_a_score'],
			'sp_a_pgreat' => $item['sp_a_pgreat'],
			'sp_a_great' => $item['sp_a_great'],
			'sp_a_misscount' => $item['sp_a_misscount'],
			'sp_l_cleartype' => $item['sp_l_cleartype'],
			'sp_l_djlevel' => $item['sp_l_djlevel'],
			'sp_l_score' => $item['sp_l_score'],
			'sp_l_pgreat' => $item['sp_l_pgreat'],
			'sp_l_great' => $item['sp_l_great'],
			'sp_l_misscount' => $item['sp_l_misscount'],
			'lastplay_at' => $item['lastplay_at'],
			'updated_at' => now(),
		]);
	}
}
