agenda.controller("CtrlApp", function ($scope, $http, $window, $timeout) {
    /*
     * Inicializacion
     */
    $scope.init = function () {
        $scope.panel_default = {
            title_panel: "Agendar nueva Cita",
            class_heading: "panel-primary",
            url: URL_MEDICO_AGENDA,
            buttons: {
                agendar: true,
                trash: false,
                cancelar: false,
                modificar: false
            }
        };
        $scope.panel = $scope.panel_default;
        $scope.panel_modify = {
            title_panel: "Modificar Cita",
            class_heading: "carrot",
            style_body: "background-color:white",
            url: URL_MEDICO_CITA,
            method: {
                name: "_method",
                value: "PATCH"
            },
            class_text_title: "white-header",
            buttons: {
                agendar: false,
                trash: true,
                cancelar: true,
                modificar: true
            }
        };
        $(".select2").select2();
        $('#fecha').datepicker({
            language: 'es',
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
            slotDuration: '00:15:00',
            titleFormat: 'MMMM D YYYY',
            columnFormat: 'dddd',
            eventOverlap: false, // sobreponer eventos
            //fixedWeekCount:true,
            //weekNumbers: true,
            timeFormat: 'H:mm',
            events: {
                url: URL_CITAS
            },
            eventResizeStop:function(){
                $scope.verify_time();
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
                $scope.verify_time();
            }
        });
    };
    $scope.verify_time = function () {
        var hora1 = moment($scope.horaInicio, "H:mm a").format("H:mm");
        var horaI = hora1.split(":",2);
        var hora_inicio = horaI[0];
        var min_inicio = horaI[1];
        var hora2 = moment($scope.horaFin, "H:mm a").format("H:mm");
        var horaF = hora2.split(":",2);
        var hora_fin= horaF[0];
        var min_fin = horaF[1];
        console.log(min_fin);
        console.log(hora_fin);
        var verified = false;
        if(typeof hora_inicio == "undefined"){
            verified = 'undefined';
        }else{
            if (hora_inicio <= 6.99 && min_inicio <= 59 || hora_fin >= 20 && min_fin >= 1) {
                verified = false;
                swal("El evento supera el horario permitido!");
                $scope.resetPanelCita();
                $scope.reloadCalendar();
            } else  {
                verified = true;
            }
        }

        return verified;
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
        $scope.panel_modify.url = URL_MEDICO_CITA + "/" + event.id;
        $scope.cita_id = event.id;
        $("#select-paciente").val(event.paciente_id).trigger("change");
        $scope.descripcion = event.detalle_cita;
        $scope.fecha = moment(event.start).format('DD/MM/YYYY');
        $scope.horaInicio = moment(event.start).format('H:mm a');
        $scope.horaFin = moment(event.end).format('H:mm a');
        $scope.start = moment(event.start, 'YYYY/MM/DD,H:mm').format();
        $scope.end = moment(event.end, 'YYYY/MM/DD,H:mm').format();
        //cambio de botones
        $scope.modificar = true;
        $scope.agendar = false;
        $scope.panel = $scope.panel_modify;
        $scope.$apply(); //refrescar el objeto $scope
    };

    $scope.eliminarCita = function () {
        swal({
            title: '¿Mover a la papelera?',
            type: 'error',
            text: "El tiempo se liberará para aceptar nuevas citas!",
            showCancelButton: true,
            allowOutsideClick: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false
        }, function () {
            $http({
                url: URL_MEDICO_CITA + '/' + $scope.cita_id,
                method: 'POST',
                data: {"_method": "DELETE"},
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (data) {
                if (data.data.response == true) {
                    swal("Correcto!", "Cita movida correctamente!", "success");
                    swal({
                        title: "Correcto!",
                        type: "success",
                        text: "Cita movida correctamente!",
                        timer: 400,
                        closeOnConfirm: true
                    }, function () {
                        $scope.reloadCalendar();
                        $scope.resetPanelCita();
                    });
                    //$scope.panelNewCita();
                    //$("#calendar").fullCalendar("refetchEvents");
                } else {
                    swal("Error!", "No se pudo borrar la cita!", "error");
                }
            });
        });
    };
    $scope.resetPanelCita = function () {
        $scope.panel = $scope.panel_default;
        $scope.descripcion = "";
        $scope.horaInicio = "";
        $scope.horaFin = "";
        $scope.formCita = {};
        try{
            $scope.$apply();
        }catch(err){}
    };
    /*
     * Recarga la página actual
     */
    $scope.reloadRoute = function () {
        $window.location.reload();
    };
    /*
     * -->
     */
    /*
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
    $scope.cancelarCita = function () {
        $scope.setDateTime();

        swal({
            title: "¿Desea cancelar la cita?",
            text: 'El tiempo no será liberado!',
            type: "warning",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            closeOnConfirm: false
        }, function () {
            $http({
                url: URL_MEDICO_AGENDA,
                method: 'POST',
                data: {cita_id: $scope.cita_id, color: "#7f8c8d"},
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (data) {
                if (data.data.response) {
                    swal({
                        title: "Correcto!",
                        text: 'Realizado con éxito!',
                        type: "success",
                        timer: 400,
                        showConfirmButton: true,
                        closeOnConfirm: true
                    }, function () {
                        $scope.reloadCalendar();
                        $scope.resetPanelCita();
                    });
                } else {
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

    $scope.agendaWorker = {
        load: function () {
            $("#calendar").fullCalendar("refetchEvents");
        }
    };
    /*
     * -->
     *
     * */
    $scope.submit = function (e) {
        e.preventDefault();
        if($scope.verify_time() && $scope.horaInicio != "" && $scope.horaFin != "" && $scope.horaInicio != $scope.horaFin){
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
                if (data.data.response) {
                    swal({
                        title: "Correcto!",
                        text: 'Realizado con éxito!',
                        timer: 400,
                        type: "success",
                        showConfirmButton: true,
                        closeOnConfirm: true
                    }, function () {
                        $scope.reloadCalendar();
                        $scope.resetPanelCita();
                    });
                } else {
                    swal("Error!", "Error en la transacción!", "error");
                }
            });
        }else {
            swal({
                type:"error",
                title:"Error!",
                text:"Revise que los campos no esten vacios y que las horas de inicio no sean las mismas que las de fin!",

            });

        }
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
