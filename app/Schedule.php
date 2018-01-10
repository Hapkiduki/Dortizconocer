<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //Colocamos el nombre de la tabla
    protected $table = "schedules";

    protected $fillable = [
        'hora_ini', 'hora_fin', 'dias','intervalo'
    ];
}
