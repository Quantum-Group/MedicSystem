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
    <script>
        var agenda = angular.module("AppAgenda", [], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });
        agenda.controller("CtrlApp", function ($scope, $http, $window,$timeout) {
            $scope.init = function () {
                $(".select2").select2();
                $('#fecha').datepicker({
                    language:'es',
                    autoclose: true,
                    format: 'dd/mm/yyyy'
                });
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next, today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    height: 430, //alto del calendario
                    defaultView: 'agendaWeek',
                    locale: 'es', // tomado de locale
                    buttonIcons: true,
                    navLinks: true,
                    editable: true,
                    eventLimit: true,
                    aspectRatio: 2,
                    nowIndicator: true,
                    slotDuration:'00:15:00',
                    titleFormat: 'MMMM D YYYY',
                    columnFormat: 'dddd',
                    //fixedWeekCount:true,
                    //weekNumbers: true,
                    timeFormat: 'H:mm',
                    events: {
                        url: '{{ CRUDBooster::adminPath('medico/cita/'.$medico->id) }}'
                    },
                    eventRender: function (event, element) {
                        element.click(function () {
                            //cambiar color panel
                            $scope.panelModCita(event);

                        });
                    },
                    eventResize: function (event, delta, revertFunc) {
                        $scope.panelModCita(event);
                        //alert(event.title + " end is now " + event.end.format());

                        /*if (!confirm("is this okay?")) {
                         revertFunc();
                         }*/

                    },
                    eventDrop: function (event, delta, revertFunc) {

                        $scope.panelModCita(event);

                    }
                });
            };
            $scope.panelModCita = function (event) {
                /*
                 * Cambiar colores del panel de crear o modificar citas
                 * */
                var panel = $("#pan-nueva-cita");
                panel
                        .removeClass("panel-primary")
                        .addClass("carrot")
                        .find(".panel-body")
                        .css("background-color", "white");
                //color de la cabecera del panel
                var heading = panel.find("#heading");
                heading.addClass("white-header");

                // cambiar los nombres de la cabecera del panel
                heading.html('<i class="fa fa-edit"></i> Modificar Cita');

                //buscar el paciente en el select-option y asignar el valor del paciente
                $("#select-paciente").val(event.paciente_id).trigger("change");
                //asignar fecha y hora

                //rellenar datos
                //cambiar la ruta del form para hacer un put/patch
                $("#methodPatch").remove(); //metodo patch requerido para el recurso update
                $("#form-cita")
                        .attr({"action": '{{ CRUDBooster::adminPath('medico/cita')}}' + '/' + event.id})
                        .append('<input id="methodPatch" type="hidden" name="_method" value="PATCH">');
                $scope.cita_id = event.id;
                $scope.descripcion = event.detalle_cita;
                $scope.fecha = moment(event.start).format('DD/MM/YYYY');
                $scope.horaInicio = moment(event.start).format('H:mm a');
                $scope.horaFin = moment(event.end).format('H:mm a');
                $scope.start = moment(event.start, 'YYYY/MM/DD,H:mm').format();
                $scope.end = moment(event.end, 'YYYY/MM/DD,H:mm').format();
                //cambio de botones
                $scope.modificar = true;
                $scope.agendar = false;
                $scope.$apply(); //refrescar el objeto $scope

            };
            $scope.eliminarCita = function(){
                swal({
                    title: '¿Desea eliminar la cita médica?',
                    type:'info',
                    showCancelButton:true,
                    allowOutsideClick:true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false
                }, function(){
                    $http({
                        url: '{{ CRUDBooster::adminPath('medico/cita')}}' + '/' + $scope.cita_id,
                        method: 'POST',
                        data: {"_method":"DELETE"},
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(function (data) {
                        if(data.data.response == true) {
                            swal("Correcto!", "Cita eliminada correctamente!", "success");
                            swal({
                                title:"Correcto!",
                                type:"success",
                                text:"Cita eliminada correctamente!"
                            },function(){
                                $scope.reloadRoute();
                            });
                            //$scope.panelNewCita();
                             //$("#calendar").fullCalendar("refetchEvents");
                        }else {
                            swal("Error!", "No se pudo borrar la cita!", "error");
                        }
                    });
                });
            };
            $scope.panelNewCita = function () {
                var panel = $("#pan-nueva-cita");
                panel
                        .removeClass("carrot")
                        .addClass("panel-primary")
                        .find(".panel-body")
                        .css("background-color", "white");
                //color de la cabecera del panel
                var heading = panel.find("#heading");
                heading.addClass("white-header");
                $("#methodPatch").remove();
                $("#form-cita")
                        .attr({"action": '{{ CRUDBooster::adminPath('medico/cita')}}' + '/'});
                // cambiar los nombres de la cabecera del panel
                heading.html('<i class="fa fa-file-o"></i> Agendar Cita');
                $scope.modificar = false;
                $scope.agendar = true;
            };
            $scope.reloadRoute = function () {
                $window.location.reload();
            };
            $scope.init(); //inicializar varios metodos
            $scope.showModalDate = function () {
                $("#mod_agregar_cita").modal("show");
            };
            $scope.setDateTime = function () {
                /*
                 *  Agregar datos de tiempo a los input para ser enviados con submit
                 * */
                var hora_inicio = $scope.horaInicio.split(" "); //obtener solo la hora
                var hora_fin = $scope.horaFin.split(" ");
                //convertir a tipo aceptado por el calendario uniendo fecha y hora
                $scope.start = moment($scope.fecha + "," + hora_inicio[0], 'DD/MM/YYYY,H:mm').format();
                $scope.end = moment($scope.fecha + "," + hora_fin[0], 'DD/MM/YYYY,H:mm').format();
                $("#start").remove();
                $("#end").remove();
                $("#form-cita").append('<input id="start" ng-model="start" type="hidden" name="start" value="' + $scope.start + '">' +
                        '<input id="end" ng-model="end" type="hidden" name="end" value="' + $scope.end + '"> ');
            };
            /*
             *  Sincronizar agenda
             * */
            var countUp = function() {
                $scope.agendaWorker.load();
                $timeout(countUp, 4000);
            };

            //$timeout(countUp, 500);
            $scope.agendaWorker = {
                load:function(){
                    console.log(true);
                    $("#calendar").fullCalendar("refetchEvents");
                }
            };
            /*
             * -->
             *
             * */
            $scope.submit = function (e) {
                e.preventDefault();
                $scope.setDateTime();
                var fd = $("#form-cita"),
                        url = fd.attr("action"),
                        data = fd.serialize();
                swal({
                    title: "Procesando",
                    text: 'Espere...',
                    showConfirmButton: false
                });
                $http({
                    url: url,
                    method: 'POST',
                    data: data,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function (data) {
                    if(data.data.response){
                        swal({
                            title: "Correcto!",
                            text: 'Realizado con éxito!',
                            timer: 500,
                            type:"success",
                            showConfirmButton: false
                        },function(){
                            $scope.reloadRoute();
                        });
                    }else {
                        swal("Error!", "Error en la transacción!", "error");
                    }
                });
            };
            // cambiar formato de fecha 01/11/2017 a 2017-01-11 // not used
            $scope.formatDate = function (date) {
                var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [year, month, day].join('-');
            };
        });
        agenda.directive('horaInicio', function () {
            return {
                restrict: 'E',
                require: 'ngModel',
                replace: true,
                link: function (scope, element, attrs) {
                    scope.timings = ['7:00 am', '7:15 am', '7:30 am', '7:45 am', '8:00 am', '8:15 am',
                        '8:30 am', '8:45 am', '9:00 am', '9:15 am', '9:30 am', '9:45 am',
                        '10:00 am', '10:15 am', '10:30 am', '10:45 am', '11:00 am', '11:15 am', '11:30 am', '11:45 am',
                        '12:00 pm', '12:15 pm', '12:30 pm', '12:45 pm', '13:00 pm', '13:15 pm',
                        '13:30 pm', '13:45 pm', '14:00 pm', '14:15 pm', '14:30 pm', '14:45 pm',
                        '15:00 pm', '15:15 pm', '15:30 pm', '15:45 pm', '16:00 pm', '16:15 pm',
                        '16:30 pm', '16:45 pm', '17:00 pm', '17:15 pm', '17:30 pm', '17:45 pm',
                        '18:00 pm', '18:15 pm', '18:30 pm', '18:45 pm', '19:00 pm', '19:15 pm',
                        '19:30 pm', '19:45 pm', '20:00 pm', '20:15 pm', '20:30 pm', '20:45 pm',
                        '21:00 pm', '21:15 pm', '21:30 pm', '21:45 pm', '22:00 pm', '22:15 pm',
                        '22:30 pm', '22:45 pm', '23:00 pm', '23:15 pm', '23:30 pm', '23:45pm',
                        '00:00 am', '00:15 am', '00:30 am', '00:45 am', '1:00 am', '1:15 am',
                        '1:30 am', '1:45 am', '2:00 am', '2:15 am', '2:30 am', '2:45 am',
                        '3:00 am', '3:15 am', '3:30 am', '3:45 am', '4:00 am', '4:15 am',
                        '4:30 am', '4:45 am', '5:00 am', '5:15 am', '5:30 am', '5:45 am',
                        '6:00 am', '6:15 am', '6:30 am', '6:45 am'
                    ];

                },
                template: '<select class="form-control" name="hora_inicio" id="horaInicio"><option value="[[time]]" ng-repeat="time in timings">[[time]]</option></select>'
            };
        });
        agenda.directive('horaFin', function () {
            return {
                restrict: 'E',
                require: 'ngModel',
                replace: true,
                link: function (scope, element, attrs) {
                    scope.timings = ['7:00 am', '7:15 am', '7:30 am', '7:45 am', '8:00 am', '8:15 am',
                        '8:30 am', '8:45 am', '9:00 am', '9:15 am', '9:30 am', '9:45 am',
                        '10:00 am', '10:15 am', '10:30 am', '10:45 am', '11:00 am', '11:15 am', '11:30 am', '11:45 am',
                        '12:00 pm', '12:15 pm', '12:30 pm', '12:45 pm', '13:00 pm', '13:15 pm',
                        '13:30 pm', '13:45 pm', '14:00 pm', '14:15 pm', '14:30 pm', '14:45 pm',
                        '15:00 pm', '15:15 pm', '15:30 pm', '15:45 pm', '16:00 pm', '16:15 pm',
                        '16:30 pm', '16:45 pm', '17:00 pm', '17:15 pm', '17:30 pm', '17:45 pm',
                        '18:00 pm', '18:15 pm', '18:30 pm', '18:45 pm', '19:00 pm', '19:15 pm',
                        '19:30 pm', '19:45 pm', '20:00 pm', '20:15 pm', '20:30 pm', '20:45 pm',
                        '21:00 pm', '21:15 pm', '21:30 pm', '21:45 pm', '22:00 pm', '22:15 pm',
                        '22:30 pm', '22:45 pm', '23:00 pm', '23:15 pm', '23:30 pm', '23:45pm',
                        '00:00 am', '00:15 am', '00:30 am', '00:45 am', '1:00 am', '1:15 am',
                        '1:30 am', '1:45 am', '2:00 am', '2:15 am', '2:30 am', '2:45 am',
                        '3:00 am', '3:15 am', '3:30 am', '3:45 am', '4:00 am', '4:15 am',
                        '4:30 am', '4:45 am', '5:00 am', '5:15 am', '5:30 am', '5:45 am',
                        '6:00 am', '6:15 am', '6:30 am', '6:45 am'
                    ];

                },
                template: '<select class="form-control" name="hora_fin" id="horaFin"><option value="[[time]]" ng-repeat="time in timings">[[time]]</option></select>'
            };
        });

    </script>
@endsection