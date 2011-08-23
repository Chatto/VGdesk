
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

	$this->load->model("login/login_model");
	$user = $this->login_model->getLoggedInUser();
    }

    protected function rebuildGet()
    {
	parse_str($_SERVER['QUERY_STRING'], $_GET);
    }

    protected function displayHome($pageId)
    {
	$data = array();
	$data["default_page"] = $pageId;
	$data["user"] = $this->user;
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
	}
	else
	{
	    $this->displayHome("overview");
	}

    }
}