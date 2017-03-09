<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModCita extends Model
{
    protected $table ="cita_calendario";
    protected $primaryKey ="id";
    protected $fillable =[
        "paciente_id",
        "detalle_cita",
        "agenda_id",
        "estado_cita",
        "start",
        "end",
        "title",
        "color",
        "trash"
    ];

    public function agenda(){
        return $this->belongsTo('\App\ModAgenda');
    }
    public function paciente(){
        return $this->belongsTo('\App\ModPaciente');
    }
}
