<?php

include_once("application/controllers/page_controller.php");

class Register_page extends PageController
{
    public function index()
    {
	$this->loadView("register_view");
    }
}