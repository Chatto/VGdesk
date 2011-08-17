<?php

class Login_api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("login/login_model");
	}
	
	public function index()
	{
		$user = $this->login_model->getLoggedInUser();
		echo json_encode($user);
	}
	
	public function get_user()
	{
		$user = $this->login_model->getLoggedInUser();
		echo json_encode($user);
	}

	public function login_user()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		$response = $this->login_model->loginUser($username, $password);
		echo json_encode($response);
	}

	public function register_user()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$email = $this->input->post("email");
		
		$response = $this->login_model->registerUser($username, $password, $email);
		echo json_encode($response);
	}

	public function logout_user()
	{
		$this->login_model->logoutUser();
		$user = $this->login_model->getLoggedInUser();
		echo json_encode($user);
	}
}