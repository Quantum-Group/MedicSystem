@extends("crudbooster::admin_template")
@section("content")
<style media="screen">
  .modal {
      position: fixed;
      z-index: 999;
      height: 100%;
      width: 100%;
      top: 0;
      left: 0;
      background-color: Black;
      filter: alpha(opacity=40);
      opacity: 0.4;
      -moz-opacity: 0.8;
  }
	
  .texto{
  	height: 34px;
  }
  .span10{
  	width: 450px;
  }
  .center {
   z-index: 1000;
   margin-top: 200px;
   width: 130px;
   height: 130px;
   background-color: White;
   border-radius: 10px;
   filter: alpha(opacity=100);
   opacity: 1;
   -moz-opacity: 1;
  }
  .center img {
      z-index: 1001;
      height: 64px;
      width: 64px;
      margin-top: 33px;
  }

</style>
<p><a title="Volver" id = "volver" href=""><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la Lista de Consultas</a><div id="message">
</div></p>

<div class = "box" ng-app="MyApp" ng-controller="controllerConsulta">
	<div class = "box-body">
		<form id="form_consulta" method="POST" action="" name="form_consulta" >
			{{ csrf_field() }}
			<table width="100%" border="1" class="table table-bordered table-striped table-hover table-condensed ">
			  	<tbody>
				  	<tr>
						<td colspan="20" scope="col" class="active">
							<center>
					    		<strong></strong>
					     	</center></td>
					</tr>
					<tr align="center">
					   <td colspan="4" class="active">
					   		<label for="id_paciente" class="control-label">
					   			Paciente
					   		</label>
					   </td>
					   <td colspan="4" class="active">
					   		<label for="id_medico" class="control-label">
					   			Médico
					   		</label>
					   	</td>
					   <td colspan="3" class="active">
					   		<strong>
					   			EDAD
					   		</strong>
					   	</td>
					   <td colspan="3" class="active">
					   		<strong>
					   			SEXO
					   		</strong>
					   	</td>
					   <td colspan="3" class="active">
					   		<strong>
					   			No. HOJA
					   		</strong>
					   	</td>
					   <td colspan="3" class="active">
					   		<strong>
					   			HCL
					   		</strong>
					   	</td>
					</tr>
					<tr>
						<td colspan="4">
			              	<select class="form-control" id="id_paciente" placeholder="Select a state"  ng-model="id_paciente" name="id_paciente">
				                <option value="" >Seleccione un paciente:</option>
				                @foreach($pacientes as $p)
				                <option value="{{$p->id}}" >{{$p->nombre." ".$p->apellido}}</option>
				                @endforeach
			             	</select>
				        </td>
					    <td colspan="4">
			              	<select class="form-control" id="id_medico" placeholder="Select a state"  ng-model="id_medico" name="id_medico">
			                  	<option value="" >Seleccione un doctor:</option>
			                	@foreach($medicos as $m)
			                 	<option value="{{$m->id}}" >{{$m->nombre." ".$m->apellido}}</option>
			                	@endforeach
			              	</select>
			        	</td>
					    <td colspan="3"><input type="text" style="border-width:0px; width:93%" value="$edad" ></td>
					    <td colspan="3"><input type="text" style="border-width:0px; width:93%" value="$sexpac"></td>
					    <td colspan="3"><input type="text" style="border-width:0px; width:93%" value="" ></td>
					    <td colspan="3"><input type="text" style="border-width:0px; width:93%" value="$cedpac" ></td>
					</tr>
					<tr>
					    <td colspan="20" class="active"><strong>1. MOTIVO DE LA CONSULTA</strong></td>
					</tr>
					<tr>
					  	<td colspan="20"><textarea style=" border-width:1px; height:100%; width:100%" id="txtMotivoCon" cols="40" rows="2" class="span10" ng-model="txtMotivoCon" name="txtMotivoCon"></textarea></td>		    
					</tr>
					  
					<tr>
					    <td colspan="20" class="active"><strong>2. ANTECEDENTES PERSONALES</strong></td>
					</tr>
					<tr >
					    <td colspan="20"><textarea style=" border-width:1px; height:100%; width:100%" id="txtAntePer" cols="40" rows="2" class="span10" ng-model="txtAntePer" name="txtAntePer"></textarea></td>
					</tr>
					<tr>
					    <td colspan="20" class="active"><strong>3. ANTECEDENTES FAMILIARES</strong></td>
					</tr>
					<tr >
					    <td colspan="20"><textarea  style=" border-width:1px; height:100%; width:100%" cols="40" rows="2" id="txtAnteFam" class="span10" ng-model="txtAnteFam" name="txtAnteFam"></textarea></td>
					</tr>
					<tr>
					    <td colspan="20" class="active"><strong> 4. ENFERMEDAD O PROBLEMA ACTUAL </strong></td>
					</tr>
					<tr height="10px">
					    <td colspan="20"><textarea style=" border-width:1px; height:100%; width:100%" id="txtEnfermeAc" cols="40" rows="2" class="span10" ng-model="txtEnfermeAc" name="txtEnfermeAc"></textarea></td>
					</tr>
					<tr>
					    <td colspan="20" class="active"><strong>5. REVISIÓN ACTUAL DE ÓRGANOS Y SISTEMAS </strong></td>
					</tr>
					<tr align="center">
					    <td colspan="20"><textarea style=" border-width:1px; height:100%; width:100%" cols="40" rows="2" id="txtRevisionOys" class="span10" ng-model="txtRevisionOys" name="txtRevisionOys"></textarea></td>    
					</tr>		  
					<tr>
					    <td colspan="20" class="active"><strong>6. SIGNOS VITALES AL INGRESO</strong></td>
					</tr>
					<tr>
			         	<td colspan="4">
			               <center>Fecha: </center>
			            </td>
			            <td colspan="20">
			            	<input type="text" id="txtFechAnam" class="fecha" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtFechAnam" name="txtFechAnam">
			            
			            	<input type="text" id="txtFechAnam2" class="fecha" style=" width:200px; margin-left:15px;text-align:center;" ng-model="txtFechAnam2" name="txtFechAnam2">
			            
			            	<input type="text" id="txtFechAnam3" class="fecha" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtFechAnam3" name="txtFechAnam3">
			            
			            	<input type="text" id="txtFechAnam4" class="fecha" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtFechAnam4" name="txtFechAnam4">
			            </td>
		         	</tr>
		         	<tr>
			            <td colspan="4">
			               <center>Presión arterial: </center>
			            </td>
			            <td colspan="20">
			            	<input type="text" id="txtPreArAnam" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPreArAnam" name="txtPreArAnam">            
			            	<input type="text" id="txtPreArAnam2" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPreArAnam2" name="txtPreArAnam2">
			            	<input type="text" id="txtPreArAnam3" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPreArAnam3" name="txtPreArAnam3">
			            	<input type="text" id="txtPreArAnam4" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPreArAnam4" name="txtPreArAnam4">
			            </td>	
		         	</tr>
		         	<tr>
			            <td colspan="4">
			               <center>Pulso x min: </center>
			            </td>
			            <td colspan="20">
			            	<input type="text" id="txtPulAnam" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPulAnam" name="txtPulAnam">
			            	<input type="text" id="txtPulAnam2" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPulAnam2" name="txtPulAnam2">
			            	<input type="text" id="txtPulAnam3" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPulAnam3" name="txtPulAnam3">
			            	<input type="text" id="txtPulAnam4" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtPulAnam4" name="txtPulAnam4">
			        </tr>
			        <tr>
			            <td colspan="4">
			               <center>Temperatura °c: </center>
			            </td>
			            <td colspan="20">
			            	<input type="text" id="txtTemcAnam" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtTemcAnam" name="txtTemcAnam">
			            	<input type="text" id="txtTemcAnam2" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtTemcAnam2" name="txtTemcAnam2">
			            	<input type="text" id="txtTemcAnam3" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtTemcAnam3" name="txtTemcAnam3">
			            	<input type="text" id="txtTemcAnam4" style="width:200px; margin-left:15px;text-align:center;" ng-model="txtTemcAnam4" name="txtTemcAnam4">
			            </td>
		         	</tr>		  
					<tr>
				    	<td colspan="20" class="active">
				    		<strong>
				    			7. EXAMEN FÍSICO AL INGRESO
				    		</strong>
				    	</td>
					</tr>
					<tr>
						<td colspan="20">
							<textarea style=" border-width:1px; height:100%; width:100%"  cols="40" rows="2" id="txtExamenFi" class="span10" ng-model="txtExamenFi" name="txtExamenFi"></textarea>
						</td>
					</tr>  
				    <tr>
				    	<td colspan="20" class="active"><strong>8. DIAGNÓSTICOS</strong></td>
				  	</tr>
				  	<tr>
				       <td colspan="8">Descripción</td>
				       <td colspan="3">Cod. CIE</td>
				       <td colspan="3">Opción</td>
				       <td colspan="3">Pre.</td>
				       <td colspan="3">Def.</td>
				    </tr>
		         	<tr>
		            	<td>1</td>
		            	<td colspan="7"><input  type="text" id="txtCie1" class="span10" ng-model="txtCie1" name="txtCie1"> 
		            		<a onclick="verDiagnostico(3)" href="#myModal" role="button" class="btn" data-toggle="modal"> 
		            			<i class="fa fa-plus"></i>
		            		</a>
		            	</td>
		            	<td colspan="3">
		            		<input type="text" id="txtCod1" style="width:100px;" ng-model="txtCod1" name="txtCod1">
		            	</td>
		            	<td colspan="3">
		            		<input type="button" value="Borrar" class="btn btn-success" id="bntBorrrCie1" onclick="DeleteCie1()" ng-checked="bntBorrrCie1" name="bntBorrrCie1"> 
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Pre1" ng-checked="cb_Pre1" name="cb_Pre1">
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Def1" ng-checked="cb_Def1" name="cb_Def1">
		            	</td>
		         	</tr>
		         	<tr>
		            	<td>2</td>
		            	<td colspan="7"><input type="text" id="txtCie2" class="span10" ng-model="txtCie2" name="txtCie2"> 
		            		<a onclick="verDiagnostico(4)" href="#myModal" role="button" class="btn" data-toggle="modal">
		            			<i class="fa fa-plus"></i>
		            		</a>
		            	</td>
		            	<td colspan="3">
		            		<input type="text" id="txtCod2" style="width:100px;" ng-model="txtCod2" name="txtCod2">
		            	</td>
		            	<td colspan="3">
		            		<input type="button" value="Borrar" class="btn btn-success" id="bntBorrrCie2" onclick="DeleteCie2()" ng-checked="bntBorrrCie2" name="bntBorrrCie2"> 
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Pre2" ng-checked="cb_Pre2" name="cb_Pre2">
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Def2" ng-checked="cb_Def2" name="cb_Def2">
		            	</td>
		         	</tr>
		         	<tr>
		            	<td>3</td>
		            	<td colspan="7">
		            		<input type="text" id="txtCie3" class="span10" ng-model="txtCie3" name="txtCie3"> 
		            		<a onclick="verDiagnostico(5)" href="#myModal" role="button" class="btn" data-toggle="modal"> 
		            			<i class="fa fa-plus"></i>
		            		</a>
		            	</td>
		            	<td colspan="3">
		            		<input type="text" id="txtCod3" style="width:100px;" ng-model="txtCod3" name="txtCod3">
		            	</td>
		            	<td colspan="3">
		            		<input type="button" value="Borrar" class="btn btn-success" id="bntBorrrCie3" onclick="DeleteCie3()" ng-checked="bntBorrrCie3" name="bntBorrrCie3"> 
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Pre3" ng-checked="cb_Pre3" name="cb_Pre3">
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Def3" ng-checked="cb_Def3" name="cb_Def3">
		            	</td>
		         	</tr>
		         	<tr>
		            	<td>4</td>
		            	<td colspan="7">
		            		<input type="text" id="txtCie4" class="span10" ng-model="txtCie4" name="txtCie4"> 
		            		<a onclick="verDiagnostico(6)" href="#myModal" role="button" class="btn" data-toggle="modal"> 
		            			<i class="fa fa-plus"></i>
		            		</a>
		            	</td>
		            	<td colspan="3">
		            		<input type="text" id="txtCod4" style="width:100px;" ng-model="txtCod4" name="txtCod4">
		            	</td>
		            	<td colspan="3">
		            		<input type="button" value="Borrar" class="btn btn-success" id="bntBorrrCie4" onclick="DeleteCie4()" ng-checked="bntBorrrCie4" name="bntBorrrCie4"> 
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Pre4" ng-checked="cb_Pre4" name="cb_Pre4">
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Def4" ng-checked="cb_Def4" name="cb_Def4">
		            	</td>
		         	</tr>
		         	<tr>
		            	<td>5</td>
		            	<td colspan="7">
		            		<input type="text" id="txtCie5" class="span10" ng-model="txtCie5" name="txtCie5">  
		            		<a onclick="verDiagnostico(7)" href="#myModal" role="button" class="btn" data-toggle="modal"> 
		            			<i class="fa fa-plus"></i>
		            		</a>
		            	</td>
		            	<td colspan="3">
		            		<input type="text" id="txtCod5" style="width:100px;" ng-model="txtCod5" name="txtCod5">
		            	</td>
		            	<td colspan="3">
		            		<input type="button" value="Borrar" class="btn btn-success" id="bntBorrrCie5" onclick="DeleteCie5()" ng-checked="bntBorrrCie5" name="bntBorrrCie5"> 
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Pre5" ng-checked="cb_Pre5" name="cb_Pre5">
		            	</td>
		            	<td colspan="3">
		            		<input type="checkbox" id="cb_Def5" ng-checked="cb_Def5" name="cb_Def5">
		            	</td>
		         	</tr>		  	
				  	<tr height="50PX" align="center">
				    	<td colspan="2" class="active" style="font-size:12px;">
				    		FECHA
				    	</td>
				    	<td colspan="4">
		            		<div class="input-group date">
		              			<input  data-date-format="yyyy-mm-dd"   class="form-control" id="txtFechaAgendDoct"  ng-model="txtFechaAgendDoct" name="txtFechaAgendDoct">
		              			<div class="input-group-addon">
		                  			<span class="glyphicon glyphicon-th"></span>
		              			</div>
		            		</div>
		                </td>
				    	<td colspan="2" class="active" style="font-size:12px;">
				    		NOMBRE DEL PROFESIONAL
				    	</td>
				    	<td colspan="4">
				    		<input type="text" style="border-width:0px; width:95%" value="$nombremedico" id="nombremedico" ng-model="nombremedico" name="nombremedico">
				    	</td>
				    	<td colspan="2" class="active" style="font-size:12px;">
				    		FIRMA
				    	</td>
				    	<td colspan="6">
				    		<input type="text" style="border-width:0px; width:95%" value="" id="firmaDoc" ng-model="firmaDoc" name="firmaDoc">
				    	</td>
				  	</tr>
				</tbody>
			</table>	
		</form>
	</div>
	<div class = "panel-footer">
	    <div>
	       <input class = "btn btn-success" id="btnSave" type= "button" style= "margin-left: 10px;" value= "Guardar" ng-click= "toggle('{{$operation}}')">
	    </div>
    </div>
