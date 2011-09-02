<?php

// common methods for vgdesk controllers

class PageController extends CI_Controller
{
    protected $_isUserPage;
    protected $_requestData;
    protected $_user;
    
    public function __construct($isUserPage = false)
    {
        parent::__construct();
	$this->_isUserPage = $isUserPage;

        // no cache
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

	// load models
        $this->load->model("login/login_model");
        $this->load->helper("url");

	$this->_user = $this->login_model->getLoggedInUser();

	if ($this->_isUserPage)
	{
	    $this->verifyUser();
	}

	$this->setRequestData();
    }

    protected function setRequestData()
    {
	$this->_requestData = array();
	$this->_requestData["user"] = $this->_user;	    

	$this->_requestData["site_url"] = site_url();
	$this->_requestData["base_url"] = base_url();
    }

    protected function verifyUser()
    {
	$userError = false;

        if ($this->_user == null)
        {
	    $userError = true;
        }

	$clientUsername = $this->input->post("username");
	if ($this->_user->username != $clientUsername)
	{
	    $userError = true;
	    $this->login_model->logoutUser();
	}

	if ($userError)
	{
	    redirect("/login/login_page/");
	}
    }
    
    protected function loadView($viewName)
    {
	$this->load->view($viewName, $this->_requestData);
    }
}