<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VersionTitle extends Model
{
	use HasFactory;
	protected $table = 'version';
	protected $fillable = [
		'id',
		'version_name',
	];
}
