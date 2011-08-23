<?php

class Register_page extends CI_Controller
{
    public function __construct()
    {
	parent::__construct();
	
        // no cache
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

	$this->load->model("login/login_model");
    }

    public function index()
    {
	$data = array();
	$data["user"] = $this->login_model->getLoggedInUser();

	$this->load->view("register_view", $data);
    }
}