<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModMedico extends Model
{
    protected $table='medico';
    protected $primaryKey='id';
    protected $fillable=[
        'titulo',
        'especialidad',
        'nombre',
        'apellido',
        'telefono',
        'cms_user_id'
    ];
    public function agenda(){
        return $this->hasOne('\App\ModAgenda','medico_id');
    }
}
