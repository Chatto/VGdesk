<?php

include_once("application/controllers/page_controller.php");

class Chat_page extends PageController
{    
    protected $user;
    
    public function __construct()
    {
        parent::__construct(true);
    }
    
    public function index()
    {
	$this->loadView("pages/chat/chat_view");
    }
}