</div>

<!-- HTML del Modal de Loading-->

<div class = "modal" style = "display: none" align = "center">
	<div class = "center">
		<img alt = "" src = "{{asset('img/loading_animation.gif')}}" />
	</div>
</div>


<script type="text/javascript">

  $("#id_medico").select2();
  $("#id_paciente").select2();



  $(document).ready(function() {
    $('#txtFechaAgendDoct').datepicker({
       autoclose: true,
       language: "es",
    }).trigger('blur');
    $('.fecha').datepicker({
       autoclose: true,
       language: "es",
    }).trigger('blur');

  });
 	//Declaracion de la aplicacion

	 var app = angular.module('MyApp', [], function ($interpolateProvider)
	{
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});

	//Declaracion de la url base del proyecto.
	// URL_BASE se declara en el archivo public/js/configServer.js

	app.constant('API_URL', URL_BASE);

	//Implementacion de la controladora de angular

	app.controller("controllerConsulta", function ($scope, $http, API_URL)
	{

	//Como inician los campos

	$scope.init = function ()
	{


    $("#volver").attr("href","{{ url('/admin/consulta?m=36') }}");
    if("{{$operation == 'update'}}"){

      $("#id_medico").val("{{$consulta->id_medico}}").trigger("change");
      $("#id_paciente").val("{{$consulta->id_paciente}}").trigger("change");
    }else{
      $("#id_medico").val("").trigger("change");
      $("#id_paciente").val("").trigger("change");
    }
		$scope.txtEstablecim = "{{($operation == 'update')?$consulta->txtEstablecim :''}}";
		$scope.txtNompac = "{{($operation == 'update')?$consulta->txtNompac :''}}";
		$scope.txtApepac = "{{($operation == 'update')?$consulta->txtApepac :''}}";
		$scope.SexAnam = "{{($operation == 'update')?$consulta->SexAnam :''}}";
		$scope.txtNumHoja = "{{($operation == 'update')?$consulta->txtNumHoja :''}}";
		$scope.txtHisCl = "{{($operation == 'update')?$consulta->txtHisCl :''}}";
		$scope.txtFechAnam = "{{($operation == 'update')?$consulta->txtFechAnam :''}}";
		$scope.txtFechAnam2 = "{{($operation == 'update')?$consulta->txtFechAnam2 :''}}";
		$scope.txtFechAnam3 = "{{($operation == 'update')?$consulta->txtFechAnam3 :''}}";
		$scope.txtFechAnam4 = "{{($operation == 'update')?$consulta->txtFechAnam4 :''}}";
		$scope.txtPreArAnam = "{{($operation == 'update')?$consulta->txtPreArAnam :''}}";
		$scope.txtPreArAnam2 = "{{($operation == 'update')?$consulta->txtPreArAnam2 :''}}";
		$scope.txtPreArAnam3 = "{{($operation == 'update')?$consulta->txtPreArAnam3 :''}}";
		$scope.txtPreArAnam4 = "{{($operation == 'update')?$consulta->txtPreArAnam4 :''}}";
		$scope.txtPulAnam = "{{($operation == 'update')?$consulta->txtPulAnam :''}}";
		$scope.txtPulAnam2 = "{{($operation == 'update')?$consulta->txtPulAnam2 :''}}";
		$scope.txtPulAnam3 = "{{($operation == 'update')?$consulta->txtPulAnam3 :''}}";
		$scope.txtPulAnam4 = "{{($operation == 'update')?$consulta->txtPulAnam4 :''}}";
		$scope.txtTemcAnam = "{{($operation == 'update')?$consulta->txtTemcAnam :''}}";
		$scope.txtTemcAnam2 = "{{($operation == 'update')?$consulta->txtTemcAnam2 :''}}";
		$scope.txtTemcAnam3 = "{{($operation == 'update')?$consulta->txtTemcAnam3 :''}}";
		$scope.txtTemcAnam4 = "{{($operation == 'update')?$consulta->txtTemcAnam4 :''}}";
		$scope.txtCie1 = "{{($operation == 'update')?$consulta->txtCie1 :''}}";
		$scope.txtCod1 = "{{($operation == 'update')?$consulta->txtCod1 :''}}";
		$scope.bntBorrrCie1 = "{{($operation == 'update')?$consulta->bntBorrrCie1 :''}}";
		$scope.cb_Pre1 = "{{($operation == 'update')?$consulta->cb_Pre1 :''}}";
		$scope.cb_Def1 = "{{($operation == 'update')?$consulta->cb_Def1 :''}}";
		$scope.txtCie2 = "{{($operation == 'update')?$consulta->txtCie2 :''}}";
		$scope.txtCod2 = "{{($operation == 'update')?$consulta->txtCod2 :''}}";
		$scope.bntBorrrCie2 = "{{($operation == 'update')?$consulta->bntBorrrCie2 :''}}";
		$scope.cb_Pre2 = "{{($operation == 'update')?$consulta->cb_Pre2 :''}}";
		$scope.cb_Def2 = "{{($operation == 'update')?$consulta->cb_Def2 :''}}";
		$scope.txtCie3 = "{{($operation == 'update')?$consulta->txtCie3 :''}}";
		$scope.txtCod3 = "{{($operation == 'update')?$consulta->txtCod3 :''}}";
		$scope.bntBorrrCie3 = "{{($operation == 'update')?$consulta->bntBorrrCie3 :''}}";
		$scope.cb_Pre3 = "{{($operation == 'update')?$consulta->cb_Pre3 :''}}";
		$scope.cb_Def3 = "{{($operation == 'update')?$consulta->cb_Def3 :''}}";
		$scope.txtCie4 = "{{($operation == 'update')?$consulta->txtCie4 :''}}";
		$scope.txtCod4 = "{{($operation == 'update')?$consulta->txtCod4 :''}}";
		$scope.bntBorrrCie4 = "{{($operation == 'update')?$consulta->bntBorrrCie4 :''}}";
		$scope.cb_Pre4 = "{{($operation == 'update')?$consulta->cb_Pre4 :''}}";
		$scope.cb_Def4 = "{{($operation == 'update')?$consulta->cb_Def4 :''}}";
		$scope.txtCie5 = "{{($operation == 'update')?$consulta->txtCie5 :''}}";
		$scope.txtCod5 = "{{($operation == 'update')?$consulta->txtCod5 :''}}";
		$scope.bntBorrrCie5 = "{{($operation == 'update')?$consulta->bntBorrrCie5 :''}}";
		$scope.cb_Pre5 = "{{($operation == 'update')?$consulta->cb_Pre5 :''}}";
		$scope.cb_Def5 = "{{($operation == 'update')?$consulta->cb_Def5 :''}}";
		$scope.txtFechaControl = "{{($operation == 'update')?$consulta->txtFechaControl :''}}";
		$scope.txtHoraFin = "{{($operation == 'update')?$consulta->txtHoraFin :''}}";
		$scope.txtMedich = "{{($operation == 'update')?$consulta->txtMedich :''}}";
		$scope.txtCodM3 = "{{($operation == 'update')?$consulta->txtCodM3 :''}}";
		$scope.txtFirma = "{{($operation == 'update')?$consulta->txtFirma :''}}";
		$scope.txtMotivoCon = "{{($operation == 'update')?$consulta->txtMotivoCon :''}}";
		$scope.txtAntePer = "{{($operation == 'update')?$consulta->txtAntePer :''}}";
		$scope.txtAnteFam = "{{($operation == 'update')?$consulta->txtAnteFam :''}}";
		$scope.txtEnfermeAc = "{{($operation == 'update')?$consulta->txtEnfermeAc :''}}";
		$scope.txtRevisionOys = "{{($operation == 'update')?$consulta->txtRevisionOys :''}}";
		$scope.txtExamenFi = "{{($operation == 'update')?$consulta->txtExamenFi :''}}";
		$scope.txtPlanesdte = "{{($operation == 'update')?$consulta->txtPlanesdte :''}}";
	};

	 //Ejecuto la funcion anterior init()

	$scope.init();

	//Implementacion de método para crear un JSON a partir de la serializacion del FORM

	$scope.serializeObject = function (obj)
	{
		var o = {};
		var a = obj.serializeArray();
		$.each(a, function ()
		{
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});

		o=JSON.stringify(o);
		o= o.replace(/\r\n/g, "\\n");
		o=JSON.parse(o);

		return o;
	};

	//Implementacion de método que crea un switsh que tiene 2 casos,
	// uno para AÑADIR y otro para ACTUALIZAR.
	// El parametro (operation) puede tomar valores de
	//add o update

	$scope.toggle = function (operation)
	{
		switch (operation) {
			case 'add':

				$(".modal").modal('show');
				console.log($scope.serializeObject($("#form_consulta")));
				$http({
					url    : API_URL + 'consulta/custom_consulta',
					method : 'POST',
					params : $scope.serializeObject($("#form_consulta")),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function (response)
				{
					$(".modal").modal('hide');
					if (response.data.response) {
						swal({
							title: "Buen trabajo!",
							text: "Se ha guardado exitosamente!",
							type: "success",
							showCancelButton: false,
							confirmButtonClass: "btn-succes",
							confirmButtonText: "OK",
							closeOnConfirm: true
						},
						function(){
							$(".modal").modal('show');
							window.location = "{{ url('/admin/consulta?m=6') }}";
						});
					} else {
						swal("Error", "¡No se guardó!", "error");
					}
				});

				break;

			case 'update':

				$(".modal").modal('show');

				$http({
					url    : API_URL + 'consulta/custom_consulta/{{$consulta->id}}',
					method : 'PUT',
					params : $scope.serializeObject($("#form_consulta")),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function (response)
				{
					$(".modal").modal('hide');
					if (response.data.response) {
						swal({
							title: "Buen trabajo!",
							text: "Actualización exitosa!",
							type: "success",
							showCancelButton: false,
							confirmButtonClass: "btn-succes",
							confirmButtonText: "OK",
							closeOnConfirm: true
						},
						function(){
							$(".modal").modal('show');
							window.location = "{{ url('/admin/consulta?m=6') }}";
						});
						} else {
							swal("Error", "No se actualizó", "error");
						}
					});
					break;
		}
	}
});


</script>
@endsection
