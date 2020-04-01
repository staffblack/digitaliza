<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class Matricula extends Model
{
	use HasRoles;
    protected $fillable = ['id_user','id_curso','cupo','ano_lectivo']; //

    public function user()
    {
		return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function curso()
    {
		return $this->belongsTo('App\Curso', 'id_curso', 'id');
    }

}
