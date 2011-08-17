<?php

// common methods for vgdesk controllers

class PageController extends CI_Controller
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
}