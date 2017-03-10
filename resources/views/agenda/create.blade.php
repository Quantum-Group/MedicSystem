<?php
$page_title = $agenda->nombre;
?>
@extends("crudbooster::admin_template")
@section("content")
    <style>
        .fc-time-grid .fc-slats td{ height: 40px !important; }
    </style>
    {{--modal edicion de evento--}}
    <div ng-app="AppAgenda"
         ng-init="fecha=('{{Carbon\Carbon::now()->format('d/m/Y')}}');descripcion=('');agendar=(true);"
         ng-controller="CtrlApp" ng-cloack>
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
                <button ng-click="resetPanelCita()" type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Nueva Cita</button>
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
                {{--Panel de gestion de citas--}}
                <panel-cita></panel-cita>
                {{--FIN Panel de gestion de citas--}}
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
    <script type="text/javascript">
    /*
    * GLOBALS
    */
    AGENDA_ID = '{{$agenda->id}}';
    MEDICO_ID = '{{$medico->id}}';
      URL_CITAS = '{{ CRUDBooster::adminPath('medico/cita/'.$medico->id) }}';
      URL_MEDICO_CITA = '{{ CRUDBooster::adminPath('medico/cita')}}';
      URL_MEDICO_AGENDA = '{{ CRUDBooster::adminPath('medico/agenda')}}';
      OPTIONS_PACIENTE = '@foreach($paciente as $p)'+
          '<option value="{{$p->id}}">{{$p->nombre." ".$p->apellido}}</option>'+
          '@endforeach';
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
