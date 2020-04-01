<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'caja';

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
    protected $fillable = ['id', 'empresa', 'sucursal', 'departamento', 'sub_departamento', 'detalle', 'sub_detalle', 'fecha_desde', 'fecha_hasta', 'fecha_vencimiento', 'secuencia_desde', 'secuencia_hasta', 'estado', 'codigo_verificacion','etiqueta','ubicacion','rack','cuerpo'];

    
}
