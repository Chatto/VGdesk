<?php

include_once("application/controllers/page_controller.php");

class Home extends PageController 
{
    protected function displayHome($pageId)
    {
	$this->_requestData["default_page"] = $pageId;
	$this->loadView("home_view");
    }

    public function index()
    {
	$this->displayHome("overview");
    }
}