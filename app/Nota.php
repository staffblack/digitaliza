<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
	protected $fillable = ['id_curso','id_materia','id_user','lapso','tipo','q1p1','q1p2','q1p3','q1exam','q2p1','q2p2','q2p3','q2exam'];
    public function user()
    {
		return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function curso()
    {
		return $this->belongsTo('App\Curso', 'id_curso', 'id');
    }
    public function materia()
    {
		return $this->belongsTo('App\Materia', 'id_materia', 'id');
    }	
}
