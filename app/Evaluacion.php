<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluacion';

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
    protected $fillable = ['id', 'n_preguntas', 'id_grupo', 'id_asignacion', 'id_docente'];

    
}
