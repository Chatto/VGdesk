<?php

include_once("application/controllers/page_controller.php");

class Login_page extends PageController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("login/login_model");
    }
    
    public function index()
    {
	$this->loadView("login_view");
    }
}