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
                        <div class="row">
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
                            <div class="col-sm-7">
                                <h4 class="col-sm-6" for="">
                                    <b>Observaciones:</b>
                                </h4>
                                <h4>[[ observ ]]</h4>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="col-sm-6" for="">
                                    <b>Condicion de paciente:</b>
                                </h4>
                                <h4>[[ sel_convenio ]]</h4>
                            </div><div class="col-sm-7">
                                <h4 class="col-sm-6" for="">
                                    <b>Autorización:</b>
                                </h4>
                                <h4>[[ autorizacion ]]</h4>
                            </div><div class="col-sm-7">
                                <h4 class="col-sm-6" for="">
                                    <b>Fecha de Autorización:</b>
                                </h4>
                                <h4>[[ fecha_autorizacion ]]</h4>
                            </div><div class="col-sm-7">
                                <h4 class="col-sm-6" for="">
                                    <b>Fecha de vencimiento</b>
                                </h4>
                                <h4>[[ fecha_vence ]]</h4>
                            </div>
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
    /*
     * GLOBALS
     */
    URL_CITAS = '{{ CRUDBooster::adminPath('medico/cita/') }}';

    /*
     * -->
     */
</script>
<script src="{{asset('js/agenda/app.js')}}"></script>
<script src="{{asset('js/agenda/dashboard_controller.js')}}"></script>

