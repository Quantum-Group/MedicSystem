@extends("crudbooster::admin_template")
@section("content")
    <style type="text/css">
        .panel-group{
            max-height: 350px;
            overflow-y:scroll;
        }

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


    <div class = "box" ng-app="MyApp" ng-controller="controllerLaboratorio">
    	<div class = "box-body">
    		<form id="form_laboratorio" method="POST" action="" name="form_laboratorio" >
    			{{ csrf_field() }}
    			  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#medicoPaciente">Medico/Paciente</a></li>
                    <li><a data-toggle="tab" href="#laboratorio">Laboratorio</a></li>
                    <li><a data-toggle="tab" href="#imagen3d">Imagen 3D</a></li>
                </ul>
                </div>
                <div class="tab-content">
                    <div id="medicoPaciente" class="tab-pane fade in active ">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Medico</label>
                            <select class="form-control js-example-basic-single " ng-model="id_medico" name="id_medico"id="id_medico" placeholder="Introduzca nombre del Medico">
                              <option value="" >Seleccione un doctor:</option>
                              @foreach($medicos as $m)
                               <option value="{{$m->id}}">{{$m->nombre." ".$m->apellido}}</option>
                              @endforeach
                           </select>


                        </div>
                        <div class="form-group col-md-6">
                            <label for="paciente">Paciente</label>

                            <select class="form-control" id="id_paciente" placeholder="Select a state"  ng-model="id_paciente" name="id_paciente">
                                <option value="" >Seleccione un paciente:</option>
                              @foreach($pacientes as $p)
                               <option value="{{$p->id}}" >{{$p->nombre." ".$p->apellido}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="input-group date">
                            <input type="text" class="form-control" id="fecha" data-date="12/03/2012" ng-model="fecha" name="fecha">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                            <!--div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="date" title="Fecha" readonly="" required="" class="form-control notfocus datepicker datepicker medico_id" id="fecha" value="" ng-model="fecha" name="fecha">
                            </div-->
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div id="laboratorio" class="tab-pane fade ">
                      <div class="panel-group col-md-11  " id="accordion">
                        <br>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" class="opcion" data-parent="#accordion" href="#hematologia">
                                HEMATOLOGÍA</a>
                            </h4>
                          </div>
                          <div id="hematologia" class="panel-collapse collapse in">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" id="bio_h" ng-checked="bio_h" name="bio_h">Biometría Hemática</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hto_hb" ng-checked="hto_hb" name="hto_hb">Hto Hb</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="reticulocitos" ng-checked="reticulocitos" name="reticulocitos">Reticulocitos</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="sedimentacion_ves" ng-checked="sedimentacion_ves" name="sedimentacion_ves">Sedimentación V.E.S </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="formula_leuco" ng-checked="formula_leuco" name="formula_leuco">Fórmula Leucocitaria</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="plaquetas" ng-checked="plaquetas" name="plaquetas">Plaquetas</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"> <input type="checkbox" class="chkExamenes" id="grupo_sanguineo" ng-checked="grupo_sanguineo" name="grupo_sanguineo">Grupo Sanguineo</label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#orina">
                                ORINA</a>
                            </h4>
                          </div>
                          <div id="orina" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="elemental_microscopico" ng-checked="elemental_microscopico" name="elemental_microscopico">Elemental y Microscópico </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="gota_fresca" ng-checked="gota_fresca" name="gota_fresca">Gota Fresca</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="gram_o" ng-checked="gram_o" name="gram_o">Gram</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="microalbuminuria" ng-checked="microalbuminuria" name="microalbuminuria">Microalbuminuria</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="proteinuria24" ng-checked="proteinuria24" name="proteinuria24"> Proteinuria 24 horas</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="depuracion_creatinina" ng-checked="depuracion_creatinina" name="depuracion_creatinina">Depuración Creatinina</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="sodio" ng-checked="sodio" name="sodio">Sodio </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="potasio" ng-checked="potasio" name="potasio">Potasio</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="cloro" ng-checked="cloro" name="cloro">Cloro</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_urico" ng-checked="ac_urico" name="ac_urico">Ac. Urico</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="calcio" ng-checked="calcio" name="calcio">Calcio</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="fosforo" ng-checked="fosforo" name="fosforo">Fósforo</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="magnesio" ng-checked="magnesio" name="magnesio">Magnesio</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="prueba_embarazo" ng-checked="prueba_embarazo" name="prueba_embarazo">Prueba de embarazo</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="panel_drogas" ng-checked="panel_drogas" name="panel_drogas">Panel de drogas (abuso)</label>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  Otros (Orina): <textarea id="txt_otros_orina" cols="50" rows="2" ng-model="txt_otros_orina" name="txt_otros_orina"></textarea>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#serologia">
                                SEROLOGÍA</a>
                            </h4>
                          </div>
                          <div id="serologia" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="asto_cuantitativo" ng-checked="asto_cuantitativo" name="asto_cuantitativo">Asto Cuantitativo</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="pcr_cualitativo" ng-checked="pcr_cualitativo" name="pcr_cualitativo">PCR Cualitativo</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="latex" ng-checked="latex" name="latex">LATEX</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="vdrl" ng-checked="vdrl" name="vdrl">VDRL </label>
                                </td>
                              </tr>
                              <tr>

                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="aglutinaciones_febriles" ng-checked="aglutinaciones_febriles" name="aglutinaciones_febriles">Aglutinaciones Febriles</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="helicobacter_pylori" ng-checked="helicobacter_pylori" name="helicobacter_pylori">Helicobacter Pylori IGG ... IGM </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="peptido_citrulinado" ng-checked="peptido_citrulinado" name="peptido_citrulinado">Peptido citrulinado</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_citrulina" ng-checked="anti_citrulina" name="anti_citrulina">Anti Citrulina</label>
                                </td>
                                <td></td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#coagulacion">
                                COAGULACIÓN</a>
                            </h4>
                          </div>
                          <div id="coagulacion" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tp" ng-checked="tp" name="tp">TP </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ttp" ng-checked="ttp" name="ttp">TTP</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tiempo_trombina" ng-checked="tiempo_trombina" name="tiempo_trombina">Tiempo Trombina</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="inr" ng-checked="inr" name="inr">INR </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tiempo_coagulacion" ng-checked="tiempo_coagulacion" name="tiempo_coagulacion">Tiempo Coagulación</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="fibrinogeno" ng-checked="fibrinogeno" name="fibrinogeno">Fibrinógeno</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tiempo_hemorragia" ng-checked="tiempo_hemorragia" name="tiempo_hemorragia">Tiempo Hemorragia</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="antitrombina_iii" ng-checked="antitrombina_iii" name="antitrombina_iii">Antitrombina III </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="coombs_directo" ng-checked="coombs_directo" name="coombs_directo">Coombs Directo </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="coombs_indirecto" ng-checked="coombs_indirecto" name="coombs_indirecto">Coombs Indirecto</label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="retraccion_coagulo" ng-checked="retraccion_coagulo" name="retraccion_coagulo">Retracción de Coágulo </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#inmunodiagnostico">
                                INMUNODIAGNÓSTICO</a>
                            </h4>
                          </div>
                          <div id="inmunodiagnostico" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline"> <input type="checkbox" class="chkExamenes" id="anti_toxoplasma" ng-checked="anti_toxoplasma" name="anti_toxoplasma">Anti Toxoplasma </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_toxoplasma" ng-checked="igg_anti_toxoplasma" name="igg_anti_toxoplasma">IgG (Anti Toxoplasma)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_toxoplasma" ng-checked="igm_anti_toxoplasma" name="igm_anti_toxoplasma">IgM (Anti Toxoplasma)</label>
                                </td>
                              </tr>
                              <tr>

                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_rubeola" ng-checked="anti_rubeola" name="anti_rubeola">Anti Rubeola</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_rubeola" ng-checked="igg_anti_rubeola" name="igg_anti_rubeola">IgG (Anti Rubeola)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_rubeola" ng-checked="igm_anti_rubeola" name="igm_anti_rubeola">IgM (Anti Rubeola)</label>
                                </td>
                              </tr>
                              <tr>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_cmv" ng-checked="anti_cmv" name="anti_cmv">Anti CMV </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_cmv" ng-checked="igg_anti_cmv" name="igg_anti_cmv">IgG (Anti CMV) </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_cmv" ng-checked="igm_anti_cmv" name="igm_anti_cmv">IgM (Anti CMV)</label>
                                </td>
                              </tr>
                              <tr>

                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_herpes_i" ng-checked="anti_herpes_i" name="anti_herpes_i">Anti Herpes I</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_herpes_i" ng-checked="igg_anti_herpes_i" name="igg_anti_herpes_i">Ig (Anti Herpes I)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_herpes_i" ng-checked="igm_anti_herpes_i" name="igm_anti_herpes_i">IgM (Anti Herpes I)</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_herpes_ii" ng-checked="anti_herpes_ii" name="anti_herpes_ii">Anti Herpes II</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_herpes_ii" ng-checked="igg_anti_herpes_ii" name="igg_anti_herpes_ii">IgG (Anti Herpes II)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_herpes_ii" ng-checked="igm_anti_herpes_ii" name="igm_anti_herpes_ii">IgM (Anti Herpes II)</label>
                                </td>
                              </tr>
                              <tr>

                              </tr>
                              <tr>

                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="torch" ng-checked="torch" name="torch">TORCH</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_torch" ng-checked="igg_torch" name="igg_torch"> IgG (TORCH)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_torch" ng-checked="igm_torch" name="igm_torch">IgM (TORCH)</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="c3" ng-checked="c3" name="c3">C3</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="c4" ng-checked="c4" name="c4">C4</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm" ng-checked="igm" name="igm">IgM</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ige" ng-checked="ige" name="ige">IgE</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="iga" ng-checked="iga" name="iga">IgA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igd" ng-checked="igd" name="igd">IgD</label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg" ng-checked="igg" name="igg">IgG</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="chlamidia" ng-checked="chlamidia" name="chlamidia">Chlamidia</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_chlamidia" ng-checked="igg_chlamidia" name="igg_chlamidia">IgG (Chlamidia)</label>
                                </td>


                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_chlamidia" ng-checked="igm_chlamidia" name="igm_chlamidia">IgM (Chlamidia)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="iga_chlamidia" ng-checked="iga_chlamidia" name="iga_chlamidia">IgA (Chlamidia)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hepatitis_a" ng-checked="hepatitis_a" name="hepatitis_a">Hepatitis A</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_hepatitis_a" ng-checked="igg_hepatitis_a" name="igg_hepatitis_a"> IgG (Hepatitis A)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_hepatitis_a" ng-checked="igm_hepatitis_a" name="igm_hepatitis_a">IgM (Hepatitis A)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hepatitis_b" ng-checked="hepatitis_b" name="hepatitis_b">Hepatitis B</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hbsag_hepatitis_b" ng-checked="hbsag_hepatitis_b" name="hbsag_hepatitis_b"> HBsAg (Hepatitis B)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_hbs_hepatitis_b" ng-checked="anti_hbs_hepatitis_b" name="anti_hbs_hepatitis_b"> Anti HBs (Hepatitis B)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hbc_hepatitis_b" ng-checked="hbc_hepatitis_b" name="hbc_hepatitis_b"> HBc (Hepatitis B)</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_hepatitis_b" ng-checked="igg_hepatitis_b" name="igg_hepatitis_b"> IgG (Hepatitis B)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_hepatitis_b" ng-checked="igm_hepatitis_b" name="igm_hepatitis_b">Igm (Hepatitis B)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hbeag_hepatitis_b" ng-checked="hbeag_hepatitis_b" name="hbeag_hepatitis_b">HBeAg (Hepatitis B)</label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_hbe_hepatitis_b" ng-checked="anti_hbe_hepatitis_b" name="anti_hbe_hepatitis_b"> Anti HBe (Hepatitis B)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hepatitis_c" ng-checked="hepatitis_c" name="hepatitis_c">Hepatitis C </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tuberculosis_suero" ng-checked="tuberculosis_suero" name="tuberculosis_suero">Tuberculosis en suero
                                  </label>
                                </td>



                              </tr>

                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#autoinmunidad">
                                AUTOINMUNIDAD</a>
                            </h4>
                          </div>
                          <div id="autoinmunidad" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_antinucleares" ng-checked="ac_antinucleares" name="ac_antinucleares"> Ac. Antinucleares </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_anti_dna" ng-checked="ac_anti_dna" name="ac_anti_dna"> Ac. Anti DNA </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="celulas_le" ng-checked="celulas_le" name="celulas_le"> Células Le </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anticitrulina_anti_ccp" ng-checked="anticitrulina_anti_ccp" name="anticitrulina_anti_ccp"> Anticitrulina (Anti -CCP) </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_antimicrosomales" ng-checked="ac_antimicrosomales" name="ac_antimicrosomales"> Ac. Antimicrosomales </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_antitiroglobulinas" ng-checked="ac_antitiroglobulinas" name="ac_antitiroglobulinas"> Ac. Antitiroglobulinas </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ana_biot" ng-checked="ana_biot" name="ana_biot"> ANA -BIOT </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="antifosfolipidos" ng-checked="antifosfolipidos" name="antifosfolipidos"> Antifosfolípidos </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="autoinmunidad_igg " ng-checked="autoinmunidad_igg " name="autoinmunidad_igg "> IgG (Antifosfolípidos) </label>

                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="igm_antifosfolipidos" ng-checked="igm_antifosfolipidos" name="igm_antifosfolipidos"> IgM (Antifosfolípidos)</label>

                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="anticardiolipinas" ng-checked="anticardiolipinas" name="anticardiolipinas"> Anticardiolipinas </label>

                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="igg_anticardiolipinas" ng-checked="igg_anticardiolipinas" name="igg_anticardiolipinas"> IgG (Anticardiolipinas)</label>

                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="igm_anticardiolipinas" ng-checked="igm_anticardiolipinas" name="igm_anticardiolipinas"> IgM (Anticardiolipinas)</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="anti_b2gp1" ng-checked="anti_b2gp1" name="anti_b2gp1"> ANTI B2GP1 </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ancas" ng-checked="ancas" name="ancas"> ANCAS</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="anti_mitocondriales" ng-checked="anti_mitocondriales" name="anti_mitocondriales"> Anti mitocondriales </label>
                                </td>
                              </tr>

                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#quimicaSanguinea">
                                QUÍMICA SANGUÍNEA</a>
                            </h4>
                          </div>
                          <div id="quimicaSanguinea" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_glu_ayuna" ng-checked="quimica_sanguinea_glu_ayuna" name="quimica_sanguinea_glu_ayuna"> Glucosa Ayunas </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_glu2h_post_p" ng-checked="quimica_sanguinea_glu2h_post_p" name="quimica_sanguinea_glu2h_post_p"> Glocosa 2horas Post Prandial </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="curva_glucosa" ng-checked="curva_glucosa" name="curva_glucosa"> Curva de Glucosa </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fructosamina" ng-checked="fructosamina" name="fructosamina"> Fructosamina </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="urea_q" ng-checked="urea_q" name="urea_q"> Urea </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="creatinina_q" ng-checked="creatinina_q" name="creatinina_q"> Creatinina </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="bun" ng-checked="bun" name="bun"> Bun
                                </label></td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="acido_urico" ng-checked="acido_urico" name="acido_urico"> Ácido Úrico </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="colesterol" ng-checked="colesterol" name="colesterol"> Colesterol</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hdl_colesterol" ng-checked="hdl_colesterol" name="hdl_colesterol"> HDL -Colesterol </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ldl_colesterol" ng-checked="ldl_colesterol" name="ldl_colesterol"> LDL -Colesterol </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="trigliceridos_q" ng-checked="trigliceridos_q" name="trigliceridos_q"> Triglicéridos </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="apolipoproteina_a" ng-checked="apolipoproteina_a" name="apolipoproteina_a"> Apolipoproteína A </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="apolipoproteina_b" ng-checked="apolipoproteina_b" name="apolipoproteina_b"> Apolipoproteína B </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="vldl" ng-checked="vldl" name="vldl"> VLDL </label>

                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="bilirrubinas_total" ng-checked="bilirrubinas_total" name="bilirrubinas_total"> Bilirrubinas (Total -Directa -Indirecta) </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="proteinas_totales" ng-checked="proteinas_totales" name="proteinas_totales"> Proteínas Totales </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="albumina" ng-checked="albumina" name="albumina"> Albumina </label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="globulina" ng-checked="globulina" name="globulina"> Globulina </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hb_glicosilada" ng-checked="hb_glicosilada" name="hb_glicosilada"> HB glicosilada </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hierro_serico" ng-checked="hierro_serico" name="hierro_serico"> Hierro sérico</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hierro_captacion_fijacion" ng-checked="hierro_captacion_fijacion" name="hierro_captacion_fijacion"> Hierro captaciòn fijación</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="vit_b12" ng-checked="vit_b12" name="vit_b12"> Vit. B12</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="transferrina" ng-checked="transferrina" name="transferrina"> Transferrina </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ferritina_q" ng-checked="ferritina_q" name="ferritina_q"> Ferritina </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ac_folico" ng-checked="ac_folico" name="ac_folico"> Ac. Fólico </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ins_saturacion" ng-checked="ins_saturacion" name="ins_saturacion"> Ins. Saturación </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_tgo_ast" ng-checked="quimica_sanguinea_tgo_ast" name="quimica_sanguinea_tgo_ast"> TGO /AST</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tgp_alt" ng-checked="tgp_alt" name="tgp_alt"> TGP /ALT </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cpk" ng-checked="cpk" name="cpk"> CPK </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cpk_mb" ng-checked="cpk_mb" name="cpk_mb"> CPK -MB </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_gamma_gt" ng-checked="quimica_sanguinea_gamma_gt" name="quimica_sanguinea_gamma_gt"> Gamma GT </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="troponina" ng-checked="troponina" name="troponina"> Troponina </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_fosfatasa_alcalina" ng-checked="quimica_sanguinea_fosfatasa_alcalina" name="quimica_sanguinea_fosfatasa_alcalina"> Fosfatasa Alcalina </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="aldolasa" ng-checked="aldolasa" name="aldolasa"> Aldolasa </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fosfatasa_acida" ng-checked="fosfatasa_acida" name="fosfatasa_acida"> Fosfatasa Acida </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fost_ac_prostatica" ng-checked="fost_ac_prostatica" name="fost_ac_prostatica"> Fost. Ac. Prostática</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="amilasa" ng-checked="amilasa" name="amilasa"> Amilasa </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="lipasa" ng-checked="lipasa" name="lipasa"> Lipasa </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="glucosa_6_fosfato_dh" ng-checked="glucosa_6_fosfato_dh" name="glucosa_6_fosfato_dh"> Glucosa 6 Fosfato DH </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="deshidrogenasa_lactica" ng-checked="deshidrogenasa_lactica" name="deshidrogenasa_lactica"> Deshidrogenasa Láctica </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="colinesterasa" ng-checked="colinesterasa" name="colinesterasa"> Colinesterasa </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="acido_lactico" ng-checked="acido_lactico" name="acido_lactico"> Acido Láctico </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="osmolaridad_serica" ng-checked="osmolaridad_serica" name="osmolaridad_serica"> Osmolaridad Sèrica </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#heces">
                                HECES</a>
                            </h4>
                          </div>
                          <div id="heces" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="coproparasitario_rutina" ng-checked="coproparasitario_rutina" name="coproparasitario_rutina"> Coproparasitario rutina </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="coproparasitario_seriado" ng-checked="coproparasitario_seriado" name="coproparasitario_seriado"> Coproparasitario Seriado </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="inv_polimorfonucleares" ng-checked="inv_polimorfonucleares" name="inv_polimorfonucleares"> Inv. Polimorfonucleares</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="sangre_oculta" ng-checked="sangre_oculta" name="sangre_oculta"> Sangre oculta</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="rotavirus" ng-checked="rotavirus" name="rotavirus"> Rotavirus </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ph" ng-checked="ph" name="ph"> pH </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="concentracion" ng-checked="concentracion" name="concentracion"> Concentración </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="andenovirus" ng-checked="andenovirus" name="andenovirus"> Andenovirus </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="sudan_iii" ng-checked="sudan_iii" name="sudan_iii"> Sudan III </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="coprologico" ng-checked="coprologico" name="coprologico"> Coprológico</label>
                                </td>
                              </tr>

                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#marcadoreTumorales">
                                MARCADORES TUMORALES</a>
                            </h4>
                          </div>
                          <div id="marcadoreTumorales" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cea_carcino_embrionario" ng-checked="cea_carcino_embrionario" name="cea_carcino_embrionario"> CEA -Carcino Embrionario </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="afp_alfa_feto_proteina" ng-checked="afp_alfa_feto_proteina" name="afp_alfa_feto_proteina"> AFP - Alfa -feto Proteína </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="psa_antigeno_prostatico_especifico" ng-checked="psa_antigeno_prostatico_especifico" name="psa_antigeno_prostatico_especifico"> PSA - Antígeno Prostático Específico </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="psa_libre" ng-checked="psa_libre" name="psa_libre"> PSA libre </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ca_125" ng-checked="ca_125" name="ca_125"> Ca 125 </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ca_19_9" ng-checked="ca_19_9" name="ca_19_9"> Ca 19 -9 </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="anti_tpo" ng-checked="anti_tpo" name="anti_tpo"> Anti TPO </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="neuroenolasa_especifica" ng-checked="neuroenolasa_especifica" name="neuroenolasa_especifica"> Neuroenolasa específica </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hcgb" ng-checked="hcgb" name="hcgb"> HCGB </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ca_15_3" ng-checked="ca_15_3" name="ca_15_3"> Ca 15 -3 </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ca_72_4" ng-checked="ca_72_4" name="ca_72_4"> Ca 72 -4 </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tiroglobulina" ng-checked="tiroglobulina" name="tiroglobulina"> Tiroglobulina </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#electrolitos">
                                ELECTROLITOS</a>
                            </h4>
                          </div>
                          <div id="electrolitos" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="sodio_e" ng-checked="sodio_e" name="sodio_e"> Sodio </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="potasio_e" ng-checked="potasio_e" name="potasio_e"> Potasio </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cloro_e" ng-checked="cloro_e" name="cloro_e"> Cloro </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="calcio_total" ng-checked="calcio_total" name="calcio_total"> Calcio total</label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="calcio_ionico" ng-checked="calcio_ionico" name="calcio_ionico"> Calcio iónico</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="magnesio_e" ng-checked="magnesio_e" name="magnesio_e"> Magnesio </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fosforo_e" ng-checked="fosforo_e" name="fosforo_e"> Fósforo </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cobre" ng-checked="cobre" name="cobre"> Cobre </label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="litio" ng-checked="litio" name="litio"> Litio </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="amonio" ng-checked="amonio" name="amonio"> Amonio </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="plomo" ng-checked="plomo" name="plomo"> Plomo </label>
                                </td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  Otros (Electrolitos): <textarea id="txtOtrosElectro" cols="50" rows="2" ng-model="txtOtrosElectro" name="txtOtrosElectro"></textarea>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#estudiosEspeciales">
                                ESTUDIOS ESPECIALES</a>
                            </h4>
                          </div>
                          <div id="estudiosEspeciales" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="espermatograma" ng-checked="espermatograma" name="espermatograma"> Espermatograma</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="estudio_calculo" ng-checked="estudio_calculo" name="estudio_calculo"> Estudio cálculo
                                </label></td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="citoquimico_lcr" ng-checked="citoquimico_lcr" name="citoquimico_lcr"> Citoquímico LCR </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="pap_test" ng-checked="pap_test" name="pap_test"> Pap -Test </label>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  Estudio Líquidos: <textarea id="txtEstLiq" cols="50" rows="2" ng-model="txtEstLiq" name="txtEstLiq"></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  Muestra de: <textarea id="txtMuestra" cols="50" rows="2" ng-model="txtMuestra" name="txtMuestra"></textarea>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#bacteriologia">
                                BACTERIOLOGÍA</a>
                            </h4>
                          </div>
                          <div id="bacteriologia" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cultivo_antibiograma" ng-checked="cultivo_antibiograma" name="cultivo_antibiograma"> Cultivo y antibiograma </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="gram" ng-checked="gram" name="gram"> Gram </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fresco" ng-checked="fresco" name="fresco"> Fresco </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="baar" ng-checked="baar" name="baar"> BAAR </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="investigacion_hongos_koh" ng-checked="investigacion_hongos_koh" name="investigacion_hongos_koh"> Investigacion de hongos (KOH) </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="control_tratamiento" ng-checked="control_tratamiento" name="control_tratamiento"> Control tratamiento </label>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  Días No: <textarea id="txtDiasNo" cols="50" rows="2" ng-model="txtDiasNo" name="txtDiasNo"></textarea>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#htaHipertension">
                                HTA. HIPERTENSIÓN</a>
                            </h4>
                          </div>
                          <div id="htaHipertension" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="bh" ng-checked="bh" name="bh"> BH.</label>

                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hdl" ng-checked="hdl" name="hdl"> HDL </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="urea" ng-checked="urea" name="urea"> Urea </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ldl" ng-checked="ldl" name="ldl"> LDL </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="glucosa" ng-checked="glucosa" name="glucosa"> Glucosa. </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="creatinina" ng-checked="creatinina" name="creatinina"> Creatinina </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tsh" ng-checked="tsh" name="tsh"> TSH </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="trigliceridos" ng-checked="trigliceridos" name="trigliceridos"> Triglicéridos </label>
                                </td>
                              </tr>

                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#estudiosHormonales">
                                ESTUDIOS HORMONALES</a>
                            </h4>
                          </div>
                          <div id="estudiosHormonales" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tsh_t3_ft3" ng-checked="tsh_t3_ft3" name="tsh_t3_ft3"> TSH..  T3..  FT3.. </label>

                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="t4_ft4" ng-checked="t4_ft4" name="t4_ft4"> T4 ..FT4... </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="lh" ng-checked="lh" name="lh"> LH </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fsh" ng-checked="fsh" name="fsh"> FSH </label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="prl" ng-checked="prl" name="prl"> PRL </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="e2" ng-checked="e2" name="e2"> E2 </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="p4" ng-checked="p4" name="p4"> P4 </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="igf1" ng-checked="igf1" name="igf1"> IGF1 </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="igbp3" ng-checked="igbp3" name="igbp3"> IGBP3 </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="pth" ng-checked="pth" name="pth"> PTH </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="estriol" ng-checked="estriol" name="estriol"> ESTRIOL </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="androstendiona" ng-checked="androstendiona" name="androstendiona"> ANDROSTENDIONA </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cortisol_am" ng-checked="cortisol_am" name="cortisol_am"> CORTISOL AM  </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cortisol_pm" ng-checked="cortisol_pm" name="cortisol_pm"> CORTISOL PM </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="acth" ng-checked="acth" name="acth"> ACTH </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="testosterona_total" ng-checked="testosterona_total" name="testosterona_total"> TESTOSTERONA TOTAL </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="testosterona_libre" ng-checked="testosterona_libre" name="testosterona_libre"> TESTOSTERONA LIBRE </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hcg_cuantitativa" ng-checked="hcg_cuantitativa" name="hcg_cuantitativa"> HCG CUANTITATIVA </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hormona_crecimiento_peptido_c" ng-checked="hormona_crecimiento_peptido_c" name="hormona_crecimiento_peptido_c"> HORMONA CRECIMIENTO PEPTIDO C </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ferritina" ng-checked="ferritina" name="ferritina"> FERRITINA </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="insulina_ayudas" ng-checked="insulina_ayudas" name="insulina_ayudas"> INSULINA AYUNAS </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="insulina_2_h" ng-checked="insulina_2_h" name="insulina_2_h"> INSULINA 2 H </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="peptido_c" ng-checked="peptido_c" name="peptido_c"> PEPTIDO C </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#perfilGeneral">
                                PERFIL GENERAL</a>
                            </h4>
                          </div>
                          <div id="perfilGeneral" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="perfil_general" ng-checked="perfil_general" name="perfil_general"> Biometría Hemática, EMO, Coproparasitario, glucosa, urea, creatinina, ac. único, colesterol trigliceridos, HDL, LDL, VDRL.
                                </label></td>

                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#drogas">
                                DROGAS</a>
                            </h4>
                          </div>
                          <div id="drogas" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cocaina" ng-checked="cocaina" name="cocaina"> Cocaína</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="marihuana" ng-checked="marihuana" name="marihuana"> Marihuana </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ac_valproico" ng-checked="ac_valproico" name="ac_valproico"> Ac valproico </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="carbamazepina" ng-checked="carbamazepina" name="carbamazepina"> Carbamazepina </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ciclosporina_basal" ng-checked="ciclosporina_basal" name="ciclosporina_basal"> Ciclosporina Basal
                                </label></td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="ciclosporina_2horas" ng-checked="ciclosporina_2horas" name="ciclosporina_2horas"> Ciclosporina 2horas </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="digoxina" ng-checked="digoxina" name="digoxina"> Digoxina
                                </label></td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="escopolamina" ng-checked="escopolamina" name="escopolamina"> Escopolamina </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fenitoina" ng-checked="fenitoina" name="fenitoina"> Fenitoína </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fenobarbital" ng-checked="fenobarbital" name="fenobarbital"> Fenobarbital </label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="teofilina" ng-checked="teofilina" name="teofilina"> Teofilina </label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="vancomicina" ng-checked="vancomicina" name="vancomicina"> Vancomicina </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#perfilDeDiabetes">
                                PERFIL DE DIABETES</a>
                            </h4>
                          </div>
                          <div id="perfilDeDiabetes" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="perfil_diabetes" ng-checked="perfil_diabetes" name="perfil_diabetes"> Biometría, glucosa, Hb glicosilada, fructosamina creatinina, acido úrico, colesterol, HDL, LDL, Triglicéridos, microalbuminuria, EMO.</label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#perfilHepatico">
                                PERFIL HEPÁTICO</a>
                            </h4>
                          </div>
                          <div id="perfilHepatico" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="pefil_hepatico" ng-checked="pefil_hepatico" name="pefil_hepatico">  Biometría, glucosa, colesterol, triglicéridos, proteínas, albúmina, bilirrubinas, TGO, TGP, GGT, fosfata alcalina, TP, TTP, Bilirrubina Totales y Parciales.  </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#perfilLipidico">
                                PERFIL LIPÍDICO</a>
                            </h4>
                          </div>
                          <div id="perfilLipidico" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="perfil_lipidico" ng-checked="perfil_lipidico" name="perfil_lipidico"> Líquidos totales, Colesterol, Triglicéridos, HDL, LDL, Apo A, Apo B, fibrinógeno.  </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#perfilReumatico">
                                PERFIL REUMÁTICO</a>
                            </h4>
                          </div>
                          <div id="perfilReumatico" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="perfil_reumatico" ng-checked="perfil_reumatico" name="perfil_reumatico"> BH, Glucosa, Creatinina, Asto, PCR, Latex </label>

                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#tiroiditis">
                                TIROIDITIS</a>
                            </h4>
                          </div>
                          <div id="tiroiditis" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tiroiditis" ng-checked="tiroiditis" name="tiroiditis">  Tiroiditis: Anti - Tiroglobulina, Anti - Peroxidasa, Tiroglobulina </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#prequirurgico">
                                PREQUIRÚRGICO</a>
                            </h4>
                          </div>
                          <div id="prequirurgico" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="prequirurgico" ng-checked="prequirurgico" name="prequirurgico"> Biometría Hemática, Urea, Glucosa, Creatinina, TP, TTP, EMO </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#pruebasInmunologicas">
                                PRUEBAS INMUNOLÓGICAS</a>
                            </h4>
                          </div>
                          <div id="pruebasInmunologicas" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="pruebas_inmunologicas" ng-checked="pruebas_inmunologicas" name="pruebas_inmunologicas"> ANA, ANCAS, ANTI - ANA, C3, C4 </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#hipotirodismo">
                                HIPOTIROIDISMO</a>
                            </h4>
                          </div>
                          <div id="hipotirodismo" class="panel-collapse collapse">
                            <table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="hipotiroidismo" ng-checked="hipotiroidismo" name="hipotiroidismo">  TSH, FT4, FT3. </label>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>

                      </div>

                    </div>
                    <div id="imagen3d" class="tab-pane fade">
                      <div id="tresd">
                        <table class="table table-bordered table-striped table-hover table-condensed">

                          <tbody><tr>
                            </tr></tbody></table><table>
                              <tbody><tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="copia_cefalica" ng-checked="copia_cefalica" name="copia_cefalica">COPIA CEFALICA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="copia_cefalometria" ng-checked="copia_cefalometria" name="copia_cefalometria">COPIA CEFALOMETRIA</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="panoramico_digital_shick" ng-checked="panoramico_digital_shick" name="panoramico_digital_shick">PANORAMICO DIGITAL SHICK</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cdrpank_schick_panoramico_digital" ng-checked="cdrpank_schick_panoramico_digital" name="cdrpank_schick_panoramico_digital">CDRPANK SCHICK PANORAMICO DIGITAL</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="schick_panoramico_digital" ng-checked="schick_panoramico_digital" name="schick_panoramico_digital">SCHICK PANORAMICO DIGITAL</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tomografia_dental_3d" ng-checked="tomografia_dental_3d" name="tomografia_dental_3d">TOMOGRAFIA DENTAL 3D</label>
                                </td>

                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tomografia_senos_nasales" ng-checked="tomografia_senos_nasales" name="tomografia_senos_nasales">TOMOGRAFIA DE SENOS NASALES</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="tomografia_atm" ng-checked="tomografia_atm" name="tomografia_atm">TOMOGRAFIA ATM</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="oclusal_superior" ng-checked="oclusal_superior" name="oclusal_superior">OCLUSAL SUPERIOR</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="oclusal_inferior" ng-checked="oclusal_inferior" name="oclusal_inferior">OCLUSAL INFERIOR</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="rx_panoramica" ng-checked="rx_panoramica" name="rx_panoramica">RX PANORAMICA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="rx_cefalica_perfil" ng-checked="rx_cefalica_perfil" name="rx_cefalica_perfil">RX CEFALICA \ PERFIL</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="cefalometria" ng-checked="cefalometria" name="cefalometria">CEFALOMETRIA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="modelos_ortodoncia" ng-checked="modelos_ortodoncia" name="modelos_ortodoncia">MODELOS ORTODONCIA</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="fotografia_ortodoncia" ng-checked="fotografia_ortodoncia" name="fotografia_ortodoncia">FOTOGRAFIA ORTODONCIA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="estudio_ortodoncia" ng-checked="estudio_ortodoncia" name="estudio_ortodoncia">ESTUDIO DE ORTODONCIA</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="copia_tomografia" ng-checked="copia_tomografia" name="copia_tomografia">COPIA TOMOGRAFIA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="informe_examen" ng-checked="informe_examen" name="informe_examen">INFORME DE EXAMEN</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="planificacion_implantes" ng-checked="planificacion_implantes" name="planificacion_implantes">PLANIFICACION DE IMPLANTES</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="copia_rx_panoramico" ng-checked="copia_rx_panoramico" name="copia_rx_panoramico">COPIA RX PANORAMICO</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="rx_anteroposterior_cara" ng-checked="rx_anteroposterior_cara" name="rx_anteroposterior_cara">RX ANTEROPOSTERIOR DE CARA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="rx_posteroanterior_cara" ng-checked="rx_posteroanterior_cara" name="rx_posteroanterior_cara">RX POSTEROANTERIOR DE CARA</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="rx_articulacion_tmp_mandibular_ba" ng-checked="rx_articulacion_tmp_mandibular_ba" name="rx_articulacion_tmp_mandibular_ba">RX DE ARTICULACION TMP. MANDIBULAR BOCA ABIERTA</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="rx_articulacion_tmp_mandibular_bc" ng-checked="rx_articulacion_tmp_mandibular_bc" name="rx_articulacion_tmp_mandibular_bc">RX DE ARTICULACION TMP. MANDIBULAR BOCA CERRADA</label>
                                </td>
                              </tr>

                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="informe_radiologico_simple" ng-checked="informe_radiologico_simple" name="informe_radiologico_simple">INFORME RADIOLOGICO SIMPLE</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="informe_radiologico_completo" ng-checked="informe_radiologico_completo" name="informe_radiologico_completo">INFORME RADIOLOGICO COMPLETO</label>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="servicios_varios" ng-checked="servicios_varios" name="servicios_varios">SERVICIOS VARIOS</label>
                                </td>
                                <td>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" class="chkExamenes" id="trazado_cefalometrico_sin_placa" ng-checked="trazado_cefalometrico_sin_placa" name="trazado_cefalometrico_sin_placa">TRAZADO CEFALOMETRICO SIN PLACA</label>
                                </td>
                              </tr>
                            </tbody></table>


                      </div>
                    </div>
                </div>




    		</form>

    	</div>
      <div class = "row">
        <div class = "col-md-2">
                    <div class = "form-group"><input class = "btn btn-success form-control" type = "button" style = "margin-left: 10px" value = "Guardar"ng-click = "toggle('{{$operation}}')">
          </div>
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

        $(document).ready(function() {

                /*$(document).on('mouseenter.collapse', '[data-toggle=collapse]', function(e) {
                    var $this = $(this),
                        href,
                        target = $this.attr('data-target')
                            || e.preventDefault()
                            || (href = $this.attr('href'))
                            && href.replace(/.*(?=#[^\s]+$)/, ''), //strip for ie7
                        option = $(target).hasClass('in') ? 'hide' : "show"

                    $('.panel-collapse').not(target).collapse("hide")
                    $(target).collapse(option);
                });*/
                $('#fecha').datepicker({

                   format: 'dd/mm/yyyy',
                   autoclose: true,
                   language: "es",

                }).trigger('blur');



        });
        $("#id_medico").select2();

        $("#id_paciente").select2();
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

      app.controller("controllerLaboratorio", function ($scope, $http, API_URL)
      {

        //Como inician los campos

        $scope.init = function ()
        {
          $scope.id_medico = "{{($operation == 'update')?$laboratorio->id_medico :''}}";
          if("{{$operation == 'update'}}"){
            $("#id_medico").val("{{$laboratorio->id_medico}}").trigger("change");
            $("#id_paciente").val("{{$laboratorio->id_paciente}}").trigger("change");
          }else{
            $("#id_medico").val("").trigger("change");
            $("#id_paciente").val("").trigger("change");
          }
          //document.getElementById("id_medico").value = "{{$laboratorio->id_medico}}";
          $scope.id_paciente = "{{($operation == 'update')?$laboratorio->id_paciente :''}}";
          $scope.fecha = "{{($operation == 'update')?$laboratorio->fecha :''}}";
          $scope.bio_h = "{{($operation == 'update')?$laboratorio->bio_h :''}}";
          $scope.hto_hb = "{{($operation == 'update')?$laboratorio->hto_hb :''}}";
          $scope.reticulocitos = "{{($operation == 'update')?$laboratorio->reticulocitos :''}}";
          $scope.sedimentacion_ves = "{{($operation == 'update')?$laboratorio->sedimentacion_ves :''}}";
          $scope.formula_leuco = "{{($operation == 'update')?$laboratorio->formula_leuco :''}}";
          $scope.plaquetas = "{{($operation == 'update')?$laboratorio->plaquetas :''}}";
          $scope.grupo_sanguineo = "{{($operation == 'update')?$laboratorio->grupo_sanguineo :''}}";
          $scope.elemental_microscopico = "{{($operation == 'update')?$laboratorio->elemental_microscopico :''}}";
          $scope.gota_fresca = "{{($operation == 'update')?$laboratorio->gota_fresca :''}}";
          $scope.gram_o = "{{($operation == 'update')?$laboratorio->gram_o :''}}";
          $scope.microalbuminuria = "{{($operation == 'update')?$laboratorio->microalbuminuria :''}}";
          $scope.proteinuria24 = "{{($operation == 'update')?$laboratorio->proteinuria24 :''}}";
          $scope.depuracion_creatinina = "{{($operation == 'update')?$laboratorio->depuracion_creatinina :''}}";
          $scope.sodio = "{{($operation == 'update')?$laboratorio->sodio :''}}";
          $scope.potasio = "{{($operation == 'update')?$laboratorio->potasio :''}}";
          $scope.cloro = "{{($operation == 'update')?$laboratorio->cloro :''}}";
          $scope.ac_urico = "{{($operation == 'update')?$laboratorio->ac_urico :''}}";
          $scope.calcio = "{{($operation == 'update')?$laboratorio->calcio :''}}";
          $scope.fosforo = "{{($operation == 'update')?$laboratorio->fosforo :''}}";
          $scope.magnesio = "{{($operation == 'update')?$laboratorio->magnesio :''}}";
          $scope.prueba_embarazo = "{{($operation == 'update')?$laboratorio->prueba_embarazo :''}}";
          $scope.panel_drogas = "{{($operation == 'update')?$laboratorio->panel_drogas :''}}";
          $scope.asto_cuantitativo = "{{($operation == 'update')?$laboratorio->asto_cuantitativo :''}}";
          $scope.pcr_cualitativo = "{{($operation == 'update')?$laboratorio->pcr_cualitativo :''}}";
          $scope.latex = "{{($operation == 'update')?$laboratorio->latex :''}}";
          $scope.vdrl = "{{($operation == 'update')?$laboratorio->vdrl :''}}";
          $scope.aglutinaciones_febriles = "{{($operation == 'update')?$laboratorio->aglutinaciones_febriles :''}}";
          $scope.helicobacter_pylori = "{{($operation == 'update')?$laboratorio->helicobacter_pylori :''}}";
          $scope.peptido_citrulinado = "{{($operation == 'update')?$laboratorio->peptido_citrulinado :''}}";
          $scope.anti_citrulina = "{{($operation == 'update')?$laboratorio->anti_citrulina :''}}";
          $scope.tp = "{{($operation == 'update')?$laboratorio->tp :''}}";
          $scope.ttp = "{{($operation == 'update')?$laboratorio->ttp :''}}";
          $scope.tiempo_trombina = "{{($operation == 'update')?$laboratorio->tiempo_trombina :''}}";
          $scope.inr = "{{($operation == 'update')?$laboratorio->inr :''}}";
          $scope.tiempo_coagulacion = "{{($operation == 'update')?$laboratorio->tiempo_coagulacion :''}}";
          $scope.fibrinogeno = "{{($operation == 'update')?$laboratorio->fibrinogeno :''}}";
          $scope.tiempo_hemorragia = "{{($operation == 'update')?$laboratorio->tiempo_hemorragia :''}}";
          $scope.antitrombina_iii = "{{($operation == 'update')?$laboratorio->antitrombina_iii :''}}";
          $scope.coombs_directo = "{{($operation == 'update')?$laboratorio->coombs_directo :''}}";
          $scope.coombs_indirecto = "{{($operation == 'update')?$laboratorio->coombs_indirecto :''}}";
          $scope.retraccion_coagulo = "{{($operation == 'update')?$laboratorio->retraccion_coagulo :''}}";
          $scope.anti_toxoplasma = "{{($operation == 'update')?$laboratorio->anti_toxoplasma :''}}";
          $scope.igg_anti_toxoplasma = "{{($operation == 'update')?$laboratorio->igg_anti_toxoplasma :''}}";
          $scope.igm_anti_toxoplasma = "{{($operation == 'update')?$laboratorio->igm_anti_toxoplasma :''}}";
          $scope.anti_rubeola = "{{($operation == 'update')?$laboratorio->anti_rubeola :''}}";
          $scope.igg_anti_rubeola = "{{($operation == 'update')?$laboratorio->igg_anti_rubeola :''}}";
          $scope.igm_anti_rubeola = "{{($operation == 'update')?$laboratorio->igm_anti_rubeola :''}}";
          $scope.anti_cmv = "{{($operation == 'update')?$laboratorio->anti_cmv :''}}";
          $scope.igg_anti_cmv = "{{($operation == 'update')?$laboratorio->igg_anti_cmv :''}}";
          $scope.igm_anti_cmv = "{{($operation == 'update')?$laboratorio->igm_anti_cmv :''}}";
          $scope.anti_herpes_i = "{{($operation == 'update')?$laboratorio->anti_herpes_i :''}}";
          $scope.igg_anti_herpes_i = "{{($operation == 'update')?$laboratorio->igg_anti_herpes_i :''}}";
          $scope.igm_anti_herpes_i = "{{($operation == 'update')?$laboratorio->igm_anti_herpes_i :''}}";
          $scope.anti_herpes_ii = "{{($operation == 'update')?$laboratorio->anti_herpes_ii :''}}";
          $scope.igg_anti_herpes_ii = "{{($operation == 'update')?$laboratorio->igg_anti_herpes_ii :''}}";
          $scope.igm_anti_herpes_ii = "{{($operation == 'update')?$laboratorio->igm_anti_herpes_ii :''}}";
          $scope.torch = "{{($operation == 'update')?$laboratorio->torch :''}}";
          $scope.igg_torch = "{{($operation == 'update')?$laboratorio->igg_torch :''}}";
          $scope.igm_torch = "{{($operation == 'update')?$laboratorio->igm_torch :''}}";
          $scope.c3 = "{{($operation == 'update')?$laboratorio->c3 :''}}";
          $scope.c4 = "{{($operation == 'update')?$laboratorio->c4 :''}}";
          $scope.igm = "{{($operation == 'update')?$laboratorio->igm :''}}";
          $scope.ige = "{{($operation == 'update')?$laboratorio->ige :''}}";
          $scope.iga = "{{($operation == 'update')?$laboratorio->iga :''}}";
          $scope.igd = "{{($operation == 'update')?$laboratorio->igd :''}}";
          $scope.igg = "{{($operation == 'update')?$laboratorio->igg :''}}";
          $scope.chlamidia = "{{($operation == 'update')?$laboratorio->chlamidia :''}}";
          $scope.igg_chlamidia = "{{($operation == 'update')?$laboratorio->igg_chlamidia :''}}";
          $scope.igm_chlamidia = "{{($operation == 'update')?$laboratorio->igm_chlamidia :''}}";
          $scope.iga_chlamidia = "{{($operation == 'update')?$laboratorio->iga_chlamidia :''}}";
          $scope.hepatitis_a = "{{($operation == 'update')?$laboratorio->hepatitis_a :''}}";
          $scope.igg_hepatitis_a = "{{($operation == 'update')?$laboratorio->igg_hepatitis_a :''}}";
          $scope.igm_hepatitis_a = "{{($operation == 'update')?$laboratorio->igm_hepatitis_a :''}}";
          $scope.hepatitis_b = "{{($operation == 'update')?$laboratorio->hepatitis_b :''}}";
          $scope.hbsag_hepatitis_b = "{{($operation == 'update')?$laboratorio->hbsag_hepatitis_b :''}}";
          $scope.anti_hbs_hepatitis_b = "{{($operation == 'update')?$laboratorio->anti_hbs_hepatitis_b :''}}";
          $scope.hbc_hepatitis_b = "{{($operation == 'update')?$laboratorio->hbc_hepatitis_b :''}}";
          $scope.igg_hepatitis_b = "{{($operation == 'update')?$laboratorio->igg_hepatitis_b :''}}";
          $scope.igm_hepatitis_b = "{{($operation == 'update')?$laboratorio->igm_hepatitis_b :''}}";
          $scope.hbeag_hepatitis_b = "{{($operation == 'update')?$laboratorio->hbeag_hepatitis_b :''}}";
          $scope.anti_hbe_hepatitis_b = "{{($operation == 'update')?$laboratorio->anti_hbe_hepatitis_b :''}}";
          $scope.hepatitis_c = "{{($operation == 'update')?$laboratorio->hepatitis_c :''}}";
          $scope.tuberculosis_suero = "{{($operation == 'update')?$laboratorio->tuberculosis_suero :''}}";
          $scope.ac_antinucleares = "{{($operation == 'update')?$laboratorio->ac_antinucleares :''}}";
          $scope.ac_anti_dna = "{{($operation == 'update')?$laboratorio->ac_anti_dna :''}}";
          $scope.celulas_le = "{{($operation == 'update')?$laboratorio->celulas_le :''}}";
          $scope.anticitrulina_anti_ccp = "{{($operation == 'update')?$laboratorio->anticitrulina_anti_ccp :''}}";
          $scope.ac_antimicrosomales = "{{($operation == 'update')?$laboratorio->ac_antimicrosomales :''}}";
          $scope.ac_antitiroglobulinas = "{{($operation == 'update')?$laboratorio->ac_antitiroglobulinas :''}}";
          $scope.ana_biot = "{{($operation == 'update')?$laboratorio->ana_biot :''}}";
          $scope.antifosfolipidos = "{{($operation == 'update')?$laboratorio->antifosfolipidos :''}}";
          $scope.autoinmunidad_igg  = "{{($operation == 'update')?$laboratorio->autoinmunidad_igg  :''}}";
          $scope.igm_antifosfolipidos = "{{($operation == 'update')?$laboratorio->igm_antifosfolipidos :''}}";
          $scope.anticardiolipinas = "{{($operation == 'update')?$laboratorio->anticardiolipinas :''}}";
          $scope.igg_anticardiolipinas = "{{($operation == 'update')?$laboratorio->igg_anticardiolipinas :''}}";
          $scope.igm_anticardiolipinas = "{{($operation == 'update')?$laboratorio->igm_anticardiolipinas :''}}";
          $scope.anti_b2gp1 = "{{($operation == 'update')?$laboratorio->anti_b2gp1 :''}}";
          $scope.ancas = "{{($operation == 'update')?$laboratorio->ancas :''}}";
          $scope.anti_mitocondriales = "{{($operation == 'update')?$laboratorio->anti_mitocondriales :''}}";
          $scope.quimica_sanguinea_glu_ayuna = "{{($operation == 'update')?$laboratorio->quimica_sanguinea_glu_ayuna :''}}";
          $scope.quimica_sanguinea_glu2h_post_p = "{{($operation == 'update')?$laboratorio->quimica_sanguinea_glu2h_post_p :''}}";
          $scope.curva_glucosa = "{{($operation == 'update')?$laboratorio->curva_glucosa :''}}";
          $scope.fructosamina = "{{($operation == 'update')?$laboratorio->fructosamina :''}}";
          $scope.urea_q = "{{($operation == 'update')?$laboratorio->urea_q :''}}";
          $scope.creatinina_q = "{{($operation == 'update')?$laboratorio->creatinina_q :''}}";
          $scope.bun = "{{($operation == 'update')?$laboratorio->bun :''}}";
          $scope.acido_urico = "{{($operation == 'update')?$laboratorio->acido_urico :''}}";
          $scope.colesterol = "{{($operation == 'update')?$laboratorio->colesterol :''}}";
          $scope.hdl_colesterol = "{{($operation == 'update')?$laboratorio->hdl_colesterol :''}}";
          $scope.ldl_colesterol = "{{($operation == 'update')?$laboratorio->ldl_colesterol :''}}";
          $scope.trigliceridos_q = "{{($operation == 'update')?$laboratorio->trigliceridos_q :''}}";
          $scope.apolipoproteina_a = "{{($operation == 'update')?$laboratorio->apolipoproteina_a :''}}";
          $scope.apolipoproteina_b = "{{($operation == 'update')?$laboratorio->apolipoproteina_b :''}}";
          $scope.vldl = "{{($operation == 'update')?$laboratorio->vldl :''}}";
          $scope.bilirrubinas_total = "{{($operation == 'update')?$laboratorio->bilirrubinas_total :''}}";
          $scope.proteinas_totales = "{{($operation == 'update')?$laboratorio->proteinas_totales :''}}";
          $scope.albumina = "{{($operation == 'update')?$laboratorio->albumina :''}}";
          $scope.globulina = "{{($operation == 'update')?$laboratorio->globulina :''}}";
          $scope.hb_glicosilada = "{{($operation == 'update')?$laboratorio->hb_glicosilada :''}}";
          $scope.hierro_serico = "{{($operation == 'update')?$laboratorio->hierro_serico :''}}";
          $scope.hierro_captacion_fijacion = "{{($operation == 'update')?$laboratorio->hierro_captacion_fijacion :''}}";
          $scope.vit_b12 = "{{($operation == 'update')?$laboratorio->vit_b12 :''}}";
          $scope.transferrina = "{{($operation == 'update')?$laboratorio->transferrina :''}}";
          $scope.ferritina_q = "{{($operation == 'update')?$laboratorio->ferritina_q :''}}";
          $scope.ac_folico = "{{($operation == 'update')?$laboratorio->ac_folico :''}}";
          $scope.ins_saturacion = "{{($operation == 'update')?$laboratorio->ins_saturacion :''}}";
          $scope.quimica_sanguinea_tgo_ast = "{{($operation == 'update')?$laboratorio->quimica_sanguinea_tgo_ast :''}}";
          $scope.tgp_alt = "{{($operation == 'update')?$laboratorio->tgp_alt :''}}";
          $scope.cpk = "{{($operation == 'update')?$laboratorio->cpk :''}}";
          $scope.cpk_mb = "{{($operation == 'update')?$laboratorio->cpk_mb :''}}";
          $scope.quimica_sanguinea_gamma_gt = "{{($operation == 'update')?$laboratorio->quimica_sanguinea_gamma_gt :''}}";
          $scope.troponina = "{{($operation == 'update')?$laboratorio->troponina :''}}";
          $scope.quimica_sanguinea_fosfatasa_alcalina = "{{($operation == 'update')?$laboratorio->quimica_sanguinea_fosfatasa_alcalina :''}}";
          $scope.aldolasa = "{{($operation == 'update')?$laboratorio->aldolasa :''}}";
          $scope.fosfatasa_acida = "{{($operation == 'update')?$laboratorio->fosfatasa_acida :''}}";
          $scope.fost_ac_prostatica = "{{($operation == 'update')?$laboratorio->fost_ac_prostatica :''}}";
          $scope.amilasa = "{{($operation == 'update')?$laboratorio->amilasa :''}}";
          $scope.lipasa = "{{($operation == 'update')?$laboratorio->lipasa :''}}";
          $scope.glucosa_6_fosfato_dh = "{{($operation == 'update')?$laboratorio->glucosa_6_fosfato_dh :''}}";
          $scope.deshidrogenasa_lactica = "{{($operation == 'update')?$laboratorio->deshidrogenasa_lactica :''}}";
          $scope.colinesterasa = "{{($operation == 'update')?$laboratorio->colinesterasa :''}}";
          $scope.acido_lactico = "{{($operation == 'update')?$laboratorio->acido_lactico :''}}";
          $scope.osmolaridad_serica = "{{($operation == 'update')?$laboratorio->osmolaridad_serica :''}}";
          $scope.coproparasitario_rutina = "{{($operation == 'update')?$laboratorio->coproparasitario_rutina :''}}";
          $scope.coproparasitario_seriado = "{{($operation == 'update')?$laboratorio->coproparasitario_seriado :''}}";
          $scope.inv_polimorfonucleares = "{{($operation == 'update')?$laboratorio->inv_polimorfonucleares :''}}";
          $scope.sangre_oculta = "{{($operation == 'update')?$laboratorio->sangre_oculta :''}}";
          $scope.rotavirus = "{{($operation == 'update')?$laboratorio->rotavirus :''}}";
          $scope.ph = "{{($operation == 'update')?$laboratorio->ph :''}}";
          $scope.concentracion = "{{($operation == 'update')?$laboratorio->concentracion :''}}";
          $scope.andenovirus = "{{($operation == 'update')?$laboratorio->andenovirus :''}}";
          $scope.sudan_iii = "{{($operation == 'update')?$laboratorio->sudan_iii :''}}";
          $scope.coprologico = "{{($operation == 'update')?$laboratorio->coprologico :''}}";
          $scope.cea_carcino_embrionario = "{{($operation == 'update')?$laboratorio->cea_carcino_embrionario :''}}";
          $scope.afp_alfa_feto_proteina = "{{($operation == 'update')?$laboratorio->afp_alfa_feto_proteina :''}}";
          $scope.psa_antigeno_prostatico_especifico = "{{($operation == 'update')?$laboratorio->psa_antigeno_prostatico_especifico :''}}";
          $scope.psa_libre = "{{($operation == 'update')?$laboratorio->psa_libre :''}}";
          $scope.ca_125 = "{{($operation == 'update')?$laboratorio->ca_125 :''}}";
          $scope.ca_19_9 = "{{($operation == 'update')?$laboratorio->ca_19_9 :''}}";
          $scope.anti_tpo = "{{($operation == 'update')?$laboratorio->anti_tpo :''}}";
          $scope.neuroenolasa_especifica = "{{($operation == 'update')?$laboratorio->neuroenolasa_especifica :''}}";
          $scope.hcgb = "{{($operation == 'update')?$laboratorio->hcgb :''}}";
          $scope.ca_15_3 = "{{($operation == 'update')?$laboratorio->ca_15_3 :''}}";
          $scope.ca_72_4 = "{{($operation == 'update')?$laboratorio->ca_72_4 :''}}";
          $scope.tiroglobulina = "{{($operation == 'update')?$laboratorio->tiroglobulina :''}}";
          $scope.sodio_e = "{{($operation == 'update')?$laboratorio->sodio_e :''}}";
          $scope.potasio_e = "{{($operation == 'update')?$laboratorio->potasio_e :''}}";
          $scope.cloro_e = "{{($operation == 'update')?$laboratorio->cloro_e :''}}";
          $scope.calcio_total = "{{($operation == 'update')?$laboratorio->calcio_total :''}}";
          $scope.calcio_ionico = "{{($operation == 'update')?$laboratorio->calcio_ionico :''}}";
          $scope.magnesio_e = "{{($operation == 'update')?$laboratorio->magnesio_e :''}}";
          $scope.fosforo_e = "{{($operation == 'update')?$laboratorio->fosforo_e :''}}";
          $scope.cobre = "{{($operation == 'update')?$laboratorio->cobre :''}}";
          $scope.litio = "{{($operation == 'update')?$laboratorio->litio :''}}";
          $scope.amonio = "{{($operation == 'update')?$laboratorio->amonio :''}}";
          $scope.plomo = "{{($operation == 'update')?$laboratorio->plomo :''}}";
          $scope.espermatograma = "{{($operation == 'update')?$laboratorio->espermatograma :''}}";
          $scope.estudio_calculo = "{{($operation == 'update')?$laboratorio->estudio_calculo :''}}";
          $scope.citoquimico_lcr = "{{($operation == 'update')?$laboratorio->citoquimico_lcr :''}}";
          $scope.pap_test = "{{($operation == 'update')?$laboratorio->pap_test :''}}";
          $scope.cultivo_antibiograma = "{{($operation == 'update')?$laboratorio->cultivo_antibiograma :''}}";
          $scope.gram = "{{($operation == 'update')?$laboratorio->gram :''}}";
          $scope.fresco = "{{($operation == 'update')?$laboratorio->fresco :''}}";
          $scope.baar = "{{($operation == 'update')?$laboratorio->baar :''}}";
          $scope.investigacion_hongos_koh = "{{($operation == 'update')?$laboratorio->investigacion_hongos_koh :''}}";
          $scope.control_tratamiento = "{{($operation == 'update')?$laboratorio->control_tratamiento :''}}";
          $scope.bh = "{{($operation == 'update')?$laboratorio->bh :''}}";
          $scope.hdl = "{{($operation == 'update')?$laboratorio->hdl :''}}";
          $scope.urea = "{{($operation == 'update')?$laboratorio->urea :''}}";
          $scope.ldl = "{{($operation == 'update')?$laboratorio->ldl :''}}";
          $scope.glucosa = "{{($operation == 'update')?$laboratorio->glucosa :''}}";
          $scope.creatinina = "{{($operation == 'update')?$laboratorio->creatinina :''}}";
          $scope.tsh = "{{($operation == 'update')?$laboratorio->tsh :''}}";
          $scope.trigliceridos = "{{($operation == 'update')?$laboratorio->trigliceridos :''}}";
          $scope.tsh_t3_ft3 = "{{($operation == 'update')?$laboratorio->tsh_t3_ft3 :''}}";
          $scope.t4_ft4 = "{{($operation == 'update')?$laboratorio->t4_ft4 :''}}";
          $scope.lh = "{{($operation == 'update')?$laboratorio->lh :''}}";
          $scope.fsh = "{{($operation == 'update')?$laboratorio->fsh :''}}";
          $scope.prl = "{{($operation == 'update')?$laboratorio->prl :''}}";
          $scope.e2 = "{{($operation == 'update')?$laboratorio->e2 :''}}";
          $scope.p4 = "{{($operation == 'update')?$laboratorio->p4 :''}}";
          $scope.igf1 = "{{($operation == 'update')?$laboratorio->igf1 :''}}";
          $scope.igbp3 = "{{($operation == 'update')?$laboratorio->igbp3 :''}}";
          $scope.pth = "{{($operation == 'update')?$laboratorio->pth :''}}";
          $scope.estriol = "{{($operation == 'update')?$laboratorio->estriol :''}}";
          $scope.androstendiona = "{{($operation == 'update')?$laboratorio->androstendiona :''}}";
          $scope.cortisol_am = "{{($operation == 'update')?$laboratorio->cortisol_am :''}}";
          $scope.cortisol_pm = "{{($operation == 'update')?$laboratorio->cortisol_pm :''}}";
          $scope.acth = "{{($operation == 'update')?$laboratorio->acth :''}}";
          $scope.testosterona_total = "{{($operation == 'update')?$laboratorio->testosterona_total :''}}";
          $scope.testosterona_libre = "{{($operation == 'update')?$laboratorio->testosterona_libre :''}}";
          $scope.hcg_cuantitativa = "{{($operation == 'update')?$laboratorio->hcg_cuantitativa :''}}";
          $scope.hormona_crecimiento_peptido_c = "{{($operation == 'update')?$laboratorio->hormona_crecimiento_peptido_c :''}}";
          $scope.ferritina = "{{($operation == 'update')?$laboratorio->ferritina :''}}";
          $scope.insulina_ayudas = "{{($operation == 'update')?$laboratorio->insulina_ayudas :''}}";
          $scope.insulina_2_h = "{{($operation == 'update')?$laboratorio->insulina_2_h :''}}";
          $scope.peptido_c = "{{($operation == 'update')?$laboratorio->peptido_c :''}}";
          $scope.perfil_general = "{{($operation == 'update')?$laboratorio->perfil_general :''}}";
          $scope.cocaina = "{{($operation == 'update')?$laboratorio->cocaina :''}}";
          $scope.marihuana = "{{($operation == 'update')?$laboratorio->marihuana :''}}";
          $scope.ac_valproico = "{{($operation == 'update')?$laboratorio->ac_valproico :''}}";
          $scope.carbamazepina = "{{($operation == 'update')?$laboratorio->carbamazepina :''}}";
          $scope.ciclosporina_basal = "{{($operation == 'update')?$laboratorio->ciclosporina_basal :''}}";
          $scope.ciclosporina_2horas = "{{($operation == 'update')?$laboratorio->ciclosporina_2horas :''}}";
          $scope.digoxina = "{{($operation == 'update')?$laboratorio->digoxina :''}}";
          $scope.escopolamina = "{{($operation == 'update')?$laboratorio->escopolamina :''}}";
          $scope.fenitoina = "{{($operation == 'update')?$laboratorio->fenitoina :''}}";
          $scope.fenobarbital = "{{($operation == 'update')?$laboratorio->fenobarbital :''}}";
          $scope.teofilina = "{{($operation == 'update')?$laboratorio->teofilina :''}}";
          $scope.vancomicina = "{{($operation == 'update')?$laboratorio->vancomicina :''}}";
          $scope.perfil_diabetes = "{{($operation == 'update')?$laboratorio->perfil_diabetes :''}}";
          $scope.pefil_hepatico = "{{($operation == 'update')?$laboratorio->pefil_hepatico :''}}";
          $scope.perfil_lipidico = "{{($operation == 'update')?$laboratorio->perfil_lipidico :''}}";
          $scope.perfil_reumatico = "{{($operation == 'update')?$laboratorio->perfil_reumatico :''}}";
          $scope.tiroiditis = "{{($operation == 'update')?$laboratorio->tiroiditis :''}}";
          $scope.prequirurgico = "{{($operation == 'update')?$laboratorio->prequirurgico :''}}";
          $scope.pruebas_inmunologicas = "{{($operation == 'update')?$laboratorio->pruebas_inmunologicas :''}}";
          $scope.hipotiroidismo = "{{($operation == 'update')?$laboratorio->hipotiroidismo :''}}";
          $scope.copia_cefalica = "{{($operation == 'update')?$laboratorio->copia_cefalica :''}}";
          $scope.copia_cefalometria = "{{($operation == 'update')?$laboratorio->copia_cefalometria :''}}";
          $scope.panoramico_digital_shick = "{{($operation == 'update')?$laboratorio->panoramico_digital_shick :''}}";
          $scope.cdrpank_schick_panoramico_digital = "{{($operation == 'update')?$laboratorio->cdrpank_schick_panoramico_digital :''}}";
          $scope.schick_panoramico_digital = "{{($operation == 'update')?$laboratorio->schick_panoramico_digital :''}}";
          $scope.tomografia_dental_3d = "{{($operation == 'update')?$laboratorio->tomografia_dental_3d :''}}";
          $scope.tomografia_senos_nasales = "{{($operation == 'update')?$laboratorio->tomografia_senos_nasales :''}}";
          $scope.tomografia_atm = "{{($operation == 'update')?$laboratorio->tomografia_atm :''}}";
          $scope.oclusal_superior = "{{($operation == 'update')?$laboratorio->oclusal_superior :''}}";
          $scope.oclusal_inferior = "{{($operation == 'update')?$laboratorio->oclusal_inferior :''}}";
          $scope.rx_panoramica = "{{($operation == 'update')?$laboratorio->rx_panoramica :''}}";
          $scope.rx_cefalica_perfil = "{{($operation == 'update')?$laboratorio->rx_cefalica_perfil :''}}";
          $scope.cefalometria = "{{($operation == 'update')?$laboratorio->cefalometria :''}}";
          $scope.modelos_ortodoncia = "{{($operation == 'update')?$laboratorio->modelos_ortodoncia :''}}";
          $scope.fotografia_ortodoncia = "{{($operation == 'update')?$laboratorio->fotografia_ortodoncia :''}}";
          $scope.estudio_ortodoncia = "{{($operation == 'update')?$laboratorio->estudio_ortodoncia :''}}";
          $scope.copia_tomografia = "{{($operation == 'update')?$laboratorio->copia_tomografia :''}}";
          $scope.informe_examen = "{{($operation == 'update')?$laboratorio->informe_examen :''}}";
          $scope.planificacion_implantes = "{{($operation == 'update')?$laboratorio->planificacion_implantes :''}}";
          $scope.copia_rx_panoramico = "{{($operation == 'update')?$laboratorio->copia_rx_panoramico :''}}";
          $scope.rx_anteroposterior_cara = "{{($operation == 'update')?$laboratorio->rx_anteroposterior_cara :''}}";
          $scope.rx_posteroanterior_cara = "{{($operation == 'update')?$laboratorio->rx_posteroanterior_cara :''}}";
          $scope.rx_articulacion_tmp_mandibular_ba = "{{($operation == 'update')?$laboratorio->rx_articulacion_tmp_mandibular_ba :''}}";
          $scope.rx_articulacion_tmp_mandibular_bc = "{{($operation == 'update')?$laboratorio->rx_articulacion_tmp_mandibular_bc :''}}";
          $scope.informe_radiologico_simple = "{{($operation == 'update')?$laboratorio->informe_radiologico_simple :''}}";
          $scope.informe_radiologico_completo = "{{($operation == 'update')?$laboratorio->informe_radiologico_completo :''}}";
          $scope.servicios_varios = "{{($operation == 'update')?$laboratorio->servicios_varios :''}}";
          $scope.trazado_cefalometrico_sin_placa = "{{($operation == 'update')?$laboratorio->trazado_cefalometrico_sin_placa :''}}";
          $scope.txt_otros_orina = "{{($operation == 'update')?$laboratorio->txt_otros_orina :''}}";
          $scope.txtOtrosElectro = "{{($operation == 'update')?$laboratorio->txtOtrosElectro :''}}";
          $scope.txtEstLiq = "{{($operation == 'update')?$laboratorio->txtEstLiq :''}}";
          $scope.txtMuestra = "{{($operation == 'update')?$laboratorio->txtMuestra :''}}";
          $scope.txtDiasNo = "{{($operation == 'update')?$laboratorio->txtDiasNo :''}}";
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
              console.log($scope.serializeObject($("#form_laboratorio")));
              $http({
                url    : API_URL + 'laboratorio/custom_laboratorio',
                method : 'POST',
                params : $scope.serializeObject($("#form_laboratorio")),
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
                    window.location = "{{ url('/admin/laboratorio?m=26') }}";
                  });
                } else {
                  swal("Error", "¡No se guardó!", "error");
                }
              });

              break;

            case 'update':

              $(".modal").modal('show');

              $http({
                url    : API_URL + 'laboratorio/custom_laboratorio/{{$laboratorio->id}}',
                method : 'PUT',
                params : $scope.serializeObject($("#form_laboratorio")),
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
                    window.location = "{{ url('/admin/laboratorio?m=26') }}";
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
<!--script src="{{ asset ('js/laboratorio/app.js') }}"></script>
<script src="{{ asset ('js/laboratorio/directive.js') }}"></script>
<script src="{{ asset ('js/laboratorio/controller.js') }}"></script-->

@endsection
