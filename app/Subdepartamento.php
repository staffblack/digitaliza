<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdepartamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subdepartamento';

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
    protected $fillable = ['id', 'id_departamento','nombre', 'descripcion'];

    
}
