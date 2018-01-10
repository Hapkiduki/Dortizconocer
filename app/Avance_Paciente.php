<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance_Paciente extends Model
{
    //Colocamos el nombre de la tabla
    protected $table = "avance_paciente";

    //Definimos los campos que queremos mostrar al usuario
    protected $fillable = ['diagnostico_id', 'descripcion'];

    public function diagnosico(){
        $this->belongsTo('App\Diagnostico');
    }
}
