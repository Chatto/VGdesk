<?php

include_once("application/controllers/page_controller.php");

class Overview_page extends PageController
{
    public function index()
    {
	$data = array();
	$data["user"] = $this->user;

        $this->load->view("pages/overview/overview_view", $data);
    }
}