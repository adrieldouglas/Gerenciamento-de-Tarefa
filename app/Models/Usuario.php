<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $fillable = [

		'name',
		'email'
	];

	public function getCreatedAtAttribute($value)
	{
		return date('d/m/Y H:i:s', strtotime($value)); 
	}

	public function tarefas()
	{
		return $this->hasMany(Tarefa::class, 'usuario_id', 'id');
	}
}
