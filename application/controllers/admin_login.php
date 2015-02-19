<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()	{
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('admin_login');
	}
}
