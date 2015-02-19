<?php
class MY_Controller extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();

        // Check that the user is logged in
        if ($this->session->userdata("logged_in") == null || $this->session->userdata('logged_in')['id'] < 1) {
            redirect('admin_login', 'refresh');
        }   
    }
}