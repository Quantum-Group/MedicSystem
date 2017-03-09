cita.controller("CtrlApp", function ($scope, $http, $window,$timeout) {
  // $scope.initGrid = function initGrid() {
  //     $('.grid').masonry({
  //         // options
  //         itemSelector: '.grid-item',
  //         percentPosition: false,
  //         transitionDuration: '1s',
  //         stagger: 30,
  //         gutter: 10,
  //         animationOptions: {
  //             duration: 400
  //         }
  //     });
  // };
  /*
  * Inicialización
  *
  */

  $scope.init = function () {
    $scope.cDisponible = []; //guarda las citas disponibles procesadas
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
    url: URL_ALL_MEDIC,
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
/*
* -->
*
*/
/*
* Avance un paso en smartWizard
*
*/
$scope.goForward = function () {
  $("#wizard").smartWizard('goForward');
};
/*
* -->
*
*/
/*
* Recargar la ruta actual
*
*/
$scope.reloadRoute = function () {
  $window.location.reload();
};
/*
* -->
*
*/

/*
* Envio de datos, confirmacion de agendarCita
*
*/
$scope.agendarCita = function () {
  swal({
    title: "Procesando",
    text: 'Espere...',
    showConfirmButton: false
  });
  $scope.f_selected = moment($scope.f_selected,"LL").format('YYYY-MM-DD');
  $scope.start_selected = moment($scope.f_selected+" "+$scope.start_selected,'YYYY-MM-DD H:mm').format();
  $scope.end_selected = moment($scope.f_selected+" "+$scope.end_selected,'YYYY-MM-DD H:mm').format();
  // obtener id de paciente basado en id de usuario
  var data = {
    "start":$scope.start_selected,
    "end":$scope.end_selected,
    "idpaciente":PACIENTE_ID,
    "medico_id":$scope.medico_id,
    "descripcion":'Realizado por el usuario'
  };

  $http({
    url: URL_AGENDA,
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
/*
* -->
*
*/
/*
* Asignación de especialidad seleccionada al campo de busqueda
*
*/
$scope.buscar = function () {
  $scope.busqueda = $scope.especialidad;
};
/*
* -->
*
*/
/*
* function selected: guarda los datos del médico seleccionado
*@param: int index, string titulo,string nombre,string apellido
*/
$scope.selected = function (index, titulo, nombre, apellido) {
  $scope.check = [];
  $scope.medico_id = index;
  $scope.medico_titulo = titulo;
  $scope.medico_nombre = nombre;
  $scope.medico_apellido = apellido;
  $scope.check[index] = true;
  $("#wizard").smartWizard('goForward');
};
/*
* -->
*
*/
/*
* function selectHorario: guarda los datos del médico seleccionado
* @param  date  start, date end, string estado
* @return
*/
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
/*
* -->
*
*/
$scope.submit = function (e) {
  e.preventDefault();
};
$scope.ajuste = function () {
  wizard();
};
/*
* function citaDisponible: consulta y formatea los datos de citas disponibles
* @param  date  fecha: 2017-03-08 17:00:55
* @return
*/
$scope.functionIsRunning = false; //verificar que la funcion termine de ejecutar
$scope.citaDisponible = function (fecha) {
  $scope.functionIsRunning = true;
  //$scope.loading=true; // muestra estado de elementos de carga
  $scope.f_selected = moment(fecha).format('LL'); //fecha = "2017-03-08 17:02:27"
  $http({
    url: URL_CITA_DISPONIBLE,
    method: 'GET',
    params: {
      medico_id: $scope.medico_id,
      fecha: fecha
    },
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    }
  }).then(function (response) {
    //$scope.loading = false;
      var citasDisp = [],resultadoCitas= {}; //guarda las citas disponibles procesadas
      resultadoCitas = response.data.agenda[0].cita;
      //debugger;

      angular.forEach($scope.timings, function (key, value) { // linea de tiempo key == LT
        var obj = {},//objeto temporal para agregar al array cDisponible
        verify = false;
        /* Comparar c/u contra muchos*/
        angular.forEach(resultadoCitas, function (clave, valor) {
          try {
            var horaLc = moment(clave.start).format('H:mm a'); // hora linea de citas ex: 7:15 am
            //console.log(horaLc + " es igual 1 ???" + key);
            //si es diferente sumarle 15 min y guardarlo como una cita disponible
            if (horaLc == key && clave.estado_cita == 1) { // si es igual la linea de tiempo y linea de cita crear objeto no disponible
              obj = {
                start: key,
                end: moment(clave.end).format('H:mm a'),
                estado: 'No Disponible'
              };
              citasDisp.push(obj);
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

          citasDisp.push(obj);
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
      $scope.cDisponible = citasDisp;
  });
  $scope.functionIsRunning = false;
};
/*
*  Sincronizar agenda
* */
var countUp = function() {
  $scope.agendaWorker.load();
  $timeout(countUp, 5000);
};
$scope.agendaWorker = {
  load:function(){
    if(!$scope.functionIsRunning){
      var fecha = moment().format('YYYY-MM-DD h:mm:ss');
      console.log(fecha);
      $scope.citaDisponible(fecha);
    }
  }
};
$timeout(countUp, 4000);//iniciar el timeout
/*
* -->
*
* */
});// fin controller
