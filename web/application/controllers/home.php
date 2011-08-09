<?php 

class Home extends CI_Controller 
{
	public function index()
	{
		$data['name'] = "Xander Masotto";
		
		$this->load->view('home_view', $data);
	}
}

?>