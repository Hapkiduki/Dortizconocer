<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    //Colocamos el nombre de la tabla
    protected $table = "appoinments";

    //Definimos los campos que queremos mostrar al usuario
    protected $fillable = ['tipo', 'descripcion', 'estado', 'tipo_cita_id', 'usuario_id', 'fec_hora', 'hora_ini', 'fec_fin'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tipo_cita(){
        return $this->belongsTo('App\Tipo_Cita');
    }
}
