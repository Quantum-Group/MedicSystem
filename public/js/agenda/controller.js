  agenda.controller("CtrlApp", function ($scope, $http, $window,$timeout) {
    /*
    * Inicializacion
    */
    $scope.init = function () {
      $(".select2").select2();
      $('#fecha').datepicker({
        language:'es',
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      //alert(URL_CITAS);
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
        eventOverlap:false, // sobreponer eventos
        //fixedWeekCount:true,
        //weekNumbers: true,
        timeFormat: 'H:mm',
        events: {
          url: URL_CITAS
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
  $scope.init(); //inicializar
  /*
  * -->
  */
  /*
  * Panel de modificacion de la cita
  * */
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
    .attr({"action": URL_MEDICO_CITA + '/' + event.id})
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
      title: '¿Mover a la papelera?',
      type:'error',
      text:"El tiempo se liberará para aceptar nuevas citas!",
      showCancelButton:true,
      allowOutsideClick:true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar',
      closeOnConfirm: false
    }, function(){
      $http({
        url: URL_MEDICO_CITA + '/' + $scope.cita_id,
        method: 'POST',
        data: {"_method":"DELETE"},
        headers: {
          'Content-Type': 'application/json'
        }
      }).then(function (data) {
        if(data.data.response == true) {
          swal("Correcto!", "Cita movida correctamente!", "success");
          swal({
            title:"Correcto!",
            type:"success",
            text:"Cita movida correctamente!",
            timer: 400,
            closeOnConfirm: true
          },function(){
            $scope.reloadCalendar();
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
    var panel = $("#pan-nueva-cita")
    .removeClass("carrot")
    .addClass("panel-primary")
    .find(".panel-body")
    .css("background-color", "white");
    //color de la cabecera del panel
    var heading = panel.find("#heading");
    heading.addClass("white-header");
    $("#methodPatch").remove();
    $("#form-cita")
    .attr({"action": URL_MEDICO_CITA + '/'});
    // cambiar los nombres de la cabecera del panel
    heading.html('<i class="fa fa-file-o"></i> Agendar Cita');
    $scope.modificar = false;
    $scope.agendar = true;
  };
    /*
     * Recarga la página actual
     */
    $scope.reloadRoute = function () {
      $window.location.reload();
    };
    /*
     * -->
     *//*
     * Recarga la página actual
     */
    $scope.reloadCalendar = function () {
      $("#calendar").fullCalendar("refetchEvents");
    };
    /*
     * -->
     */
  /*
  * Cancelar la cita // cambia el color de la cita
  */
  $scope.cancelarCita = function (){$scope.setDateTime();

  swal({
    title: "¿Desea cancelar la cita?",
    text: 'El tiempo no será liberado!',
    type: "warning",
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonText: "Aceptar",
    closeOnConfirm: false
  },function(){
    $http({
      url: URL_MEDICO_AGENDA,
      method: 'POST',
      data: {cita_id:$scope.cita_id,color:"#7f8c8d"},
      headers: {
        'Content-Type': 'application/json'
      }
    }).then(function (data) {
      if(data.data.response){
        swal({
          title: "Correcto!",
          text: 'Realizado con éxito!',
          type:"success",
          timer: 400,
          showConfirmButton: true,
          closeOnConfirm:true
        },function(){
          $scope.reloadCalendar();
        });
      }else {
        swal("Error!", "Error en la transacción!", "error");
      }
    });
  });

  };
  /*
  * -->
  */
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
          showConfirmButton: true,
          closeOnConfirm: true,
        },function(){
          $scope.reloadCalendar();
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
