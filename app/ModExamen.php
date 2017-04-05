<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModExamen extends Model
{
  protected $table='laboratorio';
	protected $primaryKey='id';
	protected $fillable=[
		'id_medico',
		'id_paciente',
    'slug',
    'nombre',
    'descripcion',
    'tipo'
  ];

  public function orden()
    {
        return $this->hasMany('ModOrdenExamenes');
    }
}
