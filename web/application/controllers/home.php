
<?php

class Home extends CI_Controller 
{
    protected $user;

    public function __construct()
    {
	parent::__construct();
	
	// no cache
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    }

    protected function displayHome($pageId)
    {
	$data = array();
	$data["default_page"] = $pageId;

	$this->load->view("home_view", $data);
    }

    public function index()
    {
	$this->displayHome("overview");
    }
}