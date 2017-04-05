<?php

namespace App\Http\Controllers;

use App\CmsUser;
use Illuminate\Http\Request;
use App\ModMedico;
use App\ModAgenda;
use App\ModPaciente;
use Carbon\Carbon;
use App\HorarioMedico;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paciente = $this->getPaciente(\CRUDBooster::myId());
        return view('paciente.index',["paciente"=>$paciente]);
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
     */
    public function show($id)
    {
        //
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
        //
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
    public function search(Request $request){
        $medico = ModMedico::where('nombre','like','%'.$request->get('busqueda').'%')
                            ->orWhere('apellido','like','%'.$request->get('busqueda').'%')
                            ->orWhere('especialidad','like','%'.$request->get('busqueda').'%')
                            ->get();
        return response()->json([
            "medico"=>$medico
        ]);
    }
    public function allMedic(){
        $medico = ModMedico::all();
        return response()->json([
            "medico"=>$medico
        ]);
    }
    public function citaDisponible(Request $request){
        $fecha = Carbon::parse($request->get('fecha'))->format('Y-m-d');
        $resultado = ModAgenda::where("medico_id",$request->get('medico_id'))
                                    ->with(["cita"=>function($query) use($fecha){
                                        $query->where("start","like","%".$fecha."%")
                                                ->where("trash","=",null)
                                                ->orderBy("start","asc");
                                    }])->get();
        return response()->json([
            "agenda"=>$resultado
        ]);
    }
    public function getBusinessHours(Request $request){
        $fecha = Carbon::parse($request->get('fecha'))->format('Y-m-d');
        $resultado = HorarioMedico::where("medico_id",$request->get('medico_id'))->get();
        return response()->json([
            "businessHours"=>$resultado
        ]);
    }
    public function verifyPaciente (Request $r){
        $p = ModPaciente::where('cedula','=',$r->get('cedula'))->first();
        $cu = CmsUser::where('id','=',$p->cms_user_id);
        return response()->json([
            "p"=>$p,
            "cu"=>$cu
        ]);
    }
    public function getPaciente($cms_user_id){ //devuelve json de paciente buscado
        $paciente = ModPaciente::where("cms_user_id",$cms_user_id)->first();
        return $paciente;
    }
}
