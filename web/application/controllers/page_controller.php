<?php

// common methods for vgdesk controllers

class PageController extends CI_Controller
{
	protected $user;
	
	public function __construct()
	{
		parent::__construct();
		
		// no cache
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	
		$this->load->model("login/login_model");
		$this->load->helper("url");
	
		$this->user = $this->login_model->getLoggedInUser();
		if ($this->user == null)
		{
			redirect("/login/login_page/");
		}
	}
}