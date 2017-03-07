<?php


Route::resource('/admin/medico/agenda', 'AdminAgendaController');
Route::resource('/admin/medico/cita','AdminCitaController');
Route::resource('admin/pacientes','PacienteController');
Route::get('admin/buscarMedico','PacienteController@search');
Route::post('admin/medico/update','AdminMedico1Controller@update');
Route::get('admin/todoMedico','PacienteController@allMedic');
Route::get('admin/citaDisponible','PacienteController@citaDisponible');
Route::resource('/admin/paciente/registro', 'RegistroController');
Route::get('admin/verifyPaciente','PacienteController@verifyPaciente');
Route::get('admin/getPaciente','PacienteController@getPaciente');
Route::resource('admin/user','CmsUserController');
