<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terapia extends Model
{
    //Colocamos el nombre de la tabla
    protected $table = "terapia";

    //Definimos los campos que queremos mostrar al usuario
    protected $fillable = ['usuario_id', 'descripcion', 'hora_ini', 'hora_fin', 'dias', 'desde', 'hasta', 'estado'];

    public function user(){
        $this->belongsTo('App\User');
    }

    public function diagnosticos(){
        return $this->hasMany('App\Diagnostico');
    }
}
