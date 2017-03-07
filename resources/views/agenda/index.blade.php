<style>
    .fc-event { /*elementos del calendario*/
        cursor: pointer;
    }
</style>
<div class="box" ng-app="AppAgenda" ng-controller="CtrlApp">
    {{--modal edicion de evento--}}
    <div id="mod_mostrar_cita" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="modalTitle">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i> [[ modalTitle ]]
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-sm-7">
                            <h4 class="col-sm-6" for="">
                                <b>Agendado para:</b>
                            </h4>
                            <h4>[[ fechaInicio ]]</h4>
                        </div>
                        <div class="col-sm-7">
                            <h4 class="col-sm-6" for="">
                                <b>Hora:</b>
                            </h4>
                            <h4>[[ horaInicio ]]</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="pull-right">
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
    <div class="box-header">
        <a href="{{CRUDBooster::adminPath($slug='medico')}}">
            <button id="btn-agregar-cita" class="btn btn-info btn-sm">
                <i class="fa fa-calendar-check-o"></i> Agendar
            </button>
        </a>

    </div>
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div style="background: white" id="calendar"></div>
            </div>
        </div>
    </div>
    <div class="box-footer"></div>
</div>
{{--<script src="{{asset("js/Thread/Concurrent.Thread.js")}}"></script>--}}

<script>
    var agenda = angular.module("AppAgenda", [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    agenda.controller("CtrlApp", function ($scope, $http, $window,$timeout) {
        $scope.init = function () {
            $scope.uno = 0;
            $.get('{{ CRUDBooster::adminPath('medico/agenda/calendario') }}', function (data) {
            });
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                //defaultView: 'agendaWeek',
                locale: 'es', // tomado de locale
                buttonIcons: false,
                navLinks: true,
                editable: false,
                eventLimit: true,
                aspectRatio: 2,
                nowIndicator: true,
                titleFormat: 'MMMM D YYYY',
                columnFormat: 'dddd',
                //fixedWeekCount:true,
                //weekNumbers: true,
                timeFormat: 'H:mm',
                events: {
                    url: '{{ CRUDBooster::adminPath('medico/cita') }}'
                },
                eventRender: function (event, element) {
                    element.click(function () {
                        $("#mod_mostrar_cita").modal('show');
                        // colocar titulo
                        $scope.modalTitle = 'Cita Agendada - '+event.title;
                        $scope.fechaInicio = moment(event.start).format('DD/MM/YYYY');
                        $scope.horaInicio = moment(event.start).format('h:mm a');
                        $scope.paciente = moment(event.start).format('h:mm a');
                        $scope.$apply(); //refrescar el objeto $scope
                    });
                }
            });
        };
        /*
        *  Sincronizar agenda
        * */
        var countUp = function() {
            $scope.agendaWorker.load();
            $timeout(countUp, 4000);
        };

        $timeout(countUp, 500);
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
        $scope.reloadRoute = function () {
            $window.location.reload();
        };
        $scope.init(); //inicializar varios metodos
    });
    /*agenda.factory("HelloWorldService",['$q',function($q){
        var worker = new Worker('js/doWork.js');
        var defer = $q.defer();
        worker.addEventListener('message', function(e) {
            console.log('Worker said: ', e.data);
            defer.resolve(e.data);
        }, false);
        return {
            doWork : function(myData){
                defer = $q.defer();
                worker.postMessage(agendaWorker); // Send data to our worker.
                return defer.promise;
            }
        };

    }]);*/
</script>