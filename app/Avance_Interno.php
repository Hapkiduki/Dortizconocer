<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance_Interno extends Model
{
    //Colocamos el nombre de la tabla
    protected $table = "avance_interno";

    protected $fillable = [
        'diagnostico_id', 'descripcion', 'dias','intervalo'
    ];

    public function diagnosico(){
        $this->belongsTo('App\Diagnostico');
    }
}
