<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Miechv extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _miechv_output($output = null)
	{
		$this->load->view('miechv_view.php',$output);
	}

	public function index()
	{
		$this->_miechv_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


	public function home_1()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('parent');	
			$crud->unset_columns('parent_id','enrollment_date','dob','age','sex','marital_status','race','ethnicity','street_address','city','zip_code','social_security','home_phone','cell_phone');
			$crud->fields('enrollment_date','last_name','first_name','middle_name','dob','age','sex','marital_status','race','ethnicity','street_address','city','zip_code','social_security','home_phone','cell_phone');
			$crud->required_fields('enrollment_date','last_name','first_name','middle_name','dob','age','sex','marital_status','race','ethnicity','street_address','city','zip_code');
			$crud->display_as('dob','Date of Birth');
			$crud->set_subject('Enrollee');
				
			$output = $crud->render();
			$this->_miechv_output($output);
	}

	function home_2()
		{
			$this->config->load('grocery_crud');
			$this->config->set_item('grocery_crud_dialog_forms',true);
			$this->config->set_item('grocery_crud_default_per_page',10);
	
			$output1 = $this->parent_info();
			$output2 = $this->household_record();
			
			$js_files = $output1->js_files;
			$css_files = $output1->css_files;
			$output = "<h1>Parent Info</h1>".$output1->output."<h1>Household Record</h1>".$output2->output;
	
			$this->_miechv_output((object)array(
					'js_files'  => $js_files,
					'css_files' => $css_files,
					'output'    => $output
			));
		}
		
		public function parent_info()
		{
			$crud = new grocery_CRUD();
			$crud->set_table('parent');
			
	
			$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
	
			$output = $crud->render();
	
			if($crud->getState() != 'list') {
				$this->_example_output($output);
			} else {
				return $output;
			}
		}
	
		public function household_record()
		{
			$crud = new grocery_CRUD();
	
			$crud->set_table('household_record');
			$crud->display_as('parent_id','Parent');
			$crud->set_relation('parent_id','parent','last_name');
	
			$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
	
			$output = $crud->render();
	
			if($crud->getState() != 'list') {
				$this->_example_output($output);
			} else {
				return $output;
			}
		}
			
}


