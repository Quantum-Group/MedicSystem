<?php

namespace App\Http\Controllers;

use App\ModConvenio;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\ModPaciente;
use App\ModMedico;
use App\ModAgenda;
use App\ModCita;
use App\Mail\CitaAgenda;
use Mail;
use Carbon\Carbon;

class AdminAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medico_id = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
        $agenda = ModAgenda::where("medico_id",$medico_id->id)->first();
        $paciente = ModPaciente::all();
        $medico = ModMedico::find($medico_id->id);
        $page_title = "Agendar Cita";
        return view('agenda.create',compact('page_title'),["paciente"=>$paciente,"agenda"=>$agenda,"medico"=>$medico]);
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
        if($request->get("color") == "#7f8c8d"){ // si se cumple el color, es la accion cancelar cita
            $cita = ModCita::findOrFail($request->get("cita_id"));
            $cita->color = $request->get("color");
            $response = $cita->save();
        }else {
            $cita = new ModCita;
            $paciente = ModPaciente::find($request->get("idpaciente"));
            $cita->paciente_id = $request->get("idpaciente");
            $cita->detalle_cita = $request->get("descripcion");
            $cita->agenda_id = $request->get("agenda_id");
            $cita->estado_cita = 1;
            $cita->start = $request->get("start");
            $cita->end = $request->get("end");
            $sel_convenio = explode(":",$request->get("sel_convenio"));
            $sel_convenio = $sel_convenio[1];
            $cita->sel_convenio = $sel_convenio;
            if (is_null($request->get("agenda_id"))) { //si es null viene por solicitud de usuario
                $a = ModAgenda::where("medico_id", "=", $request->get('medico_id'))->first();
                $agenda_id = $a->id;
                $cita->agenda_id = $agenda_id;
            } else { //si tiene valor viene por solicitud de call center
                $agenda_id = $request->get('agenda_id');
                $cita->agenda_id = $agenda_id;
            }
            $medico = ModMedico::find($request->get("medico_id"));
            $cita->title = ($medico->titulo . " " . $medico->nombre . " " . $medico->apellido . "," . $paciente->nombre . " " . $paciente->apellido);
            $response = $cita->save();

            if($response){// si se guarda la cita
               if($sel_convenio == "I.E.S.S."){ // si el convenio es I.E.S.S.
                   /*
                * Insertar el convenio si se ingresa datos
                * */
                   $convenio = new ModConvenio;
                   $convenio->cita_calendario_id = $cita->id;
                   $convenio->autorizacion = $request->get("autorizacion");
                   $date1 = Carbon::createFromFormat("d/m/Y",$request->get("fecha_autorizacion"))->format("Y-m-d");
                   $date2 = Carbon::createFromFormat("d/m/Y",$request->get("fecha_vence"))->format("Y-m-d");
                   $convenio->fecha_autorizacion = $date1;
                   $convenio->fecha_vence = $date2;
                   $convenio->save();
               }
                 /*
                  * Envio de e-mail cuando se guarda la cita
                  * */
                 $sendEmail = Mail::to($paciente->email)->send(new CitaAgenda($paciente));
            }
        }

        return response()->json([
            "response"=>$response,
            "cita"=>$cita,
            "sendEmail"=>$sendEmail
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $medico = ModMedico::find($id);
        return view('agenda.index',["medico"=>$medico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = ModAgenda::where("medico_id",$id)->first();
        $paciente = ModPaciente::all();
        $medico = ModMedico::find($id);
        $page_title = "Agendar Cita";
        return view('agenda.create',compact('page_title'),["paciente"=>$paciente,"agenda"=>$agenda,"medico"=>$medico]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
