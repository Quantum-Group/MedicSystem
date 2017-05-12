<?php


Route::resource('/admin/medico/agenda', 'AdminAgendaController');
Route::get('/admin/medico/dashboard', 'AdminMedico1Controller@dashboard');
Route::get('/admin/medico/dashboard/{id}', 'AdminCitaController@medico_citas');
Route::resource('/admin/medico/cita','AdminCitaController');
Route::resource('admin/pacientes','PacienteController');
Route::get('admin/buscarMedico','PacienteController@search');
Route::post('admin/medico/update','AdminMedico1Controller@update');
Route::get('admin/todoMedico','PacienteController@allMedic');
Route::get('admin/citaDisponible','PacienteController@citaDisponible');
Route::get('admin/citaDisponible/businessHours','PacienteController@getBusinessHours');
Route::resource('/admin/paciente/registro', 'RegistroController');
Route::get('admin/verifyPaciente','PacienteController@verifyPaciente');
Route::get('admin/getPaciente','PacienteController@getPaciente');
Route::resource('admin/user','CmsUserController');
  /* 
      | ---------------------------------------------------------------------- 
      | Devuelve una lista completa de pacientes
      | ----------------------------------------------------------------------     
      |
      */
      Route::get('admin/paciente_all','PacienteController@paciente_all');
  /* 
      | ---------------------------------------------------------------------- 
      | Busqueda de paciente en el paso 1 de agregar/editar pedido
      | ----------------------------------------------------------------------     
      |
      */
      Route::get('admin/paciente/buscarPaciente','PacienteController@buscarPaciente');


//----- Start Route Orden_examen -----//
      Route::get('admin/orden_examenes/{id}/print', 'AdminOrdenExamenesController@printPDF');
      Route::post('admin/orden_examenes', 'AdminOrdenExamenesController@store');
      Route::put('admin/orden_examenes/{id}', 'AdminOrdenExamenesController@update');
// ------  End Route orden_examen ----/////
