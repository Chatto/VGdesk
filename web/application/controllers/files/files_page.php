<?php

include_once("application/controllers/page_controller.php");

class Files_page extends PageController
{
    public function __construct()
    {
	parent::__construct(true);
    }
    
    public function index()
    {
        echo "Files Page";
    }
}