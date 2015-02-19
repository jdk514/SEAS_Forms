<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify_Form_Creation extends MY_Controller {

	function __construct() {
		parent::__construct();
   		$this->load->model('forms','',TRUE);
   		$this->load->model('sub_forms','',TRUE);
	}

	function index() {

		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('form', 'Form', 'trim|required|xss_clean|callback_form_exists');
		//Check validate the conents of each sub_form name
		$this->form_validation->set_rules('sub_form[]', 'Sub Form', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE) {
			//Field validation failed.  User redirected back to form page
			$this->load->view('header');
			$this->load->view('admin/forms');
		} else {
			//Form validated, insert form and subforms into respective tables
			$form = $this->input->post('form');
			$sub_forms = $this->input->post('sub_form');

			$this->forms->insert($form);
			foreach ($sub_forms as $sub_form) {
				$this->sub_forms->insert($form, $sub_form);
			}
			$this->session->set_flashdata('success_msg', 'Created Form and Sub Forms');
			redirect('admin', 'refresh');
		}
	}

	//reference in password rule callback function
	function form_exists($form_name) {
		//Field validation succeeded.  Validate against database
		//query the database
		$result = $this->forms->form_exists($form_name);

		if($result) {
			return True;
		} else {
			$this->form_validation->set_message('duplicate', 'This form already exists, use another name');
			return False;
		}
	}
}
?>