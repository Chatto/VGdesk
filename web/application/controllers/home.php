<?php

class Home extends CI_Controller 
{
    protected function rebuildGet()
    {
	parse_str($_SERVER['QUERY_STRING'], $_GET);
    }

    protected function displayHome($pageId)
    {
	$data = array();
	$data["default_page"] = $pageId;
	$this->load->view("home_view", $data);
    }

    public function index()
    {
	$this->rebuildGet();
	
	if (isset($_GET['p']))
	{
	    $page = $_GET['p'];
	}

	if (isset($page))
	{
	    $this->displayHome($page);

	else
	{
	    $this->displayHome("overview");
	}
    }
}