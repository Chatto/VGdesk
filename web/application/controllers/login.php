<?php

class Login extends CI_Controller 
{
	public function index()
	{
		$this->load->model("login/login_model");
		$this->load->view('login_view');
	}
}