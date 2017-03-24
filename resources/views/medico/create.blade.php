@extends('crudbooster::admin_template')
@section('content')
<link rel="stylesheet" href="{{asset('bower_resources/angularjs-slider/dist/rzslider.css')}}">
<div>
	<p><a title='Return' href="{{CRUDBooster::adminPath($slug='medico')}}"><i class='fa fa-chevron-circle-left '></i>
		&nbsp; Volver a la lista de datos Lista de médicos
	</a></p>
</div>
<div ng-app="AppAgenda" class='panel panel-default' ng-controller="CtrlApp">
	<div class='panel-heading'><i class="fa fa-user-md"></i> Agregar médico</div>
	<div class='panel-body'>
		<form method='post' action='{{CRUDBooster::mainpath('add-save')}}'>
			<div class='form-group header-group-0 ' id='form-group-especialidad' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Especialidad <span class='text-danger' title='This field is required'>*</span></label>

				<div class="col-sm-10">
					<input type='text' title="Especialidad" required  placeholder='Ejem: Traumatología'  maxlength=255 class='form-control' name="especialidad" id="especialidad" value=''/>

					<div class="text-danger"></div>
					<p class='help-block'></p>

				</div>
			</div>
			<div class='form-group header-group-0 ' id='form-group-titulo' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Titulo <span class='text-danger' title='This field is required'>*</span></label>

				<div class="col-sm-10">
					<input type='text' title="Titulo" required  placeholder='Ejem: Dr.'  maxlength=255 class='form-control' name="titulo" id="titulo" value=''/>

					<div class="text-danger"></div>
					<p class='help-block'></p>

				</div>
			</div>
			<div class='form-group header-group-0 ' id='form-group-nombre' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Nombre <span class='text-danger' title='This field is required'>*</span></label>

				<div class="col-sm-10">
					<input type='text' title="Nombre" required    maxlength=255 class='form-control' name="nombre" id="nombre" value=''/>

					<div class="text-danger"></div>
					<p class='help-block'></p>

				</div>
			</div>
			<div class='form-group header-group-0 ' id='form-group-apellido' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Apellido <span class='text-danger' title='This field is required'>*</span></label>

				<div class="col-sm-10">
					<input type='text' title="Apellido" required    maxlength=255 class='form-control' name="apellido" id="apellido" value=''/>

					<div class="text-danger"></div>
					<p class='help-block'></p>

				</div>
			</div>	
			<div class='form-group header-group-0 ' id='form-group-telefono' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Teléfono </label>

				<div class="col-sm-10">
					<input type='text' title="Teléfono"     maxlength=255 class='form-control' name="telefono" id="telefono" value=''/>

					<div class="text-danger"></div>
					<p class='help-block'></p>
				</div>
			</div>	
			<div class='form-group header-group-0 ' id='form-group-email' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Email </label>

				<div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type='email' title="Email"      class='form-control' name="email" id="email" value=''/>
					</div>							
					<div class="text-danger"></div>
					<p class='help-block'></p>
				</div>
			</div>
			<div class='form-group header-group-0 ' id='form-group-dias_trabajo' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Días de trabajo</label>
				<div class="col-sm-10">
					<input id="lunes" type="checkbox" data-group-cls="btn-group-vertical">
					<input id="martes" type="checkbox" data-group-cls="btn-group-vertical">
					<input id="miercoles" type="checkbox" data-group-cls="btn-group-vertical">
					<input id="jueves" type="checkbox" data-group-cls="btn-group-vertical">
					<input id="viernes" type="checkbox" data-group-cls="btn-group-vertical">
					<input id="sabado" type="checkbox" data-group-cls="btn-group-vertical">
					<input id="domingo" type="checkbox" data-group-cls="btn-group-vertical">
					<div class="text-danger"></div>
					<p class='help-block'></p>
				</div>
			</div>
			<div class='form-group header-group-0 ' id='form-group-horario_trabajo' style="">
				<label class='control-label col-sm-2' style="text-align:right;">Horario de trabajo</label>
				<div class="col-sm-1">
					<div>
						<rzslider
						rz-slider-model="slider.min"
						rz-slider-high="slider.max"
						rz-slider-options="slider.options"></rzslider>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="box-footer" style="background: #F5F5F5">
		<div class="form-group">
			<label class="control-label col-sm-2"></label>

			<div class="col-sm-10">
				<a href='http://localhost/MedicSystem/public/admin/medico?m=2' class='btn btn-default'><i
					class='fa fa-chevron-circle-left'></i> Atrás
				</a>

				<input type="submit" name="submit"
				value='Guardar &amp; Agregar Mas'
				class='btn btn-success'>

				<input type="submit" name="submit" value='Guardar'
				class='btn btn-success'>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
<script src="{{asset('js/medico/app.js')}}"></script>
<script src="{{asset('js/medico/controller.js')}}"></script>
<script src="{{asset('bower_resources/angularjs-slider/dist/rzslider.min.js')}}"></script>
<!-- slider bootstrap  -->
<script src="{{asset('js/medico/create_jquery.js')}}"></script>
@endsection