agenda.controller("CtrlApp", function ($scope, $http, $window, $timeout,$q) {
    /*variables de inicializacion*/
    $scope.panel_default = function(){
        this.title_panel= "Agendar nueva Cita";
        this.class_heading= "panel-primary";
        this.url= URL_MEDICO_AGENDA;
        this.buttons= {
            agendar: true,
            trash: false,
            cancelar: false,
            modificar: false
        }
    };
    $scope.panel_modify = function(){
        this.title_panel= "Modificar Cita";
        this.class_heading= "carrot";
        this.style_body= "background-color:white";
        this.url= URL_MEDICO_CITA;
        this.method= {
            name: "_method",
            value: "PATCH"
        };
        this.class_text_title= "white-header";
        this.buttons= {
            agendar: false,
            trash: true,
            cancelar: true,
            modificar: true
        }
    };
    // Borra los campos del ingreso de datos de actualizacion
    $scope.resetAutorizacion= function(){
        $scope.autorizacion = "";
        $scope.fecha_autorizacion = "";
        $scope.fecha_vence = "";
    };
    /*
     * Panel de modificacion de la cita
     * */
     $scope.panelModCita = function (event) {
        /*
         * Preparar el panel para modificar una cita
         * */
         $scope.config = {
            defaultDate:moment(event.start).format('YYYY-MM-DD'),
            defaultView:'agendaDay'
        };
        var panelModificar = new $scope.panel_modify();
        $("#calendar").fullCalendar( 'gotoDate', moment(event.start).format('YYYY-MM-DD'));
        panelModificar.url = URL_MEDICO_CITA + "/" + event.id;
        $scope.cita_id = event.id;
        $("#select-paciente").val(event.paciente_id).trigger("change");
        $scope.cita = {
            descripcion:event.detalle_cita,
            fecha:moment(event.start).format('DD/MM/YYYY')
        };
        $scope.horaInicio = moment(event.start).format('H:mm a');
        $scope.horaFin = moment(event.end).format('H:mm a');
        $scope.start = moment(event.start, 'YYYY/MM/DD,H:mm').format();
        $scope.end = moment(event.end, 'YYYY/MM/DD,H:mm').format();
        //convenio assign
        $scope.sel_convenio = event.sel_convenio;
        $("#sel_convenio").trigger("change");
        if($scope.sel_convenio == "I.E.S.S."){
            $scope.tipo_convenio = true;
            try {
                $scope.autorizacion = event.convenio.autorizacion;
                $scope.fecha_autorizacion = moment(event.convenio.fecha_autorizacion,"YYYY-MM-DD").format("DD/MM/YYYY");
                $scope.fecha_vence = moment(event.convenio.fecha_vence,"YYYY-MM-DD").format("DD/MM/YYYY");
            }catch(e){
                console.log(e);
            }
        }else{
            $scope.resetAutorizacion();
        }
        //cambio de botones
        $scope.modificar = true;
        $scope.agendar = false;
        $scope.panel = panelModificar;
        /*$scope.$watch('panel',function(){
            $scope.panel = $scope.panel_modify;
        });*/
        try{$scope.$apply();}catch(e){

        }
    };
    /*
     * Inicializacion
     */
     
     $scope.init = function () {

        $scope.tipo_convenio = true;
        $scope.config = {
            defaultDate:$scope.fecha,
            defaultView:'agendaWeek'
        };
        $scope.sel_convenio = "I.E.S.S.";
        $scope.options_convenio = [
        "I.E.S.S.",
        "PARTICULAR"
        ];
        $(".select2").select2();
        $('#fecha, .datepicker').datepicker({
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
            defaultDate: $scope.config.defaultDate,
            height: 460, //alto del calendario
            defaultView: $scope.config.defaultView,
            locale: 'es', // tomado de locale
            buttonIcons: true,
            selectHelper: true,
            navLinks: true,
            businessHours: HORARIO_TRABAJO,
            //eventConstraint:'businessHours',
            editable: true,
            eventLimit: true,
            //businessHours:true,
            minTime: "7:00:00",
            maxTime: "20:00:00",
            aspectRatio: 2,
            nowIndicator: true,
            slotDuration: '00:15:00',
            titleFormat: 'MMMM D YYYY',
            columnFormat: 'dddd',
            eventOverlap: false, // sobreponer eventos
            //fixedWeekCount:true,
            //weekNumbers: true,
            timeFormat: 'H:mm',
            //dayBreakTime: "07:00",
            events:{
                url: URL_CITAS
            },
            eventResizeStop:function(){
                $scope.verify_time();
            },
            eventRender: function (event, element) {
                element.click(function () {
                    $scope.panelModCita(event);
                });
            },
            eventResize: function (event, delta, revertFunc) {
                $scope.panelModCita(event);
            },
            eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
                    //console.log(view.options.businessHours);
                    $scope.panelModCita(event);
                    $scope.verify_time();
                },
                eventClick: function(calEvent, jsEvent, view) {

                // change the border color just for fun
                $(this).css('border-color', 'red');

            }
        });
        /*
        *  Inicializar paneles
        * */
        
            if(CITA.id == ""){
                $scope.panel =  new $scope.panel_default();
            }else {
                $scope.panelModCita(CITA);
            }
        };
        $scope.verify_date = function(){
            var verified = false;
            console.log(moment($scope.cita.hoy,'DD/MM/YYYY').isAfter($scope.cita.fecha,'DD/MM/YYYY'));

            return verified;
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
    * muestra los datos para ingresar fechas de autorizacion de convenio particular o iess
    * */
    $scope.eval_convenio = function(){
        console.log($scope.sel_convenio)
        if($scope.sel_convenio == 'I.E.S.S.'){
        $scope.tipo_convenio = true;
        }else {
        $scope.tipo_convenio = false;
            
        }
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
                } else {
                    swal("Error!", "No se pudo borrar la cita!", "error");
                }
            });
        });
    };
    $scope.resetPanelCita = function () {
        $scope.cita={descripcion:""};
        $scope.horaInicio = "";
        $scope.horaFin = "";
        // $scope.cita={fecha : $scope.cita.fecha};
        $scope.resetAutorizacion();
        $scope.panel = new $scope.panel_default();
        /*$scope.$watch('panel',function(){
            $scope.panel = $scope.panel_default;
        });*/
        try{$scope.$apply();}catch(err){console.log(err);}
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
     * Cancelar la cita
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
        $scope.start = moment($scope.cita.fecha + "," + hora_inicio[0], 'DD/MM/YYYY,H:mm').format();
        $scope.end = moment($scope.cita.fecha + "," + hora_fin[0], 'DD/MM/YYYY,H:mm').format();
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
        if($scope.verify_time() && $scope.verify_date() && $scope.horaInicio != "" && $scope.horaFin != "" && $scope.horaInicio != $scope.horaFin){
            // $scope.setDateTime();
            // var fd = $("#form-cita"),
            // url = fd.attr("action"),
            // data = fd.serialize();
            // swal({
            //     title: "Procesando",
            //     text: 'Espere...',
            //     showConfirmButton: false
            // });
            // $http({
            //     url: url,
            //     method: 'POST',
            //     data: data,
            //     headers: {
            //         'Content-Type': 'application/x-www-form-urlencoded'
            //     }
            // }).then(function (data) {
            //     if (data.data.response) {
            //         swal({
            //             title: "Correcto!",
            //             text: 'Realizado con éxito!',
            //             timer: 400,
            //             type: "success",
            //             showConfirmButton: true,
            //             closeOnConfirm: true
            //         }, function () {
            //             $scope.reloadCalendar();
            //             $scope.resetPanelCita();
            //         });
            //     } else {
            //         swal("Error!", "Error en la transacción!", "error");
            //     }
            // });
        }else {
            swal({
                type:"error",
                title:"Error!",
                text:"Revise que los campos no esten vacios y que las horas de inicio no sean las mismas que las de fin!"
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
