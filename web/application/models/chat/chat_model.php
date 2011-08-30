<?php

class Chat_model extends CI_Model
{
    protected $_chatDAO;

    public function __construct()
    {
	parent::__construct();

	// Load Libraries
	// Load

	// Load model components
	
    }

    public function createChat($user)
    {
    }

    public function pollChatRequest($chatId)
    {
    }

    public function createGroupChat()
    {
    }

    public function inviteGroupChat($user)
    {
    }

    public function getMessages($chatId, $maxNumMessages)
    {
    }

    public function pollNewMessages($chatId)
    {
    }

    public function sendMessage($chatId, $message)
    {
    }
}