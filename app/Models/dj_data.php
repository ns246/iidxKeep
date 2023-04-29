<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dj_data extends Model
{
	use HasFactory;
	protected $table = 'dj_datas';
	protected $fillable = [
		'id',
		'dj_name',
		'iidx_id',
		'area_id',
		'class_id_sp',
		'class_id_dp',
		'djp_sp',
		'djp_dp',
		'arena_class_sp',
		'arena_class_dp',
		'playcount',
	];

	// public function all_dj_datas()
	// {
	// 	return $this->get();
	// }

	public function insert_dj_datas($data, $id)
	{
		DB::table('dj_datas')
			->insert([
				'id' => $id,
				'dj_name' => $data['dj_name'],
				'iidx_id' => $data['iidx_id_1'] . "-" . $data['iidx_id_2'],
				'area_id' => $data['area'],
				'class_id_sp' => $data['cls_sp'],
				'class_id_dp' => $data['cls_dp'],
				'djp_sp' => $data['djp_sp'],
				'djp_dp' => $data['djp_dp'],
				'arena_class_sp' => $data['acls_sp'],
				'arena_class_dp' => $data['acls_dp'],
				'playcount' => $data['pcount'],
				'updated_at' => now(),
				'created_at' => now(),
			]);
	}

	public function edit_dj_datas($data, $id)
	{
		DB::table('dj_datas')->where('id', $id)
			->update([
				'dj_name' => $data['dj_name'],
				'iidx_id' => $data['iidx_id_1'] . "-" . $data['iidx_id_2'],
				'area_id' => $data['area'],
				'class_id_sp' => $data['cls_sp'],
				'class_id_dp' => $data['cls_dp'],
				'djp_sp' => $data['djp_sp'],
				'djp_dp' => $data['djp_dp'],
				'arena_class_sp' => $data['acls_sp'],
				'arena_class_dp' => $data['acls_dp'],
				'playcount' => $data['pcount'],
				'updated_at' => now(),
			]);
	}
}
