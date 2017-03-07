@extends("crudbooster::admin_template")
@section("content")
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css"/>
    <style>
        .item {
            list-style: none;
        }

        .item a:link {
            text-decoration: none;
        }

        .itemMedic {
            cursor: pointer;
            -webkit-opacity: .9;
            -webkit-transition: 0.5s all ease-in-out;
        }

        .itemMedic:hover {
            box-shadow: 3px 4px 5px #888888;
            -webkit-opacity: 1;
            -webkit-transition: 0.5s all ease-in-out;
            -webkit-box-shadow: #333 2px 1px 6px;
            -webkit-transform: scale(1.2, 1.2);
            z-index: 5;
        }

        .checked {
            font-size: 2em;
            color: #2ecc71;
            position: absolute;
            float: right;
        }

        .shadow {
            -webkit-box-shadow: 1px 5px 18px 0px rgba(50, 50, 50, 0.75);
            -moz-box-shadow: 1px 5px 18px 0px rgba(50, 50, 50, 0.75);
            box-shadow: 1px 5px 18px 0px rgba(50, 50, 50, 0.75);
        }

        .list-group a:hover {
            background: #7f8c8d;
            color: white;
        }

        .steps {
            height: 800px;
            padding-top: 0px;
            overflow-y: auto
        }
    </style>
    <div ng-app="AppPaciente" ng-controller="CtrlApp"
         ng-init="hoy=('{{\Carbon\Carbon::now()}}');maniana=('{{\Carbon\Carbon::tomorrow()}}')"
         class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green bold uppercase">Agendar nueva cita</span>
            </div>
        </div>
        <div style="padding:0px" class="portlet-body">
            <div class="mt-element-step swMain" id="wizard">
                <ul class="row step-line">
                    <li id="paso1" class="col-md-4 mt-step-col first item">
                        <a href="#step-1">
                            <label class="mt-step-number bg-white stepNumber">1</label>

                            <div class="mt-step-title uppercase font-grey-cascade stepDesc">Médico / Especialidad</div>
                            <div class="mt-step-content font-grey-cascade">Seleccione el médico o especialidad</div>
                        </a>
                    </li>
                    <li class="col-md-4 mt-step-col item">
                        <a href="#step-2">
                            <label class="mt-step-number bg-white stepNumber">2</label>

                            <div class="mt-step-title uppercase font-grey-cascade stepDesc">Cita disponible</div>
                            <div class="mt-step-content font-grey-cascade">Seleccione una cita disponible</div>
                        </a>
                    </li>
                    <li class="col-md-4 mt-step-col item">
                        <a href="#step-3">
                            <label class="mt-step-number bg-white stepNumber">3</label>

                            <div class="mt-step-title uppercase font-grey-cascade">Finalizar</div>
                            <div class="mt-step-content font-grey-cascade">Revisar y enviar</div>
                        </a>
                    </li>
                </ul>
                <div id="step-1" class="container steps">
                    {{--contenido--}}
                    <div class="well">
                        <div class="row">
                            <div class="col-sm-5">
                                <select ng-model="especialidad" ng-change="buscar()" name="especialidad"
                                        class="selectpicker show-menu-arrow" title="Especialidad">
                                    <option value=""></option>
                                    <option value="Traumatolog">Traumatología</option>
                                    <option value="Odontolo">Odontología</option>
                                    <option value="Urolog">Urología</option>
                                    <option value="Cirug">Cirugía</option>
                                    <option value="Laboratorio">Laboratorio</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                {{Form::open(array('url'=>CRUDBooster::adminPath('buscarMedico'),'method'=>'get','ng-submit'=>'submit($event)','id'=>'form-busqueda','name'=>'form-busqueda'))}}
                                <div class="input-group">
                                    <input ng-change="ajuste()" ng-model="busqueda" type="text" name="busqueda"
                                           class="form-control"
                                           placeholder="Ingrese nombre o especialidad...">
                                <span class="input-group-btn">
                                  <button class="btn btn-danger" type="button"><i class="fa fa-search"></i>
                                  </button>
                                </span>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    <div class="well">
                        <div class="m-grid m-grid-full-height shadow">
                            <lista-medico></lista-medico>
                        </div>
                    </div>
                    {{--fin contenido--}}
                </div>
                <div class="steps" id="step-2">
                    <div class="panel panel-primary">
                        <div style="padding: 0px;" class="panel-heading">
                            <div style="padding: 0px;" class="container-fluid">
                                <div class="col-sm-4">
                                <h3><i class="fa fa-user-md"></i> [[medico_titulo+" "+medico_nombre+"
                                    "+medico_apellido]]
                                </h3>
                                </div>
                                <div class="col-sm-4">
                                        <div class="row bg-success ">
                                            <div class="col-sm-12 pull-left">
                                                <a href="javascript:void(0)" ng-click="citaDisponible(hoy)"
                                                   class="btn btn-link"><i class="fa fa-chevron-right" aria-hidden="true"></i> Hoy</a>
                                                <a href="javascript:void(0)" ng-click="citaDisponible(maniana)"  class="btn btn-link"><i
                                                            class="fa fa-chevron-right" aria-hidden="true"></i> Mañana</a>
                                                <a href="javascript:void(0)"  class="btn btn-link"><i
                                                            class="fa fa-chevron-right" aria-hidden="true"></i> Calendario</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-4 pull-left">
                                    <h4 style="color:white" class="pull-right"><b>Fecha:</b> [[ f_selected |
                                        date:'yyyy']]
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div id="selContent" class="panel-body">
                            <div class="container-fluid">
                                    <load-ing></load-ing>
                                    <citas-disponibles></citas-disponibles>
                                {{--<div class="col-sm-2">
                                    <button ng-click="goFoward()" class="btn btn-success">Continuar <i
                                                class="fa fa-arrow-right"></i></button>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-3" class="shadow steps">
                    <div class="col-sm-12 bg-info">
                        <h2>Confirmación <i class="fa fa-check-circle-o" aria-hidden="true"></i></h2>
                    </div>
                    <span class="clearfix"></span>
                    <br>
                    <h4 class=""><b>* Cita con el Médico: </b>[[medico_titulo+" "+medico_nombre+" "+medico_apellido]]
                    </h4>
                    <h4 class=""><b>* Nombre del paciente: </b> {{CRUDBooster::myName()}}</h4>
                    <h4 class=""><b>* Fecha de la Cita: </b> [[f_selected]]</h4>
                    <h4 class=""><b>* Hora de la Cita: </b> [[hora_cita_selected]]</h4>
                    <div class="col-sm-2 pull-right">
                        <button ng-click="agendarCita()" class="btn btn-success"> Enviar <i class="fa fa-send"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery.smartWizard.js')}}"></script>
    <script>
        var cita = angular.module("AppPaciente", ["ngAnimate"], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });
        cita.controller("CtrlApp", function ($scope, $http, $window) {
            $scope.initGrid = function initGrid() {
                $('.grid').masonry({
                    // options
                    itemSelector: '.grid-item',
                    percentPosition: false,
                    transitionDuration: '1s',
                    stagger: 30,
                    gutter: 10,
                    animationOptions: {
                        duration: 400
                    }
                });
            };
            $scope.init = function () {
                $scope.medico_id = 0; //id medico seleccionado
                $scope.medico_titulo = ''; //id medico seleccionado
                $scope.medico_nombre = '';
                $scope.medico_apellido = '';
                $scope.hora_cita_selected =''; // usado para el paso 3
                $scope.start_selected = ''; //datos para envio
                $scope.end_selected = '';//datos para envio
                $scope.f_selected = ''; //almacena la fecha seleccionada
                $scope.timings = ['7:00 am', '7:15 am', '7:30 am', '7:45 am', '8:00 am', '8:15 am',
                    '8:30 am', '8:45 am', '9:00 am', '9:15 am', '9:30 am', '9:45 am',
                    '10:00 am', '10:15 am', '10:30 am', '10:45 am', '11:00 am', '11:15 am', '11:30 am', '11:45 am',
                    '12:00 pm', '12:15 pm', '12:30 pm', '12:45 pm', '13:00 pm', '13:15 pm',
                    '13:30 pm', '13:45 pm', '14:00 pm', '14:15 pm', '14:30 pm', '14:45 pm',
                    '15:00 pm', '15:15 pm', '15:30 pm', '15:45 pm', '16:00 pm', '16:15 pm',
                    '16:30 pm', '16:45 pm', '17:00 pm', '17:15 pm', '17:30 pm', '17:45 pm',
                    '18:00 pm', '18:15 pm', '18:30 pm', '18:45 pm', '19:00 pm', '19:15 pm',
                    '19:30 pm', '19:45 pm'
                ];
                $("section.content-header").remove();
                $http({
                    url: '{{CRUDBooster::adminPath()."/todoMedico"}}',
                    method: 'GET',
                    params: {busqueda: $scope.busqueda},
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function (response) {
                    if (response.data.medico) {
                        $scope.medico = response.data.medico;
                        $scope.$watch('medico', function () {
                            if ($scope.busqueda != '') {
                                $scope.ajuste();
                            }
                        });
                    } else {
                        swal("Error!", "Error en la transacción!", "error");
                    }
                });
            };
            $scope.init();
            $scope.goForward = function () {
                $("#wizard").smartWizard('goForward');
            };
            $scope.reloadRoute = function () {
                $window.location.reload();
            };
            $scope.agendarCita = function () {
                swal({
                    title: "Procesando",
                    text: 'Espere...',
                    showConfirmButton: false
                });
                $scope.f_selected = moment($scope.f_selected,"LL").format('YYYY-MM-DD');
                console.log($scope.f_selected);
                $scope.start_selected = moment($scope.f_selected+" "+$scope.start_selected,'YYYY-MM-DD H:mm').format();
                $scope.end_selected = moment($scope.f_selected+" "+$scope.end_selected,'YYYY-MM-DD H:mm').format();
                // obtener id de paciente basado en id de usuario
                var data = {
                    "start":$scope.start_selected,
                    "end":$scope.end_selected,
                    "idpaciente":'{{$paciente->id}}',
                    "medico_id":$scope.medico_id,
                    "descripcion":'Realizado por el usuario'
                };

                $http({
                    url: '{{ CRUDBooster::adminPath('medico/agenda')}}',
                    method: 'POST',
                    data: data,
                    headers: {
                        'Content-Type': 'application/json '
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
                //$window.location.reload();
            };
            $scope.buscar = function () {
                $scope.busqueda = $scope.especialidad;
            };
            $scope.selected = function (index, titulo, nombre, apellido) {
                $scope.check = [];
                $scope.medico_id = index;
                $scope.medico_titulo = titulo;
                $scope.medico_nombre = nombre;
                $scope.medico_apellido = apellido;
                $scope.check[index] = true;
                $("#wizard").smartWizard('goForward');
            };
            $scope.selectHorario = function(start,end,estado){
                if(estado == 'Disponible'){
                    $scope.start_selected = start;
                    $scope.end_selected = end;
                    $scope.hora_cita_selected = start+'-'+end;
                    $scope.goForward();
                }else {
                    swal({
                        title: "Alerta!",
                        text: "Seleccione una cita disponible!",
                        type: "warning",
                        confirmButtonText: "Ok"
                    });
                }

            };
            $scope.submit = function (e) {
                e.preventDefault();
            };
            $scope.ajuste = function () {
                wizard();
            };
            $scope.citaDisponible = function (fecha) {
                $scope.loading=true;
                $scope.f_selected = moment(fecha).format('LL');
                $http({
                    url: '{{CRUDBooster::adminPath()."/citaDisponible"}}',
                    method: 'GET',
                    params: {
                        medico_id: $scope.medico_id,
                        fecha: fecha
                    },
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function (response) {
                    $scope.loading = false;
                    $scope.cDisponible = []; //guarda las citas disponibles procesadas
                    $scope.resultadoCitas = {};
                    $scope.resultadoCitas = response.data.agenda[0].cita;
                    angular.forEach($scope.timings, function (key, value) { // linea de tiempo key == LT
                        var obj = {},//objeto temporal para agregar al array cDisponible
                                verify = false;
                        angular.forEach($scope.resultadoCitas, function (clave, valor) {
                            try {
                                var horaLc = moment(clave.start).format('H:mm a'); // hora linea de citas ex: 7:15 am
                                //console.log(horaLc + " es igual 1 ???" + key);
                                //si es diferente sumarle 15 min y guardarlo como una cita disponible
                                if (horaLc == key) { // si es igual la linea de tiempo y linea de cita crear objeto no disponible
                                    obj = {
                                        start: key,
                                        end: moment(clave.end).format('H:mm a'),
                                        estado: 'No Disponible'
                                    };
                                    $scope.cDisponible.push(obj);
                                    //console.log(" SI ES IGUAL 1 ");
                                    verify = true; //verdadero que existe una cita
                                }
                            } catch (err) {
                            }
                        });
                        // si es false ingresa a poner en el objeto el nuevo item sumado 15 min
                        if (!verify) {
                            obj = {
                                start: key,
                                end: moment(key, 'H:mm a').add(0.25, 'hours').format('H:mm a'),
                                estado: 'Disponible'
                            };
                            //console.log(obj.start + " es igual " + obj.end);

                            $scope.cDisponible.push(obj);
                        } else {
                            // existe una cita no disponible
                            //remover los intervalos internos del objeto
                            //saber los objetos internos
                            var inicio_ciclo = obj.start;
                            var fin_ciclo = obj.end;
                            var next_cicle = moment(obj.start, 'H:mm a').add(0.25, 'hours').format('H:mm a');
                            //imprimir todos los ciclos internos
                            while (next_cicle != fin_ciclo) {
                                //eliminar cada ciclo interno del objeto
                                //buscar el ciclo next_cicle en el objeto para borrarlo
                                angular.forEach($scope.timings, function (ks, vl) { // ks == hora de timings
                                    if (next_cicle == ks) {
                                        //remover el objeto siguiente
                                        $scope.timings.splice(vl,1);
                                    }
                                });
                                next_cicle = moment(next_cicle, 'H:mm a').add(0.25, 'hours').format('H:mm a');
                            }
                        }
                    });
                });
            };
        });
        cita.directive('listaMedico', function ($timeout) {
            return {
                restrict: 'E',
                replace: 'true',
                link: function (scope, element, attr) {
                    if (scope.$last === true) {
                        $timeout(function () {
                            scope.$emit(attr.onFinishRender);
                        });
                    }
                },
                template: '<div class="col-sm-2 grid-item" ng-repeat="m in medico | filter:busqueda" ng-click="selected(m.id,m.titulo,m.nombre,m.apellido)">' +
                '<div class="panel itemMedic">' +
                '<i ng-show="check[m.id]" class="fa fa-check-circle checked"></i>' +
                '<div class="panel-body">' +
                '<img class="img-responsive" src="{{asset('img/doctor.png')}}" alt="">' +
                '<h5>[[m.titulo+" "+m.nombre+" "+m.apellido]]</h5>' +
                '<small>[[m.especialidad]]</small>' +
                '</div>' +
                '</div>' +
                '</div>'
            };
        });
        /*
        *  citasDisponibles:  Carga las citas disponibles basado en ng-repeat con json devuelto
        * */
        cita.directive('citasDisponibles', function () {
            return {
                restrict: 'E',
                replace: true,
                link: function (scope, element) {
                    if (scope.$last === true) {
                        element.ready(function () {
                        });
                    }
                },
                template: '<div ng-show="!loading" style="max-height: 400px;overflow-y: auto;" class="list-group">' +
                '<div class="list-group-item"><b>HORARIO</b> <b class="pull-right">ESTADO</b> </div>' +
                '<a ng-click="selectHorario(res.start,res.end,res.estado)" href="javascript:void(0)" ng-repeat="res in cDisponible" class="list-group-item">[[ res.start]] - [[res.end]] <button class="btn [[ res.estado == \'Disponible\' ? \'btn-success\':\'btn-danger\' ]] btn-xs pull-right">[[res.estado]]</button></a>' +
                '</div>'
            }
        });
        cita.directive('loadIng',function(){
            return {
                restrict: 'E',
                replace: false,
                link: function (scope, element) {
                    if (scope.$last === true) {
                        element.ready(function () {
                        });
                    }
                },
                template: '<div ng-show="loading"><i class="fa fa-refresh fa-spin fa-3x fa-fw col-sm-offset-4"></i><span class="alert bg-warning"><b> Espere...</b></span></div>'
            }
        });
        function wizard() {
            $("#wizard").smartWizard({
                enableAllSteps: false,
                labelNext: '',
                labelPrevious: '',
                labelFinish: ''

            });
            //.smartWizard("fixHeight");
        }
        wizard();
    </script>
@endsection