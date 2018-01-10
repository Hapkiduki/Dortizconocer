<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Cita extends Model
{
    //Colocamos el nombre de la tabla
    protected $table = "tipo_cita";

    //Definimos los campos que queremos mostrar al usuario
    protected $fillable = ['descripcion'];

    public function appoinmets()
    {
        return $this->hasMany('App\Appoinment');
    }
}
