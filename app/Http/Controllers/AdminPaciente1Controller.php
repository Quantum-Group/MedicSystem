<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;

class AdminPaciente1Controller extends \crocodicstudio\crudbooster\controllers\CBController
{

  public function cbInit()
  {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
   $this->title_field = "id";
   $this->limit = "20";
   $this->orderby = "id,desc";
   $this->global_privilege = false;
   $this->button_table_action = true;
   $this->button_action_style = "button_icon";
   $this->button_add = true;
   $this->button_edit = true;
   $this->button_delete = true;
   $this->button_detail = true;
   $this->button_show = true;
   $this->button_filter = true;
   $this->button_import = false;
   $this->button_export = false;
   $this->table = "paciente";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
   $this->col = [];
   $this->col[] = ["label"=>"Cedula","name"=>"cedula"];
   $this->col[] = ["label"=>"Nombre","name"=>"nombre"];
   $this->col[] = ["label"=>"Apellido","name"=>"apellido"];
   $this->col[] = ["label"=>"Email","name"=>"email"];
   $this->col[] = ["label"=>"Pasaporte","name"=>"pasaporte"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'style' => NULL,
  'help' => '10 Dígitos (Ej: 1721345576)',
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cédula',
  'name' => 'cedula',
  'type' => 'text',
  'validation' => 'required|min:10',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Nombre',
  'name' => 'nombre',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Apellido',
  'name' => 'apellido',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => 'Por favor, introduce una dirección de correo electrnico válida',
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Email',
  'name' => 'email',
  'type' => 'email',
  'validation' => 'required|min:3|max:255|email|unique:paciente',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Pasaporte',
  'name' => 'pasaporte',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Otro',
  'name' => 'otro',
  'type' => 'textarea',
  'validation' => 'string|min:5|max:5000',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Num Historia',
  'name' => 'num_historia',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => 'Formato: (año-mes-dia) aaaa-mm-dd',
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Fecha Nacimiento',
  'name' => 'fecha_nac',
  'type' => 'date',
  'validation' => 'date',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Lugar Nacimiento',
  'name' => 'lugar_nac',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Lugar Residencia',
  'name' => 'lugar_resid',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => 'MASCULINO;FEMENINO',
  'datatable' => NULL,
  'dataquery' => NULL,
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'parent_select' => NULL,
  'label' => 'Sexo',
  'name' => 'sexo',
  'type' => 'select',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => 'SOLTERO;CASADO;DIVORCIADO;VIUDO;UNION LIBRE',
  'datatable' => NULL,
  'dataquery' => NULL,
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'parent_select' => NULL,
  'label' => 'Estado Civil',
  'name' => 'estado_civil',
  'type' => 'select',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => 'PRIMARIA;SECUNDARIA;SUPERIOR',
  'datatable' => NULL,
  'dataquery' => NULL,
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'parent_select' => NULL,
  'label' => 'Instrucción',
  'name' => 'instruccion',
  'type' => 'select',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Dirección',
  'name' => 'direccion',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Telf. Domicilio',
  'name' => 'telf_domicilio',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Telf. Trabajo',
  'name' => 'telf_trabajo',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Celular',
  'name' => 'celular',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Referencia',
  'name' => 'referencia',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Telf Referencia',
  'name' => 'telf_referencia',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			# END FORM DO NOT REMOVE THIS LINE

			/*
| ----------------------------------------------------------------------
| Sub Module
| ----------------------------------------------------------------------
| @label          = Label of action
| @path           = Path of sub module
| @button_color   = Bootstrap Class (primary,success,warning,danger)
| @button_icon    = Font Awesome Class
| @parent_columns = Sparate with comma, e.g : name,created_at
|
*/
$this->sub_module = array();


        /*
        | ----------------------------------------------------------------------
        | Add More Action Button / Menu
        | ----------------------------------------------------------------------
        | @label       = Label of action
        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
        | @icon        = Font awesome class icon. e.g : fa fa-bars
        | @color 	   = Default is primary. (primary, warning, succecss, info)
        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
        |
        */
        $this->addaction = array();


        /*
        | ----------------------------------------------------------------------
        | Add More Button Selected
        | ----------------------------------------------------------------------
        | @label       = Label of action
        | @icon 	   = Icon from fontawesome
        | @name 	   = Name of button
        | Then about the action, you should code at actionButtonSelected method
        |
        */
        $this->button_selected = array();


        /*
        | ----------------------------------------------------------------------
        | Add alert message to this module at overheader
        | ----------------------------------------------------------------------
        | @message = Text of message
        | @type    = warning,success,danger,info
        |
        */
        $this->alert = array();


        /*
        | ----------------------------------------------------------------------
        | Add more button to header button
        | ----------------------------------------------------------------------
        | @label = Name of button
        | @url   = URL Target
        | @icon  = Icon from Awesome.
        |
        */
        $this->index_button = array();


        /*
        | ----------------------------------------------------------------------
        | Customize Table Row Color
        | ----------------------------------------------------------------------
        | @condition = If condition. You may use field alias. E.g : [id] == 1
        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.
        |
        */
        $this->table_row_color = array();


        /*
        | ----------------------------------------------------------------------
        | You may use this bellow array to add statistic at dashboard
        | ----------------------------------------------------------------------
        | @label, @count, @icon, @color
        |
        */
        $this->index_statistic = array();


        /*
        | ----------------------------------------------------------------------
        | Add javascript at body
        | ----------------------------------------------------------------------
        | javascript code in the variable
        | $this->script_js = "function() { ... }";
        |
        */
        $this->script_js = "
        $(function() {
          $('.datepicker').datepicker({
            language:'es',
            format: 'yyyy-mm-dd',
            autoclose:true
          });
          $('#cedula').inputmask('9999999999');
          $('#cedula').attr('pattern','[0-9]{10}');
     // corregir error de doble calendario
          $('input:text').attr('readonly',false);
        //$('.datepicker').inputmask({'alias':'dd/mm/yyyy'});
        });
        ";

        /*
        | ----------------------------------------------------------------------
        | Include Javascript File
        | ----------------------------------------------------------------------
        | URL of your javascript each array
        | $this->load_js[] = asset("myfile.js");
        |
        */
        $this->load_js = array();
      }


    /*
    | ----------------------------------------------------------------------
    | Hook for button selected
    | ----------------------------------------------------------------------
    | @id_selected = the id selected
    | @button_name = the name of button
    |
    */
    public function actionButtonSelected($id_selected, $button_name)
    {
        //Your code here

    }


    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate query of index result
    | ----------------------------------------------------------------------
    | @query = current sql query
    |
    */
    public function hook_query_index(&$query)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate row of index table html
    | ----------------------------------------------------------------------
    |
    */
    public function hook_row_index($column_index, &$column_value)
    {
        //Your code here
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before add data is execute
    | ----------------------------------------------------------------------
    | @arr
    |
    */
    public function hook_before_add(&$postdata)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after add public static function called
    | ----------------------------------------------------------------------
    | @id = last insert id
    |
    */
    public function hook_after_add($id)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before update data is execute
    | ----------------------------------------------------------------------
    | @postdata = input post data
    | @id       = current id
    |
    */
    public function hook_before_edit(&$postdata, $id)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after edit public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_after_edit($id)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command before delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_before_delete($id)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_after_delete($id)
    {
        //Your code here
    }

    //By the way, you can still create your own method in here... :)


  }