<?php

include_once("application/models/vo/chat_vo.pp");

class ChatDAO
{
    protected $_db;

    public function __construct($db)
    {
	$this->_db = $db;
    }

    public function createChat($myUser, $targetUser)
    {	
	// get existing chats between users
	$findChatQuery = $this->_db->get_where("Chats", 
			      array("user1" => $myUser->userId, 
				    "user2" => $myUser->userId));
	$foundChat = $this->createChatFromQuery($findChatQuery,
						array($myUser, $targetUser));
	
	if ($foundChat->error)
	{
	    // create the chat
	    

	    // then redo the get query
	    return createChat($myUser, $targetUser);
	}
	else
	{
	    return $foundChat;
	}
    }

    public function getChatMessages($chatId, $dateTime = null)
    {


    }

    public function sendChatMessage($chatId)
    {

    }

    protected function createErrorChat()
    {
	$result = new ChatVO();
	$result->error = true;
	return $result;
    }

    protected function createChatFromQuery($query, $users)
    {
	$chat = $this->createErrorChat();
	$user1 = -1;
	$user2 = -1;

	foreach ($query->result() as $row)
	{
	    $chat->error = false;
	    $chat->chatId = $query->chat_id;
	    $user1 = $query->user1;
	    $user2 = $query->user2;
	    $chat->chatType = $query->chat_type;
	    $chat->lastArchived = mysql_to_unix($row->lastArchived);
	    break;
	}

	if (!$chat->error)
	{
	    foreach ($users as $user)
	    {
		if ($user->userId == $user1)
		{
		    $chat->user1 = $user;
		}
		if ($user->userId == $user2)
		{
		    $user->user2 = $user;
		}
	    }
	}

	return $chat;
	
    }

}