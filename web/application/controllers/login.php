<?php

class Login extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("login/login_model");
		$this->load->helper("url");
	}
	
	public function index()
	{
		$data = array();
		$data["user"] = $this->login_model->getLoggedInUser();
		
		$this->load->view('login_view', $data);
	}
	
	public function register($username, $password, $email)
	{
		$this->login_model->registerUser($username, $password, $email);
		redirect("/login/index/");
	}
	
	public function signin($username, $password)
	{
		$this->login_model->loginUser($username, $password);
		redirect("/login/index/");
	}
	
	public function logout()
	{
		$this->login_model->logoutUser();
		redirect("/login/index/");
	}
}