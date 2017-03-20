<?php namespace App\Http\Controllers;

use Session;
use Request;
//use Illuminate\Http\Request;
use DB;
use CRUDbooster;
use App\ModMedico;
use App\CmsUser;

class AdminCmsUsersController extends \crocodicstudio\crudbooster\controllers\CBController {

	public function cbInit() {
		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->table               = 'cms_users';
		$this->primary_key         = 'id';
		$this->title_field         = "name";
		$this->button_action_style = 'button_icon';
		$this->button_import 	   = false;
		$this->button_export 	   = false;
		# END CONFIGURATION DO NOT REMOVE THIS LINE

		# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = array();
		$this->col[] = array("label"=>"Name","name"=>"name");
		$this->col[] = array("label"=>"Email","name"=>"email");
		$this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
		$this->col[] = array("label"=>"Photo","name"=>"photo","image"=>1);
		# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Nombre de usuario',
  'name' => 'name',
  'type' => 'text',
  'validation' => 'required|alpha_spaces|min:3',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Email',
  'name' => 'email',
  'type' => 'email',
  'validation' => 'required|email|unique:cms_users,email,11',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => 'Recommended resolution is 200x200px',
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Foto',
  'name' => 'photo',
  'type' => 'upload',
  'validation' => 'image|max:1000',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'cms_privileges,name',
  'dataquery' => NULL,
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'parent_select' => NULL,
  'label' => 'Privilegio',
  'name' => 'id_cms_privileges',
  'type' => 'select',
  'validation' => NULL,
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => 'Please leave empty if not change',
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Contraseña',
  'name' => 'password',
  'type' => 'password',
  'validation' => NULL,
  'width' => 'col-sm-10',
);
			# END FORM DO NOT REMOVE THIS LINE

			if(CRUDBooster::getCurrentMethod() == 'getProfile') {
			$this->button_addmore = false;
			$this->button_cancel  = false;
			$this->button_show    = false;
			$this->button_add     = false;
			$this->button_delete  = false;
			$this->hide_form      = ['id_cms_privileges'];
		}
	}

	public function getProfile() {
		$this->cbLoader();
		$data['page_title'] = trans("crudbooster.label_button_profile");
		$data['row']        = DB::table($this->table)->where($this->primary_key,CRUDBooster::myId())->first();
		$data['return_url'] = Request::fullUrl();
		return view('crudbooster::default.form',$data);
	}
  public function hook_after_add($id)
  {
      /*
       *  Asignar el id de usuario al que pertenece el medico
       * */
      $medico_id = \Request::get('medico_id');
      if($medico_id != null)
      {
          try{
              $medico = ModMedico::findOrFail($medico_id);
              $medico->cms_user_id = $id;
              $medico->save();
          }catch (\Error $x){

          }
      }
}
  public function hook_before_delete($id)
  {
    try {
			$user = CmsUser::with('privilege')->find($id);
			if($user->privilege->id == 3){ // es paciente
				$p = ModPaciente::where("cms_user_id","=",$id)->first();
				$p->cms_user_id = null;
				$p->save();
			}else if($user->privilege->id == 4){ // es medico
				$m = ModMedico::where("cms_user_id","=",$id)->first();
				$m->cms_user_id = null;
				$m->save();
			}

    }catch (\Error $x){
    }
  }
}
