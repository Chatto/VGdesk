<?php

class Login_page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("login/login_model");
    }
    
    public function index()
    {
        $data = array();
        $data["user"] = $this->login_model->getLoggedInUser();
        
        $this->load->view('login_view', $data);
    }
}