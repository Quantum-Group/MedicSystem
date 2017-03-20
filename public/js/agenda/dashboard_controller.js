agenda.controller("CtrlApp", function ($scope, $http, $window,$timeout) {
    $scope.init = function () {
        $scope.uno = 0;

        $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
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
                    url: URL_CITAS
            },
            eventRender: function (event, element) {
            element.click(function () {
                $("#mod_mostrar_cita").modal('show');
                // colocar titulo
                $scope.modalTitle = 'Cita Agendada - '+event.title;
                $scope.fechaInicio = moment(event.start).format('DD/MM/YYYY');
                $scope.horaInicio = moment(event.start).format('h:mm a');
                $scope.paciente = moment(event.start).format('h:mm a');
                $scope.observ = event.detalle_cita;
                $scope.sel_convenio = event.sel_convenio;
                $scope.autorizacion = event.convenio.autorizacion;
                $scope.fecha_autorizacion = event.convenio.fecha_autorizacion;
                $scope.fecha_vence = event.convenio.fecha_vence;
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
    $scope.init();//inicializar varios metodos
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