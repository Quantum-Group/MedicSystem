@extends('crudbooster::admin_template')
@section('content')
<link rel="stylesheet" href="{{asset('bower_resources/angularjs-slider/dist/rzslider.css')}}">
<script src="{{asset('bower_resources/angularjs-slider/dist/rzslider.min.js')}}"></script>
<style>
	.rz-pointer-min,.rz-pointer-max {
		outline: 0;
	}
</style>
<div>
	<p><a title='Return' href="{{CRUDBooster::adminPath($slug='medico')}}"><i class='fa fa-chevron-circle-left '></i>
		&nbsp; Volver a la lista de datos Lista de médicos
	</a></p>
</div>
<div ng-app="AppAgenda" ng-controller="CtrlApp as vm">
	<form method='post' action="{{CRUDBooster::mainpath('edit-save/'.$medico->id)}}">
	{{ csrf_field() }}
		<div class="panel panel-default">
			<div class='panel-heading'><i class="fa fa-user-md"></i> Editar médico</div>
			<div class='panel-body'>
				<div class='form-group header-group-0 ' id='form-group-especialidad' style="">
					<label class='control-label col-sm-2' style="text-align:right;">Especialidad <span class='text-danger' title='This field is required'>*</span></label>
					<div class="col-sm-10">
						<input type='text' title="Especialidad" required  placeholder='Ejem: Traumatología'  maxlength=255 class='form-control' name="especialidad" id="especialidad" value='{{$medico->especialidad}}'/>
						<div class="text-danger"></div>
						<p class='help-block'></p>
					</div>
				</div>
				<div class='form-group header-group-0 ' id='form-group-titulo' style="">
					<label class='control-label col-sm-2' style="text-align:right;">Titulo <span class='text-danger' title='This field is required'>*</span></label>
					<div class="col-sm-10">
						<select class="form-control" name="titulo" id="titulo">
						<option @if($medico->titulo == "Dr.") selected @endif value="Dr.">Dr.</option>
							<option @if($medico->titulo == "Dra.") selected @endif value="Dra.">Dra.</option>
						</select>
						<div class="text-danger"></div>
						<p class='help-block'></p>

					</div>
				</div>
				<div class='form-group header-group-0 ' id='form-group-nombre' style="">
					<label class='control-label col-sm-2' style="text-align:right;">Nombre <span class='text-danger' title='This field is required'>*</span></label>

					<div class="col-sm-10">
						<input type='text' title="Nombre" required    maxlength=255 class='form-control' name="nombre" id="nombre" value='{{$medico->nombre}}'/>

						<div class="text-danger"></div>
						<p class='help-block'></p>

					</div>
				</div>
				<div class='form-group header-group-0 ' id='form-group-apellido' style="">
					<label class='control-label col-sm-2' style="text-align:right;">Apellido <span class='text-danger' title='This field is required'>*</span></label>

					<div class="col-sm-10">
						<input type='text' title="Apellido" required    maxlength=255 class='form-control' name="apellido" id="apellido" value='{{$medico->apellido}}'/>

						<div class="text-danger"></div>
						<p class='help-block'></p>

					</div>
				</div>	
				<div class='form-group header-group-0 ' id='form-group-telefono' style="">
					<label class='control-label col-sm-2' style="text-align:right;">Teléfono </label>

					<div class="col-sm-10">
						<input type='text' title="Teléfono"     maxlength=255 class='form-control' name="telefono" id="telefono" value='{{$medico->telefono}}'/>

						<div class="text-danger"></div>
						<p class='help-block'></p>
					</div>
				</div>	
				<div class='form-group header-group-0 ' id='form-group-email' style="">
					<label class='control-label col-sm-2' style="text-align:right;">Email </label>

					<div class="col-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type='email' title="Email"      class='form-control' name="email" id="email" value='{{$medico->email}}'/>
						</div>							
						<div class="text-danger"></div>
						<p class='help-block'></p>
					</div>
				</div>
				<span class="clearfix"></span>
				<br>
				<div class="form-group header-group-0">
					<div class="row">
						<div class="col-md-offset-5 col-md-4 col-xs-12">
							<h4 class='control-label'>Seleccione los días y horas de trabajo </h4>
						</div>
					</div>
					<br>
					<div class="row" style="padding-left: 15px;padding-right: 15px">
						<div class='form-group header-group-0' id='form-group-dias_trabajo' style="">
							<div class="col-md-12 well" style="padding-right: 0px;padding-left:0px">
								<div class="col-md-1">
									<input id="lunes" type="checkbox" name="lunes" data-group-cls="btn-group-vertical">
									<input type="hidden" name="lunes_start" value="[[vm.lunSlider.inicio]]">
									<input type="hidden" name="lunes_end" value="[[vm.lunSlider.fin]]">
								</div>
								<div class="col-md-11">
									<rzslider rz-slider-high="vm.lunSlider.maxValue" rz-slider-model="vm.lunSlider.minValue" rz-slider-options="vm.lunSlider.options"></rzslider>
								</div>
							</div>
						</div>
						<div class='form-group header-group-0 ' id='form-group-dias_trabajo' style="">
							<div class="col-md-12 well" style="padding-right: 0px;padding-left:0px">
								<div class="col-md-1">
									<input id="martes" type="checkbox" name="martes" data-group-cls="btn-group-vertical">
									<input type="hidden" name="martes_start" value="[[vm.marSlider.inicio]]">
									<input type="hidden" name="martes_end" value="[[vm.marSlider.fin]]">
								</div>
								<div class="col-md-11">
									<rzslider rz-slider-high="vm.marSlider.maxValue" rz-slider-model="vm.marSlider.minValue" rz-slider-options="vm.marSlider.options"></rzslider>
								</div>
							</div>
						</div>

						<div class='form-group header-group-0 ' id='form-group-dias_trabajo' style="">
							<div class="col-md-12 well" style="padding-right: 0px;padding-left:0px">
								<div class="col-md-1">
									<input id="miercoles" type="checkbox" name="miercoles" data-group-cls="btn-group-vertical">
									<input type="hidden" name="miercoles_start" value="[[vm.mieSlider.inicio]]">
									<input type="hidden" name="miercoles_end" value="[[vm.mieSlider.fin]]">
								</div>
								<div class="col-md-11">
									<rzslider rz-slider-high="vm.mieSlider.maxValue" rz-slider-model="vm.mieSlider.minValue" rz-slider-options="vm.mieSlider.options"></rzslider>
								</div>
							</div>
						</div>
						<div class='form-group header-group-0 ' id='form-group-dias_trabajo' style="">
							<div class="col-md-12 well" style="padding-right: 0px;padding-left:0px">
								<div class="col-md-1">
									<input id="jueves" type="checkbox" name="jueves" data-group-cls="btn-group-vertical">
									<input type="hidden" name="jueves_start" value="[[vm.jueSlider.inicio]]">
									<input type="hidden" name="jueves_end" value="[[vm.jueSlider.fin]]">
								</div>
								<div class="col-md-11">
									<rzslider rz-slider-high="vm.jueSlider.maxValue" rz-slider-model="vm.jueSlider.minValue" rz-slider-options="vm.jueSlider.options"></rzslider>
								</div>
							</div>
						</div>

						<div class='form-group header-group-0 ' id='form-group-dias_trabajo' style="">
							<div class="col-md-12 well" style="padding-right: 0px;padding-left:0px">
								<div class="col-md-1">
									<input id="viernes" type="checkbox" name="viernes" data-group-cls="btn-group-vertical">
									<input type="hidden" name="viernes_start" value="[[vm.vieSlider.inicio]]">
									<input type="hidden" name="viernes_end" value="[[vm.vieSlider.fin]]">
								</div>
								<div class="col-md-11">
									<rzslider rz-slider-high="vm.vieSlider.maxValue" rz-slider-model="vm.vieSlider.minValue" rz-slider-options="vm.vieSlider.options"></rzslider>
								</div>
							</div>
						</div>

						<div class='form-group header-group-0 ' id='form-group-dias_trabajo' style="">
							<div class="col-md-12 well" style="padding-right: 0px;padding-left:0px">
								<div class="col-md-1">
									<input id="sabado" type="checkbox" name="sabado" data-group-cls="btn-group-vertical">
									<input type="hidden" name="sabado_start" value="[[vm.sabSlider.inicio]]">
									<input type="hidden" name="sabado_end" value="[[vm.sabSlider.fin]]">
								</div>
								<div class="col-md-11">
									<rzslider rz-slider-high="vm.sabSlider.maxValue" rz-slider-model="vm.sabSlider.minValue" rz-slider-options="vm.sabSlider.options"></rzslider>
								</div>
							</div>
						</div>

						<div class='form-group header-group-0 ' id='form-group-dias_trabajo' style="">
							<div class="col-md-12 well" style="padding-right: 0px;padding-left:0px">
								<div class="col-md-1">
									<input id="domingo" type="checkbox" name="domingo" data-group-cls="btn-group-vertical">
									<input type="hidden" name="domingo_start" value="[[vm.domSlider.inicio]]">
									<input type="hidden" name="domingo_end" value="[[vm.domSlider.fin]]">
								</div>
								<div class="col-md-11">
									<rzslider rz-slider-high="vm.domSlider.maxValue" rz-slider-model="vm.domSlider.minValue" rz-slider-options="vm.domSlider.options"></rzslider>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="box-footer" style="background: #F5F5F5">
				<div class="form-group">
					<label class="control-label col-sm-2"></label>

					<div class="col-sm-10">
						<a href='http://localhost/MedicSystem/public/admin/medico?m=2' class='btn btn-default'><i
							class='fa fa-chevron-circle-left'></i> Atrás
						</a>
						<input type="submit" name="submit" value='Guardar'
						class='btn btn-success'>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	/*
         * GLOBALS
         */
        
        HORARIO_TRABAJO = [
            @foreach($horario_medico as $h)
            {
                    dow: [ '{{$h->dow}}' ], // Monday, Tuesday, Wednesday
                    start: '{{$h->start}}', // 8am
                    end: '{{$h->end}}' // 6pm
            },
            @endforeach    
            ];
        HORARIO_TRABAJO = HORARIO_TRABAJO.length > 0 ? HORARIO_TRABAJO :false;
        // console.log(HORARIO_TRABAJO)
        /*
         * -->
         */
</script>
<script src="{{asset('js/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
<script src="{{asset('js/medico/app.js')}}"></script>
<script src="{{asset('js/medico/controller.js')}}"></script>
<script src="{{asset('js/medico/create_jquery.js')}}"></script>
<!-- slider bootstrap  -->
@endsection