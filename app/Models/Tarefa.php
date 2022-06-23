<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
	protected $fillable = [

		'title',
		'status',
		'description',
		'usuario_id'
	];

	public function getCreatedAtAttribute($value)
	{
		return date('d/m/Y', strtotime($value)); 
	}

	public function usuarios()
	{
		return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
	}
}
