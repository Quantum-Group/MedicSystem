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
  @include("paciente.modals")
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
      <li class="col-md-4 mt-step-col last item">
        <a href="#step-3">
          <label class="mt-step-number bg-white stepNumber">3</label>

          <div class="mt-step-title uppercase font-grey-cascade">Finalizar</div>
          <div class="mt-step-content font-grey-cascade">Revisar y enviar</div>
        </a>
      </li>
    </ul>

    <div id="step-1" class="container steps col-md-12">
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
      <div class="m-grid m-grid-full-height shadow" style="padding-top: 15px;">
        <lista-medico></lista-medico>
      </div>
    </div>
    {{--fin contenido--}}
  </div>
  <div class="steps col-md-12" id="step-2">
    <div class="panel panel-primary">
      <div style="padding: 0px;" class="panel-heading">
        <div style="padding: 0px;" class="container-fluid">
          <div class="col-sm-4">
            <h3><i class="fa fa-user-md"></i> [[medico_titulo+" "+medico_nombre+" "+medico_apellido ]]
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
                <h4 style="color:white" class="pull-right"><b>Fecha:</b> [[ show_fecha |
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
        <div id="step-3" class="shadow steps col-md-12">
          <div class="col-sm-12 bg-info">
            <h2>Confirmación <i class="fa fa-check-circle-o" aria-hidden="true"></i></h2>
          </div>
          <span class="clearfix"></span>
          <br>
          <h4 class=""><b>* Cita con el Médico: </b>[[medico_titulo+" "+medico_nombre+" "+medico_apellido]]
          </h4>
          <h4 class=""><b>* Nombre del paciente: </b> {{CRUDBooster::myName()}}</h4>
          <h4 class=""><b>* Fecha de la Cita: </b> [[show_fecha]]</h4>
          <h4 class=""><b>* Hora de la Cita: </b> [[hora_cita_selected]]</h4>
          <div class="col-sm-2 pull-right">
            <button ng-click="agendarCita()" class="btn btn-success"> Enviar <i class="fa fa-send"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  /*
  * GLOBALS
  */
  URL_CITA_DISPONIBLE = '{{CRUDBooster::adminPath()."/citaDisponible"}}';
  URL_AGENDA = '{{ CRUDBooster::adminPath('medico/agenda/') }}';
  PATH_IMG = '{{asset('img/doctor.png')}}';
  URL_ALL_MEDIC = '{{CRUDBooster::adminPath()."/todoMedico"}}';
  PACIENTE_ID ='{{$paciente->id}}';
  //URL_MEDICO_CITA = '{{ CRUDBooster::adminPath('medico/cita')}}';
  /*
  * -->
  */
  </script>
  <script src="{{asset('js/jquery.smartWizard.js')}}"></script>
  <!--  ANGULAR APP -->
  <script src="{{asset('js/paciente/app.js')}}"></script>
  <script src="{{asset('js/paciente/controller.js')}}"></script>
  <script src="{{asset('js/paciente/directive.js')}}"></script>
  <script type="text/javascript">
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
  <!--  ANGULAR APP -->
  @endsection
