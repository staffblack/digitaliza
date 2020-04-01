<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sucursal';

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
    protected $fillable = ['id', 'id_empresa', 'nombre_sucursal'];

    
}
