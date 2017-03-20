<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModPaciente;
use App\ModMedico;
use App\ModAgenda;
use App\ModCita;

class AdminCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = ModCita::all();
        return response()->json( $citas );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Carga las citas dentro del calendario (fullcalendar) de la agenda del doctor seleccionado $id
     */
    public function show($id)
    {
        $agenda = ModAgenda::where("medico_id",$id)->first();
        $agenda_id = $agenda->id;
        $citas = ModCita::where("agenda_id","=",$agenda_id)
                          ->where("estado_cita","=","1")
                          ->where("trash","=",null)
                          ->orWhere("trash","=",0) // los que no estan en papelera
                          ->with("convenio")
                          ->get();
        return response()->json( $citas );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cita = ModCita::findOrFail($id);
        if(!is_null($request->get("color"))){
            $cita->color = $request->get("color");
            $response = $cita->save();
        }else {
            $paciente = ModPaciente::find($request->get("idpaciente"));
            $cita->paciente_id = $request->get("idpaciente");
            $cita->detalle_cita = $request->get("descripcion");
            $cita->estado_cita = 1;
            $cita->start = $request->get("start");
            $cita->end = $request->get("end");
            $sel_convenio = explode(":",$request->get("sel_convenio"));
            $sel_convenio = $sel_convenio[1];
            $cita->sel_convenio = $sel_convenio;
            $agenda_id = $request->get("agenda_id");
            $medico = ModMedico::find($request->get("medico_id"));

            $cita->title = ($medico->titulo." ".$medico->nombre." ".$medico->apellido.",".$paciente->nombre." ".$paciente->apellido);

            $response = $cita->save();
            if($response){// si se guarda la cita
                if($sel_convenio == "I.E.S.S."){ // si el convenio es I.E.S.S.
                    /*
                 * Insertar el convenio si se ingresa datos
                 * */
                    $convenio = ModConvenio::where("cita_calendario_id",$cita->id)->find();
                    $convenio->cita_calendario_id = $cita->id;
                    $convenio->autorizacion = $request->get("autorizacion");
                    $date1 = Carbon::createFromFormat("d/m/Y",$request->get("fecha_autorizacion"))->format("Y-m-d");
                    $date2 = Carbon::createFromFormat("d/m/Y",$request->get("fecha_vence"))->format("Y-m-d");
                    $convenio->fecha_autorizacion = $date1;
                    $convenio->fecha_vence = $date2;
                    $convenio->save();
                }
                /*
                 * Envio de e-mail cuando se actualiza la cita
                 * */
                //$sendEmail = Mail::to($paciente->email)->send(new CitaAgenda());
            }
        }
        return response()->json([
            "response"=>$response
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = ModCita::findOrFail($id);
        $cita->trash = 1;
        $response = $cita->save();

        return response()->json([
            "response"=>$response
        ]);
    }
    /*
     * @$id: id de medico
     * funcion usada para el dashboard de medico
     * */
    public function medico_citas($id){
        $agenda = ModAgenda::where("medico_id",$id)->first();
        $citas = ModCita::where("agenda_id",$agenda->id)->get();
        return response()->json( $citas );
    }
}
