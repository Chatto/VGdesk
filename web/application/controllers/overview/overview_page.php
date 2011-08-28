<?php

include_once("application/controllers/page_controller.php");

class Overview_page extends PageController
{
    public function __construct()
    {
	parent::__construct(true);
    }
    
    public function index()
    {
        $this->load->view("pages/overview/overview_view", $this->_requestData);
    }
}