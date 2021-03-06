<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tutorials extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _tutorial_output($output = null)
	{
		$this->load->view('tutorial.php',$output);
	}

	public function index()
	{
		$this->_tutorial_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


	public function tutorial_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tutorial');	
			$crud->set_relation_n_n('category','tutorial_category','category','tutorial_id','category_id','category');
			$crud->unset_columns('tutorial_id','category');
			$crud->fields('title', 'description', 'category');
			$crud->required_fields('title','description','category');
			$crud->set_subject('Tutorial');
				
			$output = $crud->render();
			$this->_tutorial_output($output);
	}

	function multigrids()
		{
			$this->config->load('grocery_crud');
			$this->config->set_item('grocery_crud_dialog_forms',true);
			$this->config->set_item('grocery_crud_default_per_page',10);
	
			$output1 = $this->content_management();
			$output2 = $this->flashcard_management();
			
			$js_files = $output1->js_files;
			$css_files = $output1->css_files;
			$output = "<h1>Content</h1>".$output1->output."<h1>Flashcards</h1>".$output2->output;
	
			$this->_tutorial_output((object)array(
					'js_files' => $js_files,
					'css_files' => $css_files,
					'output'	=> $output
			));
		}
		
		public function content_management()
		{
			$crud = new grocery_CRUD();
			$crud->set_table('content');
			
			$crud->set_relation('tutorial_id','tutorial','title');
			$crud->display_as('tutorial_id','Tutorial');	
			$crud->set_subject('Section');
			$crud->required_fields('tutorial_id','header','info');
	
			$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
	
			$output = $crud->render();
	
			if($crud->getState() != 'list') {
				$this->_example_output($output);
			} else {
				return $output;
			}
		}
	
		public function flashcard_management()
		{
			$crud = new grocery_CRUD();
	
			$crud->set_table('flashcard');
			$crud->set_relation('content_id','content','header');
			$crud->display_as('content_id','Section Assignment');
			$crud->set_subject('Flash Card');
			$crud->required_fields('term','description');
	
			$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
	
			$output = $crud->render();
	
			if($crud->getState() != 'list') {
				$this->_example_output($output);
			} else {
				return $output;
			}
		}
			
}


