<?php

include_once("application/controllers/page_controller.php");

class Forum_page extends PageController
{
    public function __construct()
    {
	parent::__construct(true);
    }

    public function index()
    {
        echo "Forum Page";
    }
}