<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //
	protected $fillable = ['id_curso','id_user','materia','estado','periodo']; 

    public function user()
    {
		return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function curso()
    {
		return $this->belongsTo('App\Curso', 'id_curso', 'id');
    }	

	
}
