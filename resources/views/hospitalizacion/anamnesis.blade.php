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
<p><a title="Volver" id = "volver" href=""><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la Lista de Anamnesis</a><div id="message">
</div></p>
<div class = "box" ng-app="MyApp" ng-controller="controllerAnamnesisHospitalizacion">

	<div class = "box-body">

		<form id="form_anamnesisHospitalizacion" method="POST" action="" name="form_anamnesisHospitalizacion" >
			{{ csrf_field() }}
        <div class="md-col-6">
          <select class="form-control" id="id_paciente" placeholder="Select a state"  ng-model="id_paciente" name="id_paciente">
              <option value="" >Seleccione un paciente:</option>
            @foreach($pacientes as $p)
             <option value="{{$p->id}}" >{{$p->nombre." ".$p->apellido}}</option>
            @endforeach
          </select>
        </div>


			<table width="100%" border="1" class="table table-bordered table-striped table-hover table-condensed ">
		  <tbody><tr>
		    <td colspan="20" scope="col" class="active"><center>
		        <strong></strong>
		      </center></td>
		  </tr>
		  <tr align="center">
		    <td colspan="4" class="active"><label for="id_paciente" class="control-label">Paciente</label></td>
		    <td colspan="4" class="active"><label for="id_medico" class="control-label">Médico</label></td>
		    <td colspan="3" class="active"><strong>EDAD</strong></td>
		    <td colspan="3" class="active"><strong>SEXO</strong></td>
		    <td colspan="3" class="active"><strong>No. HOJA</strong></td>
		    <td colspan="3" class="active"><strong>HCL</strong></td>
		  </tr>
		  <tr>
		    <td colspan="4">
          <!--div class="form-group ">
            <div class="col-md-6"-->
              <select class="form-control" id="id_paciente" placeholder="Select a state"  ng-model="id_paciente" name="id_paciente">
                  <option value="" >Seleccione un paciente:</option>
                @foreach($pacientes as $p)
                 <option value="{{$p->id}}" >{{$p->nombre." ".$p->apellido}}</option>
                @endforeach
             </select>
            <!--/div>
          </div-->
        </td>
		    <td colspan="4">
          <!--div class="form-group ">
            <div class="col-md-6"-->
              <select class="form-control" id="id_medico" placeholder="Select a state"  ng-model="id_medico" name="id_medico">
                  <option value="" >Seleccione un doctor:</option>
                @foreach($medicos as $m)
                 <option value="{{$m->id}}" >{{$m->nombre." ".$m->apellido}}</option>
                @endforeach
             </select>
            <!--/div>
          </div-->
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
		    <td class="active"><strong>A</strong></td>
		    <td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="MotivoConsA" ng-model="MotivoConsA" name="MotivoConsA"></td>
		    <td class="active"><strong>C</strong></td>
		    <td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="MotivoConsC" ng-model="MotivoConsC" name="MotivoConsC"></td>
		  </tr>
		  <tr>
		    <td class="active"><strong>B</strong></td>
		    <td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="MotivoConsB" ng-model="MotivoConsB" name="MotivoConsB"></td>
		    <td class="active"><strong>D</strong></td>
		    <td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="MotivoConsD" ng-model="MotivoConsD" name="MotivoConsD"></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active"><strong>2. ANTECEDENTES PERSONALES</strong></td>
		  </tr>
		  <tr style="font-size:10px; ">
		    <td colspan="4" class="active">1. VACUNAS <br>
		      <input type="checkbox" id="cb_vacunas" ng-checked="cb_vacunas" name="cb_vacunas"></td>
		    <td colspan="3" class="active">5. ENF ALÉRGICA <br>
		      <input type="checkbox" id="cb_alergica" ng-checked="cb_alergica" name="cb_alergica"></td>
		    <td colspan="3" class="active">9. ENF NEUROLÓGICA <br>
		      <input type="checkbox" id="cb_neurologica" ng-checked="cb_neurologica" name="cb_neurologica"></td>
		    <td colspan="3" class="active">13. ENF TRAUMATOLÓGICA <br>
		      <input type="checkbox" id="cb_traumatologica" ng-checked="cb_traumatologica" name="cb_traumatologica"></td>
		    <td colspan="3" class="active">17. TENDENCIA SEXUAL <br>
		      <input type="checkbox" id="cb_tendsexual" ng-checked="cb_tendsexual" name="cb_tendsexual"></td>
		    <td colspan="4" class="active">21. ACTIVIDAD SEXUAL <br>
		      <input type="checkbox" id="cb_actsexual" ng-checked="cb_actsexual" name="cb_actsexual"></td>
		  </tr>
		  <tr style="font-size:10px; ">
		    <td colspan="4" class="active">2. ENF PERINATAL <br>
		      <input type="checkbox" id="cb_perinatal" ng-checked="cb_perinatal" name="cb_perinatal"></td>
		    <td colspan="3" class="active">6. ENF CARDIACA <br>
		      <input type="checkbox" id="cb_cardiaca" ng-checked="cb_cardiaca" name="cb_cardiaca"></td>
		    <td colspan="3" class="active">10. ENF METABÓLICA <br>
		      <input type="checkbox" id="cb_metabolica" ng-checked="cb_metabolica" name="cb_metabolica"></td>
		    <td colspan="3" class="active">14. ENF QUIRURGICA <br>
		      <input type="checkbox" id="cb_quirurgica" ng-checked="cb_quirurgica" name="cb_quirurgica"></td>
		    <td colspan="3" class="active">18. RIESGO SOCIAL <br>
		      <input type="checkbox" id="cb_riesgosocial" ng-checked="cb_riesgosocial" name="cb_riesgosocial"></td>
		    <td colspan="4" class="active">22. DIETA Y HABITOS <br>
		      <input type="checkbox" id="cb_dietahabitos" ng-checked="cb_dietahabitos" name="cb_dietahabitos"></td>
		  </tr>
		  <tr style="font-size:10px; ">
		    <td colspan="4" class="active">3. ENF INFANCIA <br>
		      <input type="checkbox" id="cb_infancia" ng-checked="cb_infancia" name="cb_infancia"></td>
		    <td colspan="3" class="active">7. ENF RESPIRATORIA <br>
		      <input type="checkbox" id="cb_respiratoria" ng-checked="cb_respiratoria" name="cb_respiratoria"></td>
		    <td colspan="3" class="active">11. ENF HEMO LINF <br>
		      <input type="checkbox" id="cb_hemolinf" ng-checked="cb_hemolinf" name="cb_hemolinf"></td>
		    <td colspan="3" class="active">15. ENF MENTAL <br>
		      <input type="checkbox" id="cb_mental" ng-checked="cb_mental" name="cb_mental"></td>
		    <td colspan="3" class="active">19. RIESGO LABORAL <br>
		      <input type="checkbox" id="cb_riesgolaboral" ng-checked="cb_riesgolaboral" name="cb_riesgolaboral"></td>
		    <td colspan="4" class="active">23. RELIGION Y CULTURA <br>
		      <input type="checkbox" id="cb_religioncultura" ng-checked="cb_religioncultura" name="cb_religioncultura"></td>
		  </tr>
		  <tr style="font-size:10px; ">
		    <td colspan="4" class="active">4. ENF ADOLECENTE <br>
		      <input type="checkbox" id="cb_adolecente" ng-checked="cb_adolecente" name="cb_adolecente"></td>
		    <td colspan="3" class="active">8. ENF DIGESTIVA <br>
		      <input type="checkbox" id="cb_digestiva" ng-checked="cb_digestiva" name="cb_digestiva"></td>
		    <td colspan="3" class="active">12. ENF URINARIA X <br>
		      <input type="checkbox" id="cb_urinaria" ng-checked="cb_urinaria" name="cb_urinaria"></td>
		    <td colspan="3" class="active">16. ENF T SEXUAL <br>
		      <input type="checkbox" id="cb_tsexual" ng-checked="cb_tsexual" name="cb_tsexual"></td>
		    <td colspan="3" class="active">20. RIESGO FAMILIAR <br>
		      <input type="checkbox" id="cb_riesgofamiliar" ng-checked="cb_riesgofamiliar" name="cb_riesgofamiliar"></td>
		    <td colspan="4" class="active">24. OTRO <br>
		      <input type="checkbox" id="cb_otro" ng-checked="cb_otro" name="cb_otro"></td>
		  </tr>
		  <tr height="10px">
		    <td colspan="20"><textarea id="txtAntePer" style=" border-width:0px; height:100%; width:98%" value="" ng-model="txtAntePer" name="txtAntePer"></textarea></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active"><strong>3. ANTECEDENTES FAMILIARES</strong></td>
		  </tr>
		  <tr style="font-size:10px; ">
		    <td colspan="2" class="active">1. CARDIOPATIA <br>
		      <input type="checkbox" id="cb_cardiopatia" ng-checked="cb_cardiopatia" name="cb_cardiopatia"></td>
		    <td colspan="2" class="active">2. DIABETES <br>
		      <input type="checkbox" id="cb_diabetes" ng-checked="cb_diabetes" name="cb_diabetes"></td>
		    <td colspan="2" class="active">3. ENF VASCULARES <br>
		      <input type="checkbox" id="cb_enfvasculares" ng-checked="cb_enfvasculares" name="cb_enfvasculares"></td>
		    <td colspan="2" class="active">4. HTA <br>
		      <input type="checkbox" id="cb_hta" ng-checked="cb_hta" name="cb_hta"></td>
		    <td colspan="2" class="active">5. CANCER <br>
		      <input type="checkbox" id="cb_cancer" ng-checked="cb_cancer" name="cb_cancer"></td>
		    <td colspan="2" class="active">6. TUBERCULOSIS <br>
		      <input type="checkbox" id="cb_tuberculosis" ng-checked="cb_tuberculosis" name="cb_tuberculosis"></td>
		    <td colspan="2" class="active">7. ENF MENTAL <br>
		      <input type="checkbox" id="cb_enfenfmental" ng-checked="cb_enfenfmental" name="cb_enfenfmental"></td>
		    <td colspan="2" class="active">8. ENF INFECCIOSA <br>
		      <input type="checkbox" id="cb_enfinfecciosa" ng-checked="cb_enfinfecciosa" name="cb_enfinfecciosa"></td>
		    <td colspan="2" class="active">9. MAL FORMACIÓN <br>
		      <input type="checkbox" id="cb_malformacion" ng-checked="cb_malformacion" name="cb_malformacion"></td>
		    <td colspan="2" class="active">10. OTRO <br>
		      <input type="checkbox" id="cb_afotro" ng-checked="cb_afotro" name="cb_afotro"></td>
		  </tr>
		  <tr>
		    <td colspan="20"><textarea id="txtNoRef" style=" border-width:0px; height:100%; width:98%" ng-model="txtNoRef" name="txtNoRef"></textarea></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active"><strong> 4. ENFERMEDAD O PROBLEMA ACTUAL (Nota de Ingreso)</strong></td>
		  </tr>
		  <tr height="10px">
		    <td colspan="20"><textarea id="txtProbActual" style=" border-width:0px; height:100%; width:98%" ng-model="txtProbActual" name="txtProbActual"></textarea></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active"><strong>5. REVISIÓN ACTUAL DE ÓRGANOS Y SISTEMAS AL INGRESO</strong></td>
		  </tr>
		  <tr align="center">
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		  </tr>
		  <tr style="font-size:10px; " align="center">
		    <td colspan="2" class="active">1. ÓRGANOS DE LOS SENTIDOS</td>
		    <td><input type="checkbox" id="cb_1CP" ng-checked="cb_1CP" name="cb_1CP"></td>
		    <td><input type="checkbox" id="cb_1SP" ng-checked="cb_1SP" name="cb_1SP"></td>
		    <td colspan="2" class="active">3. CARDIOVASCULAR</td>
		    <td><input type="checkbox" id="cb_3CP" ng-checked="cb_3CP" name="cb_3CP"></td>
		    <td><input type="checkbox" id="cb_3SP" ng-checked="cb_3SP" name="cb_3SP"></td>
		    <td colspan="2" class="active">5. GENITAL</td>
		    <td><input type="checkbox" id="cb_5CP" ng-checked="cb_5CP" name="cb_5CP"></td>
		    <td><input type="checkbox" id="cb_5SP" ng-checked="cb_5SP" name="cb_5SP"></td>
		    <td colspan="2" class="active">7. MÚSCULO ESQUELÉTICO</td>
		    <td><input type="checkbox" id="cb_7CP" ng-checked="cb_7CP" name="cb_7CP"></td>
		    <td><input type="checkbox" id="cb_7SP" ng-checked="cb_7SP" name="cb_7SP"></td>
		    <td colspan="2" class="active">9. HEMO LINFÁTICO</td>
		    <td><input type="checkbox" id="cb_9CP" ng-checked="cb_9CP" name="cb_9CP"></td>
		    <td><input type="checkbox" id="cb_9SP" ng-checked="cb_9SP" name="cb_9SP"></td>
		  </tr>
		  <tr style="font-size:10px; " align="center">
		    <td colspan="2" class="active">2. RESPIRATORIO</td>
		    <td><input type="checkbox" id="cb_2CP" ng-checked="cb_2CP" name="cb_2CP"></td>
		    <td><input type="checkbox" id="cb_2SP" ng-checked="cb_2SP" name="cb_2SP"></td>
		    <td colspan="2" class="active">4. DIGESTIVOS</td>
		    <td><input type="checkbox" id="cb_4CP" ng-checked="cb_4CP" name="cb_4CP"></td>
		    <td><input type="checkbox" id="cb_4SP" ng-checked="cb_4SP" name="cb_4SP"></td>
		    <td colspan="2" class="active">6. URINARIO</td>
		    <td><input type="checkbox" id="cb_6CP" ng-checked="cb_6CP" name="cb_6CP"></td>
		    <td><input type="checkbox" id="cb_6SP" ng-checked="cb_6SP" name="cb_6SP"></td>
		    <td colspan="2" class="active">8. ENDOCRINO</td>
		    <td><input type="checkbox" id="cb_8CP" ng-checked="cb_8CP" name="cb_8CP"></td>
		    <td><input type="checkbox" id="cb_8SP" ng-checked="cb_8SP" name="cb_8SP"></td>
		    <td colspan="2" class="active">10. NERVIOSO</td>
		    <td><input type="checkbox" id="cb_10CP" ng-checked="cb_10CP" name="cb_10CP"></td>
		    <td><input type="checkbox" id="cb_10SP" ng-checked="cb_10SP" name="cb_10SP"></td>
		  </tr>
		  <tr height="10px">
		    <td colspan="20"><textarea id="txtRevisOrgs" style=" border-width:0px; height:100%; width:98%" ng-model="txtRevisOrgs" name="txtRevisOrgs"></textarea></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active"><strong>6. SIGNOS VITALES AL INGRESO</strong></td>
		  </tr>
		  <tr align="center">
		    <td colspan="17">&nbsp;</td>
		    <td class="active">M</td>
		    <td class="active">O</td>
		    <td class="active">V</td>
		  </tr>
		  <tr style="font-size:10px; " align="cneter">
		    <td class="active" width="5%">TA</td>
		    <td width="5%"><input id="ta" type="text" style="border-width:0px; width:78%" value="" ng-model="ta" name="ta"></td>
		    <td class="active" width="5%">F.C</td>
		    <td width="5%"><input id="fc" type="text" style="border-width:0px; width:78%" value="" ng-model="fc" name="fc"></td>
		    <td class="active" width="5%">F.R</td>
		    <td width="5%"><input id="fr" type="text" style="border-width:0px; width:78%" value="" ng-model="fr" name="fr"></td>
		    <td class="active" width="5%">SAT O2</td>
		    <td width="5%"><input id="sato2" type="text" style="border-width:0px; width:78%" value="" ng-model="sato2" name="sato2"></td>
		    <td class="active" width="5%">TEMP BUCAL</td>
		    <td width="5%"><input id="tempbuc" type="text" style="border-width:0px; width:78%" value="" ng-model="tempbuc" name="tempbuc"></td>
		    <td class="active" width="5%">PESO</td>
		    <td width="5%"><input id="peso" type="text" style="border-width:0px; width:78%" value="" ng-model="peso" name="peso"></td>
		    <td class="active" width="5%">GLUCEMIA</td>
		    <td width="5%"><input id="glucem" type="text" style="border-width:0px; width:78%" value="" ng-model="glucem" name="glucem"></td>
		    <td class="active" width="5%">TALLA</td>
		    <td width="5%"><input id="talla" type="text" style="border-width:0px; width:78%" value="" ng-model="talla" name="talla"></td>
		    <td class="active" width="10%">ESCALA DE COMA DE GLASGOW</td>
		    <td width="3%"><input id="gm" type="text" style="border-width:0px; width:78%" value="" ng-model="gm" name="gm"></td>
		    <td width="3%"><input id="go" type="text" style="border-width:0px; width:60%" value="" ng-model="go" name="go"></td>
		    <td width="3%"><input id="gv" type="text" style="border-width:0px; width:60%" value="" ng-model="gv" name="gv"></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active"><strong>7. EXAMEN FÍSICO AL INGRESO</strong></td>
		  </tr>
		  <tr align="center">
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		    <td colspan="2">&nbsp;</td>
		    <td class="active">CP</td>
		    <td class="active">SP</td>
		  </tr>
		  <tr style="font-size:10px;" align="center">
		    <td colspan="2" class="active">1.R PIEL Y FANERAS</td>
		    <td><input type="checkbox" id="cb_1RCP" ng-checked="cb_1RCP" name="cb_1RCP"></td>
		    <td><input type="checkbox" id="cb_1RSP" ng-checked="cb_1RSP" name="cb_1RSP"></td>
		    <td colspan="2" class="active">6.R BOCA</td>
		    <td><input type="checkbox" id="cb_6RCP" ng-checked="cb_6RCP" name="cb_6RCP"></td>
		    <td><input type="checkbox" id="cb_6RSP" ng-checked="cb_6RSP" name="cb_6RSP"></td>
		    <td colspan="2" class="active">11.R ABDOMEN</td>
		    <td><input type="checkbox" id="cb_11RCP" ng-checked="cb_11RCP" name="cb_11RCP"></td>
		    <td><input type="checkbox" id="cb_11RSP" ng-checked="cb_11RSP" name="cb_11RSP"></td>
		    <td colspan="2" class="active">1. S ORGANOS DE LOS SENTIDOS</td>
		    <td><input type="checkbox" id="cb_1SCP" ng-checked="cb_1SCP" name="cb_1SCP"></td>
		    <td><input type="checkbox" id="cb_1SSP" ng-checked="cb_1SSP" name="cb_1SSP"></td>
		    <td colspan="2" class="active">6. S URINARIO</td>
		    <td><input type="checkbox" id="cb_6SCP" ng-checked="cb_6SCP" name="cb_6SCP"></td>
		    <td><input type="checkbox" id="cb_6SSP" ng-checked="cb_6SSP" name="cb_6SSP"></td>
		  </tr>
		  <tr style="font-size:10px;" align="center">
		    <td colspan="2" class="active">2.R CABEZA</td>
		    <td><input type="checkbox" id="cb_2RCP" ng-checked="cb_2RCP" name="cb_2RCP"></td>
		    <td><input type="checkbox" id="cb_2RSP" ng-checked="cb_2RSP" name="cb_2RSP"></td>
		    <td colspan="2" class="active">7.R OROFARINGE</td>
		    <td><input type="checkbox" id="cb_7RCP" ng-checked="cb_7RCP" name="cb_7RCP"></td>
		    <td><input type="checkbox" id="cb_7RSP" ng-checked="cb_7RSP" name="cb_7RSP"></td>
		    <td colspan="2" class="active">12.R COLUMNA VERTEBRAL</td>
		    <td><input type="checkbox" id="cb_12RCP" ng-checked="cb_12RCP" name="cb_12RCP"></td>
		    <td><input type="checkbox" id="cb_12RSP" ng-checked="cb_12RSP" name="cb_12RSP"></td>
		    <td colspan="2" class="active">2. S RESPIRATORIO</td>
		    <td><input type="checkbox" id="cb_2SCP" ng-checked="cb_2SCP" name="cb_2SCP"></td>
		    <td><input type="checkbox" id="cb_2SSP" ng-checked="cb_2SSP" name="cb_2SSP"></td>
		    <td colspan="2" class="active">7. S MÚSCULO ESQUELÉTICO</td>
		    <td><input type="checkbox" id="cb_7SCP" ng-checked="cb_7SCP" name="cb_7SCP"></td>
		    <td><input type="checkbox" id="cb_7SSP" ng-checked="cb_7SSP" name="cb_7SSP"></td>
		  </tr>
		  <tr style="font-size:10px;" align="center">
		    <td colspan="2" class="active">3.R OJOS</td>
		    <td><input type="checkbox" id="cb_3RCP" ng-checked="cb_3RCP" name="cb_3RCP"></td>
		    <td><input type="checkbox" id="cb_3RSP" ng-checked="cb_3RSP" name="cb_3RSP"></td>
		    <td colspan="2" class="active">8.R CUELLO</td>
		    <td><input type="checkbox" id="cb_8RCP" ng-checked="cb_8RCP" name="cb_8RCP"></td>
		    <td><input type="checkbox" id="cb_8RSP" ng-checked="cb_8RSP" name="cb_8RSP"></td>
		    <td colspan="2" class="active">13.R INGLE-PERINE</td>
		    <td><input type="checkbox" id="cb_13RCP" ng-checked="cb_13RCP" name="cb_13RCP"></td>
		    <td><input type="checkbox" id="cb_13RSP" ng-checked="cb_13RSP" name="cb_13RSP"></td>
		    <td colspan="2" class="active">3. S CARDIOVASCULAR</td>
		    <td><input type="checkbox" id="cb_3SCP" ng-checked="cb_3SCP" name="cb_3SCP"></td>
		    <td><input type="checkbox" id="cb_3SSP" ng-checked="cb_3SSP" name="cb_3SSP"></td>
		    <td colspan="2" class="active">8.S ENDOCRINO</td>
		    <td><input type="checkbox" id="cb_8SCP" ng-checked="cb_8SCP" name="cb_8SCP"></td>
		    <td><input type="checkbox" id="cb_8SSP" ng-checked="cb_8SSP" name="cb_8SSP"></td>
		  </tr>
		  <tr style="font-size:10px;" align="center">
		    <td colspan="2" class="active">4.R OIDOS</td>
		    <td><input type="checkbox" id="cb_4RCP" ng-checked="cb_4RCP" name="cb_4RCP"></td>
		    <td><input type="checkbox" id="cb_4RSP" ng-checked="cb_4RSP" name="cb_4RSP"></td>
		    <td colspan="2" class="active">9.R AXILAS MAMAS</td>
		    <td><input type="checkbox" id="cb_9RCP" ng-checked="cb_9RCP" name="cb_9RCP"></td>
		    <td><input type="checkbox" id="cb_9RSP" ng-checked="cb_9RSP" name="cb_9RSP"></td>
		    <td colspan="2" class="active">14.R MIEMBROS SUPERIORES</td>
		    <td><input type="checkbox" id="cb_14RCP" ng-checked="cb_14RCP" name="cb_14RCP"></td>
		    <td><input type="checkbox" id="cb_14RSP" ng-checked="cb_14RSP" name="cb_14RSP"></td>
		    <td colspan="2" class="active">4. S DIGESTIVOS</td>
		    <td><input type="checkbox" id="cb_4SCP" ng-checked="cb_4SCP" name="cb_4SCP"></td>
		    <td><input type="checkbox" id="cb_4SSP" ng-checked="cb_4SSP" name="cb_4SSP"></td>
		    <td colspan="2" class="active">9. S HEMOLINFÁTICOS</td>
		    <td><input type="checkbox" id="cb_9SCP" ng-checked="cb_9SCP" name="cb_9SCP"></td>
		    <td><input type="checkbox" id="cb_9SSP" ng-checked="cb_9SSP" name="cb_9SSP"></td>
		  </tr>
		  <tr style="font-size:10px;" align="center">
		    <td colspan="2" class="active">5.R NARIZ</td>
		    <td><input type="checkbox" id="cb_5RCP" ng-checked="cb_5RCP" name="cb_5RCP"></td>
		    <td><input type="checkbox" id="cb_5RSP" ng-checked="cb_5RSP" name="cb_5RSP"></td>
		    <td colspan="2" class="active">10.R TORAX</td>
		    <td><input type="checkbox" id="cb_10RCP" ng-checked="cb_10RCP" name="cb_10RCP"></td>
		    <td><input type="checkbox" id="cb_10RSP" ng-checked="cb_10RSP" name="cb_10RSP"></td>
		    <td colspan="2" class="active">15.R MIEMBROS</td>
		    <td><input type="checkbox" id="cb_15RCP" ng-checked="cb_15RCP" name="cb_15RCP"></td>
		    <td><input type="checkbox" id="cb_15RSP" ng-checked="cb_15RSP" name="cb_15RSP"></td>
		    <td colspan="2" class="active">5.S GENITAL</td>
		    <td><input type="checkbox" id="cb_5sCP" ng-checked="cb_5sCP" name="cb_5sCP"></td>
		    <td><input type="checkbox" id="cb_5sSP" ng-checked="cb_5sSP" name="cb_5sSP"></td>
		    <td colspan="2" class="active">10.S NEUROLÓGICO</td>
		    <td><input type="checkbox" id="cb_10sCP" ng-checked="cb_10sCP" name="cb_10sCP"></td>
		    <td><input type="checkbox" id="cb_10sSP" ng-checked="cb_10sSP" name="cb_10sSP"></td>
		  </tr>
		  <tr height="10px">
		    <td colspan="20"><textarea id="txtExaFisico" style=" border-width:0px; height:100%; width:98%" ng-model="txtExaFisico" name="txtExaFisico"></textarea></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active"><strong>9. DIAGNÓSTICO DE INGRESO</strong></td>
		  </tr>
		  <tr align="center">
		    <td colspan="8">&nbsp;</td>
		    <td class="active">CIE</td>
		    <td class="active">PRE</td>
		    <td class="active">DEF</td>
		    <td colspan="6">&nbsp;</td>
		    <td class="active">CIE</td>
		    <td class="active">PRE</td>
		    <td class="active">DEF</td>
		  </tr>
		  <tr align="center">
		    <td class="active">1</td>
		    <td colspan="7"><input type="text" id="txtCie1" style="border-width:0px; width:80%" value="" ng-model="txtCie1" name="txtCie1">
		      <a onclick="verDiagnostico(3)" href="#myModal" role="button" class="btn" data-toggle="modal"> <i class="icon-plus"></i></a></td>
		    <td style="width:8%"><input type="text" id="txtCod1" style="border-width:0px; width:70%" value="" ng-model="txtCod1" name="txtCod1"></td>
		    <td><input type="checkbox" id="cb_1PRE" ng-checked="cb_1PRE" name="cb_1PRE"></td>
		    <td><input type="checkbox" id="cb_1DEF" ng-checked="cb_1DEF" name="cb_1DEF"></td>
		    <td class="active">4</td>
		    <td colspan="5"><input type="text" id="txtCie4" style="border-width:0px; width:80%" value="" ng-model="txtCie4" name="txtCie4">
		      <a onclick="verDiagnostico(6)" href="#myModal" role="button" class="btn" data-toggle="modal"> <i class="icon-plus"></i></a></td>
		    <td style="width:8%"><input type="text" id="txtCod4" style="border-width:0px; width:70%" value="" ng-model="txtCod4" name="txtCod4"></td>
		    <td><input type="checkbox" id="cb_4PRE" ng-checked="cb_4PRE" name="cb_4PRE"></td>
		    <td><input type="checkbox" id="cb_4DEF" ng-checked="cb_4DEF" name="cb_4DEF"></td>
		  </tr>
		  <tr align="center">
		    <td class="active">2</td>
		    <td colspan="7"><input type="text" id="txtCie2" style="border-width:0px; width:80%" value="" ng-model="txtCie2" name="txtCie2">
		      <a onclick="verDiagnostico(4)" href="#myModal" role="button" class="btn" data-toggle="modal"> <i class="icon-plus"></i></a></td>
		    <td><input type="text" id="txtCod2" style="border-width:0px; width:70%" value="" ng-model="txtCod2" name="txtCod2"></td>
		    <td><input type="checkbox" id="cb_2PRE" ng-checked="cb_2PRE" name="cb_2PRE"></td>
		    <td><input type="checkbox" id="cb_2DEF" ng-checked="cb_2DEF" name="cb_2DEF"></td>
		    <td class="active">5</td>
		    <td colspan="5"><input type="text" id="txtCie5" style="border-width:0px; width:80%" value="" ng-model="txtCie5" name="txtCie5">
		      <a onclick="verDiagnostico(7)" href="#myModal" role="button" class="btn" data-toggle="modal"> <i class="icon-plus"></i></a></td>
		    <td><input type="text" id="txtCod5" style="border-width:0px; width:70%" value="" ng-model="txtCod5" name="txtCod5"></td>
		    <td><input type="checkbox" id="cb_5PRE" ng-checked="cb_5PRE" name="cb_5PRE"></td>
		    <td><input type="checkbox" id="cb_5DEF" ng-checked="cb_5DEF" name="cb_5DEF"></td>
		  </tr>
		  <tr align="center">
		    <td class="active">3</td>
		    <td colspan="7"><input type="text" id="txtCie3" style="border-width:0px; width:80%" value="" ng-model="txtCie3" name="txtCie3">
		      <a onclick="verDiagnostico(5)" href="#myModal" role="button" class="btn" data-toggle="modal"> <i class="icon-plus"></i></a></td>
		    <td><input type="text" id="txtCod3" style="border-width:0px; width:70%" value="" ng-model="txtCod3" name="txtCod3"></td>
		    <td><input type="checkbox" id="cb_3PRE" ng-checked="cb_3PRE" name="cb_3PRE"></td>
		    <td><input type="checkbox" id="cb_3DEF" ng-checked="cb_3DEF" name="cb_3DEF"></td>
		    <td class="active">6</td>
		    <td colspan="5"><input type="text" id="txti3" style="border-width:0px; width:80%" value="" ng-model="txti3" name="txti3">
		      <a onclick="verDiagnostico(8)" href="#myModal" role="button" class="btn" data-toggle="modal"> <i class="icon-plus"></i></a></td>
		    <td><input type="text" id="txtic3" style="border-width:0px; width:70%" value="" ng-model="txtic3" name="txtic3"></td>
		    <td><input type="checkbox" id="cb_6PRE" ng-checked="cb_6PRE" name="cb_6PRE"></td>
		    <td><input type="checkbox" id="cb_6DEF" ng-checked="cb_6DEF" name="cb_6DEF"></td>
		  </tr>
		  <tr>
		    <td colspan="20" class="active">&nbsp;</td>
		  </tr>
		  <tr height="10px">
		    <td colspan="20"><textarea id="txtPlanTrat" style=" border-width:0px; height:100%; width:98%" ng-model="txtPlanTrat" name="txtPlanTrat"></textarea></td>
		  </tr>
		  <tr height="50PX" align="center">
		    <td colspan="2" class="active" style="font-size:12px;">FECHA</td>
		    <td colspan="4">
            <div class="input-group date">
              <input  data-date-format="yyyy-mm-dd"   class="form-control" id="txtFechaAgendDoct"  ng-model="txtFechaAgendDoct" name="txtFechaAgendDoct">
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>
          <!--input type="date" id="txtFechaAgendDoct" ng-model="txtFechaAgendDoct" name="txtFechaAgendDoct"-->
        </td>
		    <td colspan="2" class="active" style="font-size:12px;">NOMBRE DEL PROFESIONAL</td>
		    <td colspan="4"><input type="text" style="border-width:0px; width:95%" value="$nombremedico" id="nombremedico" ng-model="nombremedico" name="nombremedico"></td>
		    <td colspan="2" class="active" style="font-size:12px;">FIRMA</td>
		    <td colspan="6"><input type="text" style="border-width:0px; width:95%" value="" id="firmaDoc" ng-model="firmaDoc" name="firmaDoc"></td>
		  </tr>
		</tbody></table>

		</form>
	</div>
  <div class = "panel-footer">
    <div >
          <input class = "btn btn-success" id="btnSave" type = "button" style = "margin-left: 10px" value = "Guardar"ng-click = "toggle('{{$operation}}')">
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
function init() {
    if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
    var $ = go.GraphObject.make;
    myDiagram =
      $(go.Diagram, "myDiagramDiv",
        {
          initialContentAlignment: go.Spot.Center,
          // For this sample, automatically show the state of the diagram's model on the page
          "ModelChanged": function(e) {
            if (e.isTransactionFinished) showModel();
          },
          "undoManager.isEnabled": true
        });
    var UnselectedBrush = "lightgray";  // item appearance, if not "selected"
    var SelectedBrush = "dodgerblue";   // item appearance, if "selected"
    function makeItemTemplate(leftside) {
      return $(go.Panel, "Auto",
          { margin: new go.Margin(1, 0) },  // some space between ports
          $(go.Shape,
            {
              name: "SHAPE",
              fill: UnselectedBrush, stroke: "gray",
              geometryString: "F1 m 0,0 l 5,0 1,4 -1,4 -5,0 1,-4 -1,-4 z",
              spot1: new go.Spot(0, 0, 5, 1),  // keep the text inside the shape
              spot2: new go.Spot(1, 1, -5, 0),
              // some port-related properties
              toSpot: go.Spot.Left,
              toLinkable: leftside,
              fromSpot: go.Spot.Right,
              fromLinkable: !leftside,
              cursor: "pointer"
            },
            new go.Binding("portId", "name")),
          $(go.TextBlock,
            new go.Binding("text", "name"),
            { // allow the user to select items -- the background color indicates whether "selected"
              isActionable: true,
              //?? maybe this should be more sophisticated than simple toggling of selection
              click: function(e, tb) {
                var shape = tb.panel.findObject("SHAPE");
                if (shape !== null) {
                  // don't record item selection changes
                  var oldskips = shape.diagram.skipsUndoManager;
                  shape.diagram.skipsUndoManager = true;
                  // toggle the Shape.fill
                  if (shape.fill === UnselectedBrush) {
                    shape.fill = SelectedBrush;
                  } else {
                    shape.fill = UnselectedBrush;
                  }
                  shape.diagram.skipsUndoManager = oldskips;
                }
              }
            })
        );
    }
    myDiagram.nodeTemplate =
      $(go.Node, "Spot",
        { selectionAdorned: false },
        { locationSpot: go.Spot.Center, locationObjectName: "BODY" },
        new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
        $(go.Panel, "Auto",
          { name: "BODY" },
          $(go.Shape, "RoundedRectangle",
            { stroke: "gray", strokeWidth: 2, fill: "transparent" },
            new go.Binding("stroke", "isSelected", function(b) { return b ? SelectedBrush : UnselectedBrush; }).ofObject()),
          $(go.Panel, "Vertical",
            { margin: 6 },
            $(go.TextBlock,
              new go.Binding("text", "name"),
              { alignment: go.Spot.Left }),
            $(go.Picture, "images/60x90.png",
              { width: 30, height: 45, margin: new go.Margin(10, 10) })
          )
        ),
        $(go.Panel, "Vertical",
          { name: "LEFTPORTS", alignment: new go.Spot(0, 0.5, 0, 7) },
          new go.Binding("itemArray", "inservices"),
          { itemTemplate: makeItemTemplate(true) }
        ),
        $(go.Panel, "Vertical",
          { name: "RIGHTPORTS", alignment: new go.Spot(1, 0.5, 0, 7) },
          new go.Binding("itemArray", "outservices"),
          { itemTemplate: makeItemTemplate(false) }
        )
      );
    myDiagram.linkTemplate =
      $(go.Link,
        { routing: go.Link.Orthogonal, corner: 10, toShortLength: -3 },
        { relinkableFrom: true, relinkableTo: true, reshapable: true, resegmentable: true },
        $(go.Shape, { stroke: "gray", strokeWidth: 2.5 })
      );
    function findAllSelectedItems() {
      var items = [];
      for (var nit = myDiagram.nodes; nit.next(); ) {
        var node = nit.value;
        //?? Maybe this should only return selected items that are within selected Nodes
        //if (!node.isSelected) continue;
        var table = node.findObject("LEFTPORTS");
        if (table !== null) {
          for (var iit = table.elements; iit.next(); ) {
            var itempanel = iit.value;
            var shape = itempanel.findObject("SHAPE");
            if (shape !== null && shape.fill === SelectedBrush) items.push(itempanel);
          }
        }
        table = node.findObject("RIGHTPORTS");
        if (table !== null) {
          for (var iit = table.elements; iit.next(); ) {
            var itempanel = iit.value;
            var shape = itempanel.findObject("SHAPE");
            if (shape !== null && shape.fill === SelectedBrush) items.push(itempanel);
          }
        }
      }
      return items;
    }
    // Override the standard CommandHandler deleteSelection and canDeleteSelection behavior.
    // If there are any selected items, delete them instead of deleting any selected nodes or links.
    myDiagram.commandHandler.canDeleteSelection = function() {
      // true if there are any selected deletable nodes or links,
      // or if there are any selected items within nodes
      return go.CommandHandler.prototype.canDeleteSelection.call(myDiagram.commandHandler) ||
               findAllSelectedItems().length > 0;
    };
    myDiagram.commandHandler.deleteSelection = function() {
      var items = findAllSelectedItems();
      if (items.length > 0) {  // if there are any selected items, delete them
        myDiagram.startTransaction("delete items");
        for (var i = 0; i < items.length; i++) {
          var item = items[i];
          var nodedata = item.part.data;
          var itemdata = item.data;
          // find the item array that the item data is in; try "inservices" first
          var itemarray = nodedata.inservices;
          var itemindex = itemarray.indexOf(itemdata);
          if (itemindex < 0) {  // otherwise try "outservices"
            itemarray = nodedata.outservices;
            itemindex = itemarray.indexOf(itemdata);
          }
          if (itemindex >= 0) {
            myDiagram.model.removeArrayItem(itemarray, itemindex);
          }
        }
        myDiagram.commitTransaction("delete items");
      } else {  // otherwise just delete nodes and/or links, as usual
        go.CommandHandler.prototype.deleteSelection.call(myDiagram.commandHandler);
      }
    };
    myDiagram.model =
      $(go.GraphLinksModel,
        {
          copiesArrays: true,
          copiesArrayObjects: true,
          linkFromPortIdProperty: "fromPort",
          linkToPortIdProperty: "toPort",
          nodeDataArray: [
              { key: 1, name: "Server", inservices: [{ name: "s1" }, { name: "s2" }], outservices: [{ name: "o1" }], loc: "0 0" },
              { key: 2, name: "Other", inservices: [{ name: "s1" }, { name: "s2" }], loc: "200 60" }
            ],
          linkDataArray: [
              { from: 1, fromPort: "o1", to: 2, toPort: "s2" }
            ]
        });
    showModel();
    function showModel() {
      document.getElementById("mySavedModel").value = myDiagram.model.toJson();
    }
  }

  $(document).ready(function() {
    $('#txtFechaAgendDoct').datepicker({
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

  app.controller("controllerAnamnesisHospitalizacion", function ($scope, $http, API_URL)
  {

  //Como inician los campos

  $scope.init = function ()
  {
  	




    $("#volver").attr("href","{{ url('/admin/anamnesis_hospitalizacion?m=36') }}");
    if("{{$operation == 'update'}}"){

      $("#id_medico").val("{{$anamnesisHospitalizacion->id_medico}}").trigger("change");
      $("#id_paciente").val("{{$anamnesisHospitalizacion->id_paciente}}").trigger("change");
    }else{
      $("#id_medico").val("").trigger("change");
      $("#id_paciente").val("").trigger("change");
    }
    $scope.id_medico = "{{($operation == 'update')?$anamnesisHospitalizacion->id_medico :''}}";
    $scope.id_paciente = "{{($operation == 'update')?$anamnesisHospitalizacion->id_paciente :''}}";
    $scope.MotivoConsA = "{{($operation == 'update')?$anamnesisHospitalizacion->MotivoConsA :''}}";
    $scope.MotivoConsC = "{{($operation == 'update')?$anamnesisHospitalizacion->MotivoConsC :''}}";
    $scope.MotivoConsB = "{{($operation == 'update')?$anamnesisHospitalizacion->MotivoConsB :''}}";
    $scope.MotivoConsD = "{{($operation == 'update')?$anamnesisHospitalizacion->MotivoConsD :''}}";
    $scope.cb_vacunas = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_vacunas :''}}";
    $scope.cb_alergica = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_alergica :''}}";
    $scope.cb_neurologica = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_neurologica :''}}";
    $scope.cb_traumatologica = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_traumatologica :''}}";
    $scope.cb_tendsexual = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_tendsexual :''}}";
    $scope.cb_actsexual = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_actsexual :''}}";
    $scope.cb_perinatal = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_perinatal :''}}";
    $scope.cb_cardiaca = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_cardiaca :''}}";
    $scope.cb_metabolica = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_metabolica :''}}";
    $scope.cb_quirurgica = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_quirurgica :''}}";
    $scope.cb_riesgosocial = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_riesgosocial :''}}";
    $scope.cb_dietahabitos = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_dietahabitos :''}}";
    $scope.cb_infancia = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_infancia :''}}";
    $scope.cb_respiratoria = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_respiratoria :''}}";
    $scope.cb_hemolinf = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_hemolinf :''}}";
    $scope.cb_mental = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_mental :''}}";
    $scope.cb_riesgolaboral = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_riesgolaboral :''}}";
    $scope.cb_religioncultura = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_religioncultura :''}}";
    $scope.cb_adolecente = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_adolecente :''}}";
    $scope.cb_digestiva = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_digestiva :''}}";
    $scope.cb_urinaria = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_urinaria :''}}";
    $scope.cb_tsexual = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_tsexual :''}}";
    $scope.cb_riesgofamiliar = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_riesgofamiliar :''}}";
    $scope.cb_otro = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_otro :''}}";
    $scope.cb_cardiopatia = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_cardiopatia :''}}";
    $scope.cb_diabetes = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_diabetes :''}}";
    $scope.cb_enfvasculares = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_enfvasculares :''}}";
    $scope.cb_hta = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_hta :''}}";
    $scope.cb_cancer = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_cancer :''}}";
    $scope.cb_tuberculosis = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_tuberculosis :''}}";
    $scope.cb_enfenfmental = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_enfenfmental :''}}";
    $scope.cb_enfinfecciosa = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_enfinfecciosa :''}}";
    $scope.cb_malformacion = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_malformacion :''}}";
    $scope.cb_afotro = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_afotro :''}}";
    $scope.cb_1CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1CP :''}}";
    $scope.cb_1SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1SP :''}}";
    $scope.cb_3CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3CP :''}}";
    $scope.cb_3SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3SP :''}}";
    $scope.cb_5CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5CP :''}}";
    $scope.cb_5SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5SP :''}}";
    $scope.cb_7CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_7CP :''}}";
    $scope.cb_7SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_7SP :''}}";
    $scope.cb_9CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_9CP :''}}";
    $scope.cb_9SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_9SP :''}}";
    $scope.cb_2CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2CP :''}}";
    $scope.cb_2SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2SP :''}}";
    $scope.cb_4CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4CP :''}}";
    $scope.cb_4SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4SP :''}}";
    $scope.cb_6CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6CP :''}}";
    $scope.cb_6SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6SP :''}}";
    $scope.cb_8CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_8CP :''}}";
    $scope.cb_8SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_8SP :''}}";
    $scope.cb_10CP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_10CP :''}}";
    $scope.cb_10SP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_10SP :''}}";
    $scope.ta = "{{($operation == 'update')?$anamnesisHospitalizacion->ta :''}}";
    $scope.fc = "{{($operation == 'update')?$anamnesisHospitalizacion->fc :''}}";
    $scope.fr = "{{($operation == 'update')?$anamnesisHospitalizacion->fr :''}}";
    $scope.sato2 = "{{($operation == 'update')?$anamnesisHospitalizacion->sato2 :''}}";
    $scope.tempbuc = "{{($operation == 'update')?$anamnesisHospitalizacion->tempbuc :''}}";
    $scope.peso = "{{($operation == 'update')?$anamnesisHospitalizacion->peso :''}}";
    $scope.glucem = "{{($operation == 'update')?$anamnesisHospitalizacion->glucem :''}}";
    $scope.talla = "{{($operation == 'update')?$anamnesisHospitalizacion->talla :''}}";
    $scope.gm = "{{($operation == 'update')?$anamnesisHospitalizacion->gm :''}}";
    $scope.go = "{{($operation == 'update')?$anamnesisHospitalizacion->go :''}}";
    $scope.gv = "{{($operation == 'update')?$anamnesisHospitalizacion->gv :''}}";
    $scope.cb_1RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1RCP :''}}";
    $scope.cb_1RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1RSP :''}}";
    $scope.cb_6RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6RCP :''}}";
    $scope.cb_6RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6RSP :''}}";
    $scope.cb_11RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_11RCP :''}}";
    $scope.cb_11RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_11RSP :''}}";
    $scope.cb_1SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1SCP :''}}";
    $scope.cb_1SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1SSP :''}}";
    $scope.cb_6SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6SCP :''}}";
    $scope.cb_6SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6SSP :''}}";
    $scope.cb_2RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2RCP :''}}";
    $scope.cb_2RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2RSP :''}}";
    $scope.cb_7RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_7RCP :''}}";
    $scope.cb_7RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_7RSP :''}}";
    $scope.cb_12RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_12RCP :''}}";
    $scope.cb_12RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_12RSP :''}}";
    $scope.cb_2SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2SCP :''}}";
    $scope.cb_2SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2SSP :''}}";
    $scope.cb_7SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_7SCP :''}}";
    $scope.cb_7SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_7SSP :''}}";
    $scope.cb_3RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3RCP :''}}";
    $scope.cb_3RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3RSP :''}}";
    $scope.cb_8RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_8RCP :''}}";
    $scope.cb_8RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_8RSP :''}}";

    $scope.cb_13RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_13RCP :''}}";
    $scope.cb_13RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_13RSP :''}}";
    $scope.cb_3SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3SCP :''}}";
    $scope.cb_3SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3SSP :''}}";
    $scope.cb_8SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_8SCP :''}}";
    $scope.cb_8SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_8SSP :''}}";
    $scope.cb_4RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4RCP :''}}";
    $scope.cb_4RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4RSP :''}}";
    $scope.cb_9RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_9RCP :''}}";
    $scope.cb_9RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_9RSP :''}}";
    $scope.cb_14RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_14RCP :''}}";
    $scope.cb_14RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_14RSP :''}}";
    $scope.cb_4SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4SCP :''}}";
    $scope.cb_4SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4SSP :''}}";
    $scope.cb_9SCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_9SCP :''}}";
    $scope.cb_9SSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_9SSP :''}}";
    $scope.cb_5RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5RCP :''}}";
    $scope.cb_5RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5RSP :''}}";
    $scope.cb_10RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_10RCP :''}}";
    $scope.cb_10RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_10RSP :''}}";
    $scope.cb_15RCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_15RCP :''}}";
    $scope.cb_15RSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_15RSP :''}}";
    $scope.cb_5sCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5sCP :''}}";
    $scope.cb_5sSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5sSP :''}}";
    $scope.cb_10sCP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_10sCP :''}}";
    $scope.cb_10sSP = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_10sSP :''}}";
    $scope.txtCie1 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCie1 :''}}";
    $scope.txtCod1 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCod1 :''}}";
    $scope.cb_1PRE = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1PRE :''}}";
    $scope.cb_1DEF = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_1DEF :''}}";
    $scope.txtCie4 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCie4 :''}}";
    $scope.txtCod4 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCod4 :''}}";
    $scope.cb_4PRE = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4PRE :''}}";
    $scope.cb_4DEF = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_4DEF :''}}";
    $scope.txtCie2 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCie2 :''}}";
    $scope.txtCod2 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCod2 :''}}";
    $scope.cb_2PRE = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2PRE :''}}";
    $scope.cb_2DEF = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_2DEF :''}}";
    $scope.txtCie5 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCie5 :''}}";
    $scope.txtCod5 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCod5 :''}}";
    $scope.cb_5PRE = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5PRE :''}}";
    $scope.cb_5DEF = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_5DEF :''}}";
    $scope.txtCie3 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCie3 :''}}";
    $scope.txtCod3 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtCod3 :''}}";
    $scope.cb_3PRE = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3PRE :''}}";

    $scope.cb_3DEF = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_3DEF :''}}";
    $scope.txti3 = "{{($operation == 'update')?$anamnesisHospitalizacion->txti3 :''}}";
    $scope.txtic3 = "{{($operation == 'update')?$anamnesisHospitalizacion->txtic3 :''}}";
    $scope.cb_6PRE = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6PRE :''}}";
    $scope.cb_6DEF = "{{($operation == 'update')?$anamnesisHospitalizacion->cb_6DEF :''}}";
    $scope.txtFechaAgendDoct = "{{($operation == 'update')?$anamnesisHospitalizacion->txtFechaAgendDoct :''}}";
    $scope.nombremedico = "{{($operation == 'update')?$anamnesisHospitalizacion->nombremedico :''}}";
    $scope.firmaDoc = "{{($operation == 'update')?$anamnesisHospitalizacion->firmaDoc :''}}";
    $scope.txtAntePer = "{{($operation == 'update')?$anamnesisHospitalizacion->txtAntePer :''}}";

    $scope.txtNoRef = "{{($operation == 'update')?$anamnesisHospitalizacion->txtNoRef :''}}";
    $scope.txtProbActual = "{{($operation == 'update')?$anamnesisHospitalizacion->txtProbActual :''}}";
    $scope.txtRevisOrgs = "{{($operation == 'update')?$anamnesisHospitalizacion->txtRevisOrgs :''}}";
    $scope.txtExaFisico = "{{($operation == 'update')?$anamnesisHospitalizacion->txtExaFisico :''}}";
    $scope.txtPlanTrat = "{{($operation == 'update')?$anamnesisHospitalizacion->txtPlanTrat :''}}";


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
    o= o.replace(/\\r\\n/g, "\\\\n");
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
        console.log($scope.serializeObject($("#form_anamnesisHospitalizacion")));
        $http({
          url    : API_URL + 'anamnesis_hospitalizacion',
          method : 'POST',
          params : $scope.serializeObject($("#form_anamnesisHospitalizacion")),
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
              closeOnConfirm: true,
              showLoaderOnConfirm: true
            },
            function(){
              $(".modal").modal('show');
              window.location = "{{ url('/admin/anamnesis_hospitalizacion?m=36') }}";
            });
          } else {
            swal("Error", "¡No se guardó!", "error");
          }
        });

        break;

      case 'update':

        $(".modal").modal('show');

        $http({
          url    : API_URL + 'anamnesis_hospitalizacion/{{$anamnesisHospitalizacion->id}}',
          method : 'PUT',
          params : $scope.serializeObject($("#form_anamnesisHospitalizacion")),
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
              closeOnConfirm: true,
              showLoaderOnConfirm: true
            },
            function(){
              $(".modal").modal('show');
              window.location = "{{ url('/admin/anamnesis_hospitalizacion?m=36') }}";
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
