<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
	protected $fillable = ['curso','paralelo','periodo','cupo','estado']; 

    public function materias()
    {
        return $this->hasMany('App\Materia', 'id_curso', 'id');
    }	
	
}
