<?php

include_once("application/controllers/page_controller.php");

class Overview_page extends PageController
{
	public function index()
	{
		$this->load->view("pages/overview/overview_view");
	}
}