<?php
$page_title = $agenda->nombre;
?>
@extends("crudbooster::admin_template")
@section("content")
    <style>
        .fc-time-grid .fc-slats td{ height: 40px !important; }
        .container-full {
            margin: 0 auto;
            width: 100%;
        }
    </style>
    {{--modal edicion de evento--}}
    <div ng-app="AppAgenda"
         ng-init="fecha=('{{Carbon\Carbon::now()->format('d/m/Y')}}');descripcion=('');agendar=(true);"
         ng-controller="CtrlApp" ng-cloack>
        @include("agenda.modals")
        <div class="box">
            <div class="box-header">
                <button ng-click="resetPanelCita()" type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Nueva Cita</button>
                <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}">
                    <button class="btn btn-default btn-sm"><i class="fa fa-male"></i> Nuevo paciente</button>
                </a>
                <button type="button" ng-click="agendaWorker.load()" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Actualizar</button>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div style="background: white;" id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
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
