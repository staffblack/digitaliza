<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detalle_evaluacion';

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
    protected $fillable = ['id', 'n_pregunta', 'pregunta', 'id_evaluacion', 'id_docente'];

    
}
