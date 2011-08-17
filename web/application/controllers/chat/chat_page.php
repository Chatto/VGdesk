<?php

include_once("application/controllers/page_controller.php");

class Chat_page extends PageController
{	
	protected $user;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("login/login_model");
		$this->load->helper("url");
		
		$this->user = $this->login_model->getLoggedInUser();
		if ($this->user == null)
		{
			redirect("/login/login_page/");
		}
	}
	
	public function index()
	{
		echo "Chat Page";
	}
}