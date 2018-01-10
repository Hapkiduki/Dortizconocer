<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    //Colocamos el nombre de la tabla
    protected $table = "diagnostico";

    //Definimos los campos que queremos mostrar al usuario
    protected $fillable = ['terapia_id', 'fecha'];

    public function terapia(){
        $this->belongsTo('App\Terapia');
    }

    public function avance_paciene(){
        return $this->hasMany('App\Avance_Paciente');
    }

    public function avance_interno(){
        return $this->hasMany('App\Avance_Interno');
    }
}
