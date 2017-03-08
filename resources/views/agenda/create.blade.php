<?php
$page_title = $agenda->nombre;
?>
@extends("crudbooster::admin_template")
@section("content")
    <style>
        .fc-time-grid .fc-slats td{ height: 50px !important; }
    </style>
    {{--modal edicion de evento--}}
    <div ng-app="AppAgenda"
         ng-init="fecha=('{{Carbon\Carbon::now()->format('d/m/Y')}}');descripcion=('');agendar=(true);"
         ng-controller="CtrlApp">
        <div id="mod_agregar_cita" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="modalTitle"><i class="fa fa-clock-o" aria-hidden="true"></i> Fecha y
                            Hora</h3>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="">Fecha: </label>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input ng-model="fecha" id="fecha" type="text" class="form-control pull-right"
                                               id="datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="">Hora de Inicio:</label>
                                </div>
                                <div class="col-xs-6">
                                    <hora-inicio ng-model="horaInicio"></hora-inicio>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="">Hora de Fin:</label>
                                </div>
                                <div class="col-xs-6">
                                    <hora_fin ng-model="horaFin"></hora_fin>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="pull-right">
                                <button data-dismiss="modal" class="btn btn-success btn-sm"><i
                                            class="fa fa-plus-circle"></i> Aceptar
                                </button>
                                <button data-dismiss="modal" class="btn btn-default btn-sm"><i class="fa fa-close"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--fin modal edicion de evento--}}
        <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Nueva Cita</button>
                <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}">
                    <button class="btn btn-default btn-sm"><i class="fa fa-male"></i> Nuevo paciente</button>
                </a>
                <button type="button" ng-click="agendaWorker.load()" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Actualizar</button>
            </div>
            <div class="col-xs-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div style="background: white;" id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div id="pan-nueva-cita" class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 id="heading"><i class="fa fa-calendar-check-o"></i> Agendar Cita</h4>
                    </div>
                    <div class="panel-body">
                        {{Form::open(array('url'=>'/admin/medico/agenda','method'=>'post','id'=>'form-cita','name'=>'form-cita','ng-submit'=>'submit($event)'))}}
                        <input ng-model="agenda_id" type="hidden" name="agenda_id" value="{{$agenda->id}}">
                        <input ng-model="medico_id" type="hidden" name="medico_id" value="{{$medico->id}}">

                        <div class="form-group">
                            <label for=""> Seleccione el paciente:</label>
                            <select id="select-paciente" class="form-control select2" name="idpaciente">
                                @foreach($paciente as $p)
                                    <option value="{{$p->id}}">{{$p->nombre." ".$p->apellido}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="button" ng-click="showModalDate()" class="btn btn-default btn-sm"><i
                                            class="fa fa-clock-o"></i> Fecha
                                    y Hora
                                </button>
                            </div>
                            <div class="col-sm-7">
                                <h5 for=""><b>Fecha:</b> <a id="p_fecha">[[ fecha | date: "mediumDate" ]]</a></h5>
                                <h5 for=""><b>Desde:</b> <a id="p_desde">[[ horaInicio | date: "shortTime" ]]</a></h5>
                                <h5 for=""><b>Hasta:</b> <a id="p_hasta">[[ horaFin | date: "shortTime" ]]</a></h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Observaciones</label>
                        <textarea ng-model="descripcion" class="form-control" name="descripcion"
                                  cols="30"
                                  rows="6"></textarea>
                        </div>
                        <div class="form-group pull-right">
                            <button ng-show="modificar" ng-click="eliminarCita([[cita_id]])" type="button" class="btn btn-danger"><i style="font-size: 19px;"
                                                                                                class="fa fa-trash pull-left"></i>
                            </button>
                            <button ng-show="modificar" ng-click="reloadRoute()" style="margin-right: 5px;" type="reset"
                                    class="btn btn-info"><i class="fa fa-minus-circle"></i> Cancelar
                            </button>
                            <button ng-show="modificar" type="submit" class="btn btn-warning"><i
                                        class="fa fa-check"></i> Modificar
                            </button>
                            <button ng-show="agendar" type="submit" class="btn btn-success"><i class="fa fa-check"></i>
                                Agendar
                            </button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
    <script type="text/javascript">
    /*
    * GLOBALS
    */

      URL_CITAS = '{{ CRUDBooster::adminPath('medico/cita/'.$medico->id) }}';
      URL_MEDICO_CITA = '{{ CRUDBooster::adminPath('medico/cita')}}';
      /*
      * -->
      */
    </script>
    <!--  ANGULAR APP -->
    <script src="{{asset('js/agenda/app.js')}}"></script>
    <script src="{{asset('js/agenda/controller.js')}}"></script>
    <script src="{{asset('js/agenda/directive.js')}}"></script>
    <!--  ANGULAR APP -->

@endsection
