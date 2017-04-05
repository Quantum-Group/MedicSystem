<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <style>
    @page { margin-top: 170px;margin-bottom: 170px; margin-right:20px;}
    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px;text-align: left; padding-top: 20px;}
    #footer { position: fixed; left: 0px; border-top: 1px solid; padding-top: 10px;bottom: -160px; right: 0px; height: 90px;  }
    #footer .page:after { content: counter(page, upper-roman); }
    #page_break{page-break-before: always;}
    #content{height:auto;width: 100%;}
    #pr{ width:auto; height: 80px;}
    #pr #izq{ float:left; width:50%; }
    #pr #der{ float:left; padding-left: 50px; height: 60px; width: 45%; }
    .table{margin-top: 10px;}
    .paciente #izq{float:left; width:70%; top: 0px;width: 50%;}
    .paciente #der{float:left; padding-left: 30px; height: 70px; width: 50%; }
    .doctor #izq{float:left; width:60%; text-align: center;padding-top: 10px;}
    .doctor #der{float:left; padding-left: 5px; height: 80px; width: 40%; }
    .paciente{ width:auto; height: 70px; margin-top: 5px; margin-bottom: 5px;padding-bottom: 5px;font-size: 12px; }
    .doctor{ width:auto; height: 100px; font-size: 12px;}

  </style>

</head>
<body>


  <div id="header ">
    <div id="pr">
      <div id="izq" >
        <img  height="80px" width="250px" src="img/optamed.png" alt="">

      </div>

      <div id="der" >

        <h4 style="display: inline;">PEDIDO DE EXÁMENES</h4>
        <h4 style="display: inline;">N°{{$examenes[0]->nro_orden}}</h4>

      </div>
    </div>
    <div class="paciente">
      <div id="izq" >
        <p>Nombre: <b>{{$examenes[0]->paciente}}</b></p>
  		  <p>Fecha de Nacimiento: <b>{{$examenes[0]->nacimiento}}</b></p>
  		  <p>Empresa: <b>Almagro C.A.</b></p>
      </div>

      <div id="der" >

        <p>Edad: <b>{{$examenes[0]->edad}}</b></p>
        <p>Teléfono: <b>{{$examenes[0]->telefono}}</b></p>
        <p>C.I.: <b>{{$examenes[0]->ci}}</b></p>

      </div>
    </div>

  </div>

  <div id="footer">
    <div class="doctor">
      <div id="izq" >
        <p>FIRMA:..........................................................................<br>
  		   {{$examenes[0]->medico}}.<br>
         Teléfono: {{$examenes[0]->telefonom}}</p>
      </div>

      <div id="der" >

        <p>Dirección: Av.República E3-33 entre Rumipamba y Azuay.<br>
         Teléfono: 0991376791.<br>
        E-mail: info@oftamed.com.ec</p>

      </div>
    </div>

  </div>

  <div id="content">
    <?php $i = 0; ?>

      @foreach($tipos as $tipo)
        @if($i==1)
          <table id="page_break" class="table table-borderless" >
        @else
          <table class="table table-borderless" >
        @endif
          <tbody>
            @foreach($examenes as $examen)
            @if($examen->tipo_id == $tipo->tipo_id)
            <tr>
              <td style="background-color: #fff" >
                {{$examen->categoria}}:
                <div style="background-color: #f9f9f9">
                    <p>  {{$examen->lista}}<br>
                </div>
  						</td>
  					</tr>
            @endif
            @endforeach
          </tbody>
        </table>
        <?php $i = 1; ?>
      @endforeach

  </div>
  </div>
  </div>
</body>
</html>
