<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'email', 'password', 'name','apellido', 'password', 'perfil', 'identificacion','sexo','id_grupo','edad', 'telefono','id_docente','representante','telefono_represen'];

    
}
