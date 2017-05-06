<?php namespace App\Http\Controllers;

	use Session;
	use Illuminate\Http\Request;
	use CRUDBooster;
	use App\ModMedico;
	use Illuminate\Support\Facades\DB;
	use App\ModPaciente;
	use App\ModAnamnesisHospitalizacion;
	use Carbon\Carbon;

	class AdminAnamnesisHospitalizacionController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

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
			$this->table = "anamnesis_hospitalizacion";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Medico","name"=>"id_medico","join"=>"medico,id"];
			$this->col[] = ["label"=>"Paciente","name"=>"id_paciente","join"=>"paciente,id"];
			$this->col[] = ["label"=>"MotivoConsA","name"=>"MotivoConsA"];
			$this->col[] = ["label"=>"MotivoConsC","name"=>"MotivoConsC"];
			$this->col[] = ["label"=>"MotivoConsB","name"=>"MotivoConsB"];
			$this->col[] = ["label"=>"MotivoConsD","name"=>"MotivoConsD"];
			$this->col[] = ["label"=>"Cb Vacunas","name"=>"cb_vacunas"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'medico,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Medico',
  'name' => 'id_medico',
  'type' => 'select2',
  'validation' => 'required|integer|min:0',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'paciente,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Paciente',
  'name' => 'id_paciente',
  'type' => 'select2',
  'validation' => 'required|integer|min:0',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'MotivoConsA',
  'name' => 'MotivoConsA',
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
  'label' => 'MotivoConsC',
  'name' => 'MotivoConsC',
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
  'label' => 'MotivoConsB',
  'name' => 'MotivoConsB',
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
  'label' => 'MotivoConsD',
  'name' => 'MotivoConsD',
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
  'label' => 'Cb Vacunas',
  'name' => 'cb_vacunas',
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
  'label' => 'Cb Alergica',
  'name' => 'cb_alergica',
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
  'label' => 'Cb Neurologica',
  'name' => 'cb_neurologica',
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
  'label' => 'Cb Traumatologica',
  'name' => 'cb_traumatologica',
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
  'label' => 'Cb Tendsexual',
  'name' => 'cb_tendsexual',
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
  'label' => 'Cb Actsexual',
  'name' => 'cb_actsexual',
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
  'label' => 'Cb Perinatal',
  'name' => 'cb_perinatal',
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
  'label' => 'Cb Cardiaca',
  'name' => 'cb_cardiaca',
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
  'label' => 'Cb Metabolica',
  'name' => 'cb_metabolica',
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
  'label' => 'Cb Quirurgica',
  'name' => 'cb_quirurgica',
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
  'label' => 'Cb Riesgosocial',
  'name' => 'cb_riesgosocial',
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
  'label' => 'Cb Dietahabitos',
  'name' => 'cb_dietahabitos',
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
  'label' => 'Cb Infancia',
  'name' => 'cb_infancia',
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
  'label' => 'Cb Respiratoria',
  'name' => 'cb_respiratoria',
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
  'label' => 'Cb Hemolinf',
  'name' => 'cb_hemolinf',
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
  'label' => 'Cb Mental',
  'name' => 'cb_mental',
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
  'label' => 'Cb Riesgolaboral',
  'name' => 'cb_riesgolaboral',
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
  'label' => 'Cb Religioncultura',
  'name' => 'cb_religioncultura',
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
  'label' => 'Cb Adolecente',
  'name' => 'cb_adolecente',
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
  'label' => 'Cb Digestiva',
  'name' => 'cb_digestiva',
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
  'label' => 'Cb Urinaria',
  'name' => 'cb_urinaria',
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
  'label' => 'Cb Tsexual',
  'name' => 'cb_tsexual',
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
  'label' => 'Cb Riesgofamiliar',
  'name' => 'cb_riesgofamiliar',
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
  'label' => 'Cb Otro',
  'name' => 'cb_otro',
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
  'label' => 'Cb Cardiopatia',
  'name' => 'cb_cardiopatia',
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
  'label' => 'Cb Diabetes',
  'name' => 'cb_diabetes',
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
  'label' => 'Cb Enfvasculares',
  'name' => 'cb_enfvasculares',
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
  'label' => 'Cb Hta',
  'name' => 'cb_hta',
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
  'label' => 'Cb Cancer',
  'name' => 'cb_cancer',
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
  'label' => 'Cb Tuberculosis',
  'name' => 'cb_tuberculosis',
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
  'label' => 'Cb Enfenfmental',
  'name' => 'cb_enfenfmental',
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
  'label' => 'Cb Enfinfecciosa',
  'name' => 'cb_enfinfecciosa',
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
  'label' => 'Cb Malformacion',
  'name' => 'cb_malformacion',
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
  'label' => 'Cb Afotro',
  'name' => 'cb_afotro',
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
  'label' => 'Cb 1CP',
  'name' => 'cb_1CP',
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
  'label' => 'Cb 1SP',
  'name' => 'cb_1SP',
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
  'label' => 'Cb 3CP',
  'name' => 'cb_3CP',
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
  'label' => 'Cb 3SP',
  'name' => 'cb_3SP',
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
  'label' => 'Cb 5CP',
  'name' => 'cb_5CP',
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
  'label' => 'Cb 5SP',
  'name' => 'cb_5SP',
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
  'label' => 'Cb 7CP',
  'name' => 'cb_7CP',
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
  'label' => 'Cb 7SP',
  'name' => 'cb_7SP',
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
  'label' => 'Cb 9CP',
  'name' => 'cb_9CP',
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
  'label' => 'Cb 9SP',
  'name' => 'cb_9SP',
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
  'label' => 'Cb 2CP',
  'name' => 'cb_2CP',
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
  'label' => 'Cb 2SP',
  'name' => 'cb_2SP',
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
  'label' => 'Cb 4CP',
  'name' => 'cb_4CP',
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
  'label' => 'Cb 4SP',
  'name' => 'cb_4SP',
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
  'label' => 'Cb 6CP',
  'name' => 'cb_6CP',
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
  'label' => 'Cb 6SP',
  'name' => 'cb_6SP',
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
  'label' => 'Cb 8CP',
  'name' => 'cb_8CP',
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
  'label' => 'Cb 8SP',
  'name' => 'cb_8SP',
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
  'label' => 'Cb 10CP',
  'name' => 'cb_10CP',
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
  'label' => 'Cb 10SP',
  'name' => 'cb_10SP',
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
  'label' => 'Ta',
  'name' => 'ta',
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
  'label' => 'Fc',
  'name' => 'fc',
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
  'label' => 'Fr',
  'name' => 'fr',
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
  'label' => 'Sato2',
  'name' => 'sato2',
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
  'label' => 'Tempbuc',
  'name' => 'tempbuc',
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
  'label' => 'Peso',
  'name' => 'peso',
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
  'label' => 'Glucem',
  'name' => 'glucem',
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
  'label' => 'Talla',
  'name' => 'talla',
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
  'label' => 'Gm',
  'name' => 'gm',
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
  'label' => 'Go',
  'name' => 'go',
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
  'label' => 'Gv',
  'name' => 'gv',
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
  'label' => 'Cb 1RCP',
  'name' => 'cb_1RCP',
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
  'label' => 'Cb 1RSP',
  'name' => 'cb_1RSP',
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
  'label' => 'Cb 6RCP',
  'name' => 'cb_6RCP',
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
  'label' => 'Cb 6RSP',
  'name' => 'cb_6RSP',
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
  'label' => 'Cb 11RCP',
  'name' => 'cb_11RCP',
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
  'label' => 'Cb 11RSP',
  'name' => 'cb_11RSP',
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
  'label' => 'Cb 1SCP',
  'name' => 'cb_1SCP',
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
  'label' => 'Cb 1SSP',
  'name' => 'cb_1SSP',
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
  'label' => 'Cb 6SCP',
  'name' => 'cb_6SCP',
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
  'label' => 'Cb 6SSP',
  'name' => 'cb_6SSP',
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
  'label' => 'Cb 2RCP',
  'name' => 'cb_2RCP',
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
  'label' => 'Cb 2RSP',
  'name' => 'cb_2RSP',
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
  'label' => 'Cb 7RCP',
  'name' => 'cb_7RCP',
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
  'label' => 'Cb 7RSP',
  'name' => 'cb_7RSP',
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
  'label' => 'Cb 12RCP',
  'name' => 'cb_12RCP',
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
  'label' => 'Cb 12RSP',
  'name' => 'cb_12RSP',
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
  'label' => 'Cb 2SCP',
  'name' => 'cb_2SCP',
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
  'label' => 'Cb 2SSP',
  'name' => 'cb_2SSP',
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
  'label' => 'Cb 7SCP',
  'name' => 'cb_7SCP',
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
  'label' => 'Cb 7SSP',
  'name' => 'cb_7SSP',
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
  'label' => 'Cb 3RCP',
  'name' => 'cb_3RCP',
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
  'label' => 'Cb 3RSP',
  'name' => 'cb_3RSP',
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
  'label' => 'Cb 8RCP',
  'name' => 'cb_8RCP',
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
  'label' => 'Cb 8RSP',
  'name' => 'cb_8RSP',
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
  'label' => 'Cb 13RCP',
  'name' => 'cb_13RCP',
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
  'label' => 'Cb 13RSP',
  'name' => 'cb_13RSP',
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
  'label' => 'Cb 3SCP',
  'name' => 'cb_3SCP',
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
  'label' => 'Cb 3SSP',
  'name' => 'cb_3SSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'label' => 'Cb 8SCP',
  'name' => 'cb_8SCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
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
	        $this->alert        = array();



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
	        $this->script_js = NULL;



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
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here

	    }


	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate query of index result
	    | ----------------------------------------------------------------------
	    | @query = current sql query
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate row of index table html
	    | ----------------------------------------------------------------------
	    |
	    */
	    public function hook_row_index($column_index,&$column_value) {
	    	//Your code here
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before add data is execute
	    | ----------------------------------------------------------------------
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {
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
	    public function hook_before_edit(&$postdata,$id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_edit($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }


			//By the way, you can still create your own method in here... :)
			public function getAdd(){
				$operation = 'add';
				$medicos =  ModMedico::all();
				$pacientes = ModPaciente::all();
				$page_title = 'Anamnesis Hospitalización';
				return view("hospitalizacion.anamnesis",compact('page_title','medicos','pacientes','operation'));
			}

			public function getEdit($id){
				$operation = 'update';
				$anamnesisHospitalizacion = ModAnamnesisHospitalizacion::where('id',$id)->firstOrFail();

				$medicos =  ModMedico::all();
				$pacientes = ModPaciente::all();

				return view("hospitalizacion.anamnesis",compact('operation','medicos','pacientes','anamnesisHospitalizacion'));

			}

			public function store(Request $request){
				$anamnesisHospitalizacion =  new ModAnamnesisHospitalizacion;
				$anamnesisHospitalizacion->id_medico = $request->get('id_medico');
				$anamnesisHospitalizacion->id_paciente = $request->get('id_paciente');
				$anamnesisHospitalizacion->MotivoConsA = $request->get('MotivoConsA');
				$anamnesisHospitalizacion->MotivoConsC = $request->get('MotivoConsC');
				$anamnesisHospitalizacion->MotivoConsB = $request->get('MotivoConsB');
				$anamnesisHospitalizacion->MotivoConsD = $request->get('MotivoConsD');
				$anamnesisHospitalizacion->cb_vacunas = $request->get('cb_vacunas');
				$anamnesisHospitalizacion->cb_alergica = $request->get('cb_alergica');
				$anamnesisHospitalizacion->cb_neurologica = $request->get('cb_neurologica');
				$anamnesisHospitalizacion->cb_traumatologica = $request->get('cb_traumatologica');
				$anamnesisHospitalizacion->cb_tendsexual = $request->get('cb_tendsexual');
				$anamnesisHospitalizacion->cb_actsexual = $request->get('cb_actsexual');
				$anamnesisHospitalizacion->cb_perinatal = $request->get('cb_perinatal');
				$anamnesisHospitalizacion->cb_cardiaca = $request->get('cb_cardiaca');
				$anamnesisHospitalizacion->cb_metabolica = $request->get('cb_metabolica');
				$anamnesisHospitalizacion->cb_quirurgica = $request->get('cb_quirurgica');
				$anamnesisHospitalizacion->cb_riesgosocial = $request->get('cb_riesgosocial');
				$anamnesisHospitalizacion->cb_dietahabitos = $request->get('cb_dietahabitos');
				$anamnesisHospitalizacion->cb_infancia = $request->get('cb_infancia');
				$anamnesisHospitalizacion->cb_respiratoria = $request->get('cb_respiratoria');
				$anamnesisHospitalizacion->cb_hemolinf = $request->get('cb_hemolinf');
				$anamnesisHospitalizacion->cb_mental = $request->get('cb_mental');
				$anamnesisHospitalizacion->cb_riesgolaboral = $request->get('cb_riesgolaboral');
				$anamnesisHospitalizacion->cb_religioncultura = $request->get('cb_religioncultura');
				$anamnesisHospitalizacion->cb_adolecente = $request->get('cb_adolecente');
				$anamnesisHospitalizacion->cb_digestiva = $request->get('cb_digestiva');
				$anamnesisHospitalizacion->cb_urinaria = $request->get('cb_urinaria');
				$anamnesisHospitalizacion->cb_tsexual = $request->get('cb_tsexual');
				$anamnesisHospitalizacion->cb_riesgofamiliar = $request->get('cb_riesgofamiliar');
				$anamnesisHospitalizacion->cb_otro = $request->get('cb_otro');
				$anamnesisHospitalizacion->cb_cardiopatia = $request->get('cb_cardiopatia');
				$anamnesisHospitalizacion->cb_diabetes = $request->get('cb_diabetes');
				$anamnesisHospitalizacion->cb_enfvasculares = $request->get('cb_enfvasculares');
				$anamnesisHospitalizacion->cb_hta = $request->get('cb_hta');
				$anamnesisHospitalizacion->cb_cancer = $request->get('cb_cancer');
				$anamnesisHospitalizacion->cb_tuberculosis = $request->get('cb_tuberculosis');
				$anamnesisHospitalizacion->cb_enfenfmental = $request->get('cb_enfenfmental');
				$anamnesisHospitalizacion->cb_enfinfecciosa = $request->get('cb_enfinfecciosa');
				$anamnesisHospitalizacion->cb_malformacion = $request->get('cb_malformacion');
				$anamnesisHospitalizacion->cb_afotro = $request->get('cb_afotro');
				$anamnesisHospitalizacion->cb_1CP = $request->get('cb_1CP');
				$anamnesisHospitalizacion->cb_1SP = $request->get('cb_1SP');
				$anamnesisHospitalizacion->cb_3CP = $request->get('cb_3CP');
				$anamnesisHospitalizacion->cb_3SP = $request->get('cb_3SP');
				$anamnesisHospitalizacion->cb_5CP = $request->get('cb_5CP');
				$anamnesisHospitalizacion->cb_5SP = $request->get('cb_5SP');
				$anamnesisHospitalizacion->cb_7CP = $request->get('cb_7CP');
				$anamnesisHospitalizacion->cb_7SP = $request->get('cb_7SP');
				$anamnesisHospitalizacion->cb_9CP = $request->get('cb_9CP');
				$anamnesisHospitalizacion->cb_9SP = $request->get('cb_9SP');
				$anamnesisHospitalizacion->cb_2CP = $request->get('cb_2CP');
				$anamnesisHospitalizacion->cb_2SP = $request->get('cb_2SP');
				$anamnesisHospitalizacion->cb_4CP = $request->get('cb_4CP');
				$anamnesisHospitalizacion->cb_4SP = $request->get('cb_4SP');
				$anamnesisHospitalizacion->cb_6CP = $request->get('cb_6CP');
				$anamnesisHospitalizacion->cb_6SP = $request->get('cb_6SP');
				$anamnesisHospitalizacion->cb_8CP = $request->get('cb_8CP');
				$anamnesisHospitalizacion->cb_8SP = $request->get('cb_8SP');
				$anamnesisHospitalizacion->cb_10CP = $request->get('cb_10CP');
				$anamnesisHospitalizacion->cb_10SP = $request->get('cb_10SP');
				$anamnesisHospitalizacion->ta = $request->get('ta');
				$anamnesisHospitalizacion->fc = $request->get('fc');
				$anamnesisHospitalizacion->fr = $request->get('fr');
				$anamnesisHospitalizacion->sato2 = $request->get('sato2');
				$anamnesisHospitalizacion->tempbuc = $request->get('tempbuc');
				$anamnesisHospitalizacion->peso = $request->get('peso');
				$anamnesisHospitalizacion->glucem = $request->get('glucem');
				$anamnesisHospitalizacion->talla = $request->get('talla');
				$anamnesisHospitalizacion->gm = $request->get('gm');
				$anamnesisHospitalizacion->go = $request->get('go');
				$anamnesisHospitalizacion->gv = $request->get('gv');
				$anamnesisHospitalizacion->cb_1RCP = $request->get('cb_1RCP');
				$anamnesisHospitalizacion->cb_1RSP = $request->get('cb_1RSP');
				$anamnesisHospitalizacion->cb_6RCP = $request->get('cb_6RCP');
				$anamnesisHospitalizacion->cb_6RSP = $request->get('cb_6RSP');
				$anamnesisHospitalizacion->cb_11RCP = $request->get('cb_11RCP');
				$anamnesisHospitalizacion->cb_11RSP = $request->get('cb_11RSP');
				$anamnesisHospitalizacion->cb_1SCP = $request->get('cb_1SCP');
				$anamnesisHospitalizacion->cb_1SSP = $request->get('cb_1SSP');
				$anamnesisHospitalizacion->cb_6SCP = $request->get('cb_6SCP');
				$anamnesisHospitalizacion->cb_6SSP = $request->get('cb_6SSP');
				$anamnesisHospitalizacion->cb_2RCP = $request->get('cb_2RCP');
				$anamnesisHospitalizacion->cb_2RSP = $request->get('cb_2RSP');
				$anamnesisHospitalizacion->cb_7RCP = $request->get('cb_7RCP');
				$anamnesisHospitalizacion->cb_7RSP = $request->get('cb_7RSP');
				$anamnesisHospitalizacion->cb_12RCP = $request->get('cb_12RCP');
				$anamnesisHospitalizacion->cb_12RSP = $request->get('cb_12RSP');
				$anamnesisHospitalizacion->cb_2SCP = $request->get('cb_2SCP');
				$anamnesisHospitalizacion->cb_2SSP = $request->get('cb_2SSP');
				$anamnesisHospitalizacion->cb_7SCP = $request->get('cb_7SCP');
				$anamnesisHospitalizacion->cb_7SSP = $request->get('cb_7SSP');
				$anamnesisHospitalizacion->cb_3RCP = $request->get('cb_3RCP');
				$anamnesisHospitalizacion->cb_3RSP = $request->get('cb_3RSP');
				$anamnesisHospitalizacion->cb_8RCP = $request->get('cb_8RCP');
				$anamnesisHospitalizacion->cb_8RSP = $request->get('cb_8RSP');
				$anamnesisHospitalizacion->cb_13RCP = $request->get('cb_13RCP');
				$anamnesisHospitalizacion->cb_13RSP = $request->get('cb_13RSP');
				$anamnesisHospitalizacion->cb_3SCP = $request->get('cb_3SCP');
				$anamnesisHospitalizacion->cb_3SSP = $request->get('cb_3SSP');
				$anamnesisHospitalizacion->cb_8SCP = $request->get('cb_8SCP');
				$anamnesisHospitalizacion->cb_8SSP = $request->get('cb_8SSP');
				$anamnesisHospitalizacion->cb_4RCP = $request->get('cb_4RCP');
				$anamnesisHospitalizacion->cb_4RSP = $request->get('cb_4RSP');
				$anamnesisHospitalizacion->cb_9RCP = $request->get('cb_9RCP');
				$anamnesisHospitalizacion->cb_9RSP = $request->get('cb_9RSP');
				$anamnesisHospitalizacion->cb_14RCP = $request->get('cb_14RCP');
				$anamnesisHospitalizacion->cb_14RSP = $request->get('cb_14RSP');
				$anamnesisHospitalizacion->cb_4SCP = $request->get('cb_4SCP');
				$anamnesisHospitalizacion->cb_4SSP = $request->get('cb_4SSP');
				$anamnesisHospitalizacion->cb_9SCP = $request->get('cb_9SCP');
				$anamnesisHospitalizacion->cb_9SSP = $request->get('cb_9SSP');
				$anamnesisHospitalizacion->cb_5RCP = $request->get('cb_5RCP');
				$anamnesisHospitalizacion->cb_5RSP = $request->get('cb_5RSP');
				$anamnesisHospitalizacion->cb_10RCP = $request->get('cb_10RCP');
				$anamnesisHospitalizacion->cb_10RSP = $request->get('cb_10RSP');
				$anamnesisHospitalizacion->cb_15RCP = $request->get('cb_15RCP');
				$anamnesisHospitalizacion->cb_15RSP = $request->get('cb_15RSP');
				$anamnesisHospitalizacion->cb_5sCP = $request->get('cb_5sCP');
				$anamnesisHospitalizacion->cb_5sSP = $request->get('cb_5sSP');
				$anamnesisHospitalizacion->cb_10sCP = $request->get('cb_10sCP');
				$anamnesisHospitalizacion->cb_10sSP = $request->get('cb_10sSP');
				$anamnesisHospitalizacion->txtCie1 = $request->get('txtCie1');
				$anamnesisHospitalizacion->txtCod1 = $request->get('txtCod1');
				$anamnesisHospitalizacion->cb_1PRE = $request->get('cb_1PRE');
				$anamnesisHospitalizacion->cb_1DEF = $request->get('cb_1DEF');
				$anamnesisHospitalizacion->txtCie4 = $request->get('txtCie4');
				$anamnesisHospitalizacion->txtCod4 = $request->get('txtCod4');
				$anamnesisHospitalizacion->cb_4PRE = $request->get('cb_4PRE');
				$anamnesisHospitalizacion->cb_4DEF = $request->get('cb_4DEF');
				$anamnesisHospitalizacion->txtCie2 = $request->get('txtCie2');
				$anamnesisHospitalizacion->txtCod2 = $request->get('txtCod2');
				$anamnesisHospitalizacion->cb_2PRE = $request->get('cb_2PRE');
				$anamnesisHospitalizacion->cb_2DEF = $request->get('cb_2DEF');
				$anamnesisHospitalizacion->txtCie5 = $request->get('txtCie5');
				$anamnesisHospitalizacion->txtCod5 = $request->get('txtCod5');
				$anamnesisHospitalizacion->cb_5PRE = $request->get('cb_5PRE');
				$anamnesisHospitalizacion->cb_5DEF = $request->get('cb_5DEF');
				$anamnesisHospitalizacion->txtCie3 = $request->get('txtCie3');
				$anamnesisHospitalizacion->txtCod3 = $request->get('txtCod3');
				$anamnesisHospitalizacion->cb_3PRE = $request->get('cb_3PRE');
				$anamnesisHospitalizacion->cb_3DEF = $request->get('cb_3DEF');
				$anamnesisHospitalizacion->txti3 = $request->get('txti3');
				$anamnesisHospitalizacion->txtic3 = $request->get('txtic3');
				$anamnesisHospitalizacion->cb_6PRE = $request->get('cb_6PRE');
				$anamnesisHospitalizacion->cb_6DEF = $request->get('cb_6DEF');
				$anamnesisHospitalizacion->txtFechaAgendDoct = $request->get('txtFechaAgendDoct');
				$anamnesisHospitalizacion->nombremedico = $request->get('nombremedico');
				$anamnesisHospitalizacion->firmaDoc = $request->get('firmaDoc');
				$anamnesisHospitalizacion->txtAntePer = $request->get('txtAntePer');
				$anamnesisHospitalizacion->txtNoRef = $request->get('txtNoRef');
				$anamnesisHospitalizacion->txtProbActual = $request->get('txtProbActual');
				$anamnesisHospitalizacion->txtRevisOrgs = $request->get('txtRevisOrgs');
				$anamnesisHospitalizacion->txtExaFisico = $request->get('txtExaFisico');
				$anamnesisHospitalizacion->txtPlanTrat = $request->get('txtPlanTrat');

				$response = $anamnesisHospitalizacion->save();
				return response()->json([
					"response" => $response,
					"anamnesisHospitalizacion" =>$anamnesisHospitalizacion]);
			}


			public function update(Request $request, $id){
			 	$anamnesisHospitalizacion = ModAnamnesisHospitalizacion::findOrFail($id); 
				$anamnesisHospitalizacion->id_medico = $request->get('id_medico');
				$anamnesisHospitalizacion->id_paciente = $request->get('id_paciente');
				$anamnesisHospitalizacion->MotivoConsA = $request->get('MotivoConsA');
				$anamnesisHospitalizacion->MotivoConsC = $request->get('MotivoConsC');
				$anamnesisHospitalizacion->MotivoConsB = $request->get('MotivoConsB');
				$anamnesisHospitalizacion->MotivoConsD = $request->get('MotivoConsD');
				$anamnesisHospitalizacion->cb_vacunas = $request->get('cb_vacunas');
				$anamnesisHospitalizacion->cb_alergica = $request->get('cb_alergica');
				$anamnesisHospitalizacion->cb_neurologica = $request->get('cb_neurologica');
				$anamnesisHospitalizacion->cb_traumatologica = $request->get('cb_traumatologica');
				$anamnesisHospitalizacion->cb_tendsexual = $request->get('cb_tendsexual');
				$anamnesisHospitalizacion->cb_actsexual = $request->get('cb_actsexual');
				$anamnesisHospitalizacion->cb_perinatal = $request->get('cb_perinatal');
				$anamnesisHospitalizacion->cb_cardiaca = $request->get('cb_cardiaca');
				$anamnesisHospitalizacion->cb_metabolica = $request->get('cb_metabolica');
				$anamnesisHospitalizacion->cb_quirurgica = $request->get('cb_quirurgica');
				$anamnesisHospitalizacion->cb_riesgosocial = $request->get('cb_riesgosocial');
				$anamnesisHospitalizacion->cb_dietahabitos = $request->get('cb_dietahabitos');
				$anamnesisHospitalizacion->cb_infancia = $request->get('cb_infancia');
				$anamnesisHospitalizacion->cb_respiratoria = $request->get('cb_respiratoria');
				$anamnesisHospitalizacion->cb_hemolinf = $request->get('cb_hemolinf');
				$anamnesisHospitalizacion->cb_mental = $request->get('cb_mental');
				$anamnesisHospitalizacion->cb_riesgolaboral = $request->get('cb_riesgolaboral');
				$anamnesisHospitalizacion->cb_religioncultura = $request->get('cb_religioncultura');
				$anamnesisHospitalizacion->cb_adolecente = $request->get('cb_adolecente');
				$anamnesisHospitalizacion->cb_digestiva = $request->get('cb_digestiva');
				$anamnesisHospitalizacion->cb_urinaria = $request->get('cb_urinaria');
				$anamnesisHospitalizacion->cb_tsexual = $request->get('cb_tsexual');
				$anamnesisHospitalizacion->cb_riesgofamiliar = $request->get('cb_riesgofamiliar');
				$anamnesisHospitalizacion->cb_otro = $request->get('cb_otro');
				$anamnesisHospitalizacion->cb_cardiopatia = $request->get('cb_cardiopatia');
				$anamnesisHospitalizacion->cb_diabetes = $request->get('cb_diabetes');
				$anamnesisHospitalizacion->cb_enfvasculares = $request->get('cb_enfvasculares');
				$anamnesisHospitalizacion->cb_hta = $request->get('cb_hta');
				$anamnesisHospitalizacion->cb_cancer = $request->get('cb_cancer');
				$anamnesisHospitalizacion->cb_tuberculosis = $request->get('cb_tuberculosis');
				$anamnesisHospitalizacion->cb_enfenfmental = $request->get('cb_enfenfmental');
				$anamnesisHospitalizacion->cb_enfinfecciosa = $request->get('cb_enfinfecciosa');
				$anamnesisHospitalizacion->cb_malformacion = $request->get('cb_malformacion');
				$anamnesisHospitalizacion->cb_afotro = $request->get('cb_afotro');
				$anamnesisHospitalizacion->cb_1CP = $request->get('cb_1CP');
				$anamnesisHospitalizacion->cb_1SP = $request->get('cb_1SP');
				$anamnesisHospitalizacion->cb_3CP = $request->get('cb_3CP');
				$anamnesisHospitalizacion->cb_3SP = $request->get('cb_3SP');
				$anamnesisHospitalizacion->cb_5CP = $request->get('cb_5CP');
				$anamnesisHospitalizacion->cb_5SP = $request->get('cb_5SP');
				$anamnesisHospitalizacion->cb_7CP = $request->get('cb_7CP');
				$anamnesisHospitalizacion->cb_7SP = $request->get('cb_7SP');
				$anamnesisHospitalizacion->cb_9CP = $request->get('cb_9CP');
				$anamnesisHospitalizacion->cb_9SP = $request->get('cb_9SP');
				$anamnesisHospitalizacion->cb_2CP = $request->get('cb_2CP');
				$anamnesisHospitalizacion->cb_2SP = $request->get('cb_2SP');
				$anamnesisHospitalizacion->cb_4CP = $request->get('cb_4CP');
				$anamnesisHospitalizacion->cb_4SP = $request->get('cb_4SP');
				$anamnesisHospitalizacion->cb_6CP = $request->get('cb_6CP');
				$anamnesisHospitalizacion->cb_6SP = $request->get('cb_6SP');
				$anamnesisHospitalizacion->cb_8CP = $request->get('cb_8CP');
				$anamnesisHospitalizacion->cb_8SP = $request->get('cb_8SP');
				$anamnesisHospitalizacion->cb_10CP = $request->get('cb_10CP');
				$anamnesisHospitalizacion->cb_10SP = $request->get('cb_10SP');
				$anamnesisHospitalizacion->ta = $request->get('ta');
				$anamnesisHospitalizacion->fc = $request->get('fc');
				$anamnesisHospitalizacion->fr = $request->get('fr');
				$anamnesisHospitalizacion->sato2 = $request->get('sato2');
				$anamnesisHospitalizacion->tempbuc = $request->get('tempbuc');
				$anamnesisHospitalizacion->peso = $request->get('peso');
				$anamnesisHospitalizacion->glucem = $request->get('glucem');
				$anamnesisHospitalizacion->talla = $request->get('talla');
				$anamnesisHospitalizacion->gm = $request->get('gm');
				$anamnesisHospitalizacion->go = $request->get('go');
				$anamnesisHospitalizacion->gv = $request->get('gv');
				$anamnesisHospitalizacion->cb_1RCP = $request->get('cb_1RCP');
				$anamnesisHospitalizacion->cb_1RSP = $request->get('cb_1RSP');
				$anamnesisHospitalizacion->cb_6RCP = $request->get('cb_6RCP');
				$anamnesisHospitalizacion->cb_6RSP = $request->get('cb_6RSP');
				$anamnesisHospitalizacion->cb_11RCP = $request->get('cb_11RCP');
				$anamnesisHospitalizacion->cb_11RSP = $request->get('cb_11RSP');
				$anamnesisHospitalizacion->cb_1SCP = $request->get('cb_1SCP');
				$anamnesisHospitalizacion->cb_1SSP = $request->get('cb_1SSP');
				$anamnesisHospitalizacion->cb_6SCP = $request->get('cb_6SCP');
				$anamnesisHospitalizacion->cb_6SSP = $request->get('cb_6SSP');
				$anamnesisHospitalizacion->cb_2RCP = $request->get('cb_2RCP');
				$anamnesisHospitalizacion->cb_2RSP = $request->get('cb_2RSP');
				$anamnesisHospitalizacion->cb_7RCP = $request->get('cb_7RCP');
				$anamnesisHospitalizacion->cb_7RSP = $request->get('cb_7RSP');
				$anamnesisHospitalizacion->cb_12RCP = $request->get('cb_12RCP');
				$anamnesisHospitalizacion->cb_12RSP = $request->get('cb_12RSP');
				$anamnesisHospitalizacion->cb_2SCP = $request->get('cb_2SCP');
				$anamnesisHospitalizacion->cb_2SSP = $request->get('cb_2SSP');
				$anamnesisHospitalizacion->cb_7SCP = $request->get('cb_7SCP');
				$anamnesisHospitalizacion->cb_7SSP = $request->get('cb_7SSP');
				$anamnesisHospitalizacion->cb_3RCP = $request->get('cb_3RCP');
				$anamnesisHospitalizacion->cb_3RSP = $request->get('cb_3RSP');
				$anamnesisHospitalizacion->cb_8RCP = $request->get('cb_8RCP');
				$anamnesisHospitalizacion->cb_8RSP = $request->get('cb_8RSP');
				$anamnesisHospitalizacion->cb_13RCP = $request->get('cb_13RCP');
				$anamnesisHospitalizacion->cb_13RSP = $request->get('cb_13RSP');
				$anamnesisHospitalizacion->cb_3SCP = $request->get('cb_3SCP');
				$anamnesisHospitalizacion->cb_3SSP = $request->get('cb_3SSP');
				$anamnesisHospitalizacion->cb_8SCP = $request->get('cb_8SCP');
				$anamnesisHospitalizacion->cb_8SSP = $request->get('cb_8SSP');
				$anamnesisHospitalizacion->cb_4RCP = $request->get('cb_4RCP');
				$anamnesisHospitalizacion->cb_4RSP = $request->get('cb_4RSP');
				$anamnesisHospitalizacion->cb_9RCP = $request->get('cb_9RCP');
				$anamnesisHospitalizacion->cb_9RSP = $request->get('cb_9RSP');
				$anamnesisHospitalizacion->cb_14RCP = $request->get('cb_14RCP');
				$anamnesisHospitalizacion->cb_14RSP = $request->get('cb_14RSP');
				$anamnesisHospitalizacion->cb_4SCP = $request->get('cb_4SCP');
				$anamnesisHospitalizacion->cb_4SSP = $request->get('cb_4SSP');
				$anamnesisHospitalizacion->cb_9SCP = $request->get('cb_9SCP');
				$anamnesisHospitalizacion->cb_9SSP = $request->get('cb_9SSP');
				$anamnesisHospitalizacion->cb_5RCP = $request->get('cb_5RCP');
				$anamnesisHospitalizacion->cb_5RSP = $request->get('cb_5RSP');
				$anamnesisHospitalizacion->cb_10RCP = $request->get('cb_10RCP');
				$anamnesisHospitalizacion->cb_10RSP = $request->get('cb_10RSP');
				$anamnesisHospitalizacion->cb_15RCP = $request->get('cb_15RCP');
				$anamnesisHospitalizacion->cb_15RSP = $request->get('cb_15RSP');
				$anamnesisHospitalizacion->cb_5sCP = $request->get('cb_5sCP');
				$anamnesisHospitalizacion->cb_5sSP = $request->get('cb_5sSP');
				$anamnesisHospitalizacion->cb_10sCP = $request->get('cb_10sCP');
				$anamnesisHospitalizacion->cb_10sSP = $request->get('cb_10sSP');
				$anamnesisHospitalizacion->txtCie1 = $request->get('txtCie1');
				$anamnesisHospitalizacion->txtCod1 = $request->get('txtCod1');
				$anamnesisHospitalizacion->cb_1PRE = $request->get('cb_1PRE');
				$anamnesisHospitalizacion->cb_1DEF = $request->get('cb_1DEF');
				$anamnesisHospitalizacion->txtCie4 = $request->get('txtCie4');
				$anamnesisHospitalizacion->txtCod4 = $request->get('txtCod4');
				$anamnesisHospitalizacion->cb_4PRE = $request->get('cb_4PRE');
				$anamnesisHospitalizacion->cb_4DEF = $request->get('cb_4DEF');
				$anamnesisHospitalizacion->txtCie2 = $request->get('txtCie2');
				$anamnesisHospitalizacion->txtCod2 = $request->get('txtCod2');
				$anamnesisHospitalizacion->cb_2PRE = $request->get('cb_2PRE');
				$anamnesisHospitalizacion->cb_2DEF = $request->get('cb_2DEF');
				$anamnesisHospitalizacion->txtCie5 = $request->get('txtCie5');
				$anamnesisHospitalizacion->txtCod5 = $request->get('txtCod5');
				$anamnesisHospitalizacion->cb_5PRE = $request->get('cb_5PRE');
				$anamnesisHospitalizacion->cb_5DEF = $request->get('cb_5DEF');
				$anamnesisHospitalizacion->txtCie3 = $request->get('txtCie3');
				$anamnesisHospitalizacion->txtCod3 = $request->get('txtCod3');
				$anamnesisHospitalizacion->cb_3PRE = $request->get('cb_3PRE');
				$anamnesisHospitalizacion->cb_3DEF = $request->get('cb_3DEF');
				$anamnesisHospitalizacion->txti3 = $request->get('txti3');
				$anamnesisHospitalizacion->txtic3 = $request->get('txtic3');
				$anamnesisHospitalizacion->cb_6PRE = $request->get('cb_6PRE');
				$anamnesisHospitalizacion->cb_6DEF = $request->get('cb_6DEF');
				$anamnesisHospitalizacion->txtFechaAgendDoct = $request->get('txtFechaAgendDoct');
				$anamnesisHospitalizacion->nombremedico = $request->get('nombremedico');
				$anamnesisHospitalizacion->firmaDoc = $request->get('firmaDoc');
				$anamnesisHospitalizacion->txtAntePer = $request->get('txtAntePer');
				$anamnesisHospitalizacion->txtNoRef = $request->get('txtNoRef');
				$anamnesisHospitalizacion->txtProbActual = $request->get('txtProbActual');
				$anamnesisHospitalizacion->txtRevisOrgs = $request->get('txtRevisOrgs');
				$anamnesisHospitalizacion->txtExaFisico = $request->get('txtExaFisico');
				$anamnesisHospitalizacion->txtPlanTrat = $request->get('txtPlanTrat');
				$anamnesisHospitalizacion->id_paciente = $request->get('id_paciente');
				$anamnesisHospitalizacion->id_medico = $request->get('id_medico');

				$response = $anamnesisHospitalizacion->save();
				return response()->json([
					"response" => $response,
					"anamnesisHospitalizacion" =>$anamnesisHospitalizacion]);
			}


	}
