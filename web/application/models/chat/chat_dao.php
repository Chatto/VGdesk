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
				    "user2" => $targetUser->userId));
	$foundChat = $this->createChatFromQuery($findChatQuery,
						array($myUser, $targetUser));
	
	if ($foundChat->error)
	{
	    // create the chat
	    $this->_db->insert("Chats",
			       array("user1_id" => $myUser->userId,
				     "user2_id" => $targetUser->userId));
	    $this->_db->insert("Chats",
			       array("user1_id" => $targetUser->userId,
				     "user2_id" => $myUser->userId));

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

    public function sendChatMessage($chatId, $user, $message)
    {
	$this->_db->insert("ChatMessage",
			   array("chat_id" => $chatId,
				 "user_id" => $user->userId
				 "message" => $message));
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
	$user1Id = -1;
	$user2Id = -1;

	foreach ($query->result() as $row)
	{
	    $chat->error = false;
	    $chat->chatId = $query->chat_id;
	    $user1 = $query->user1_id;
	    $user2 = $query->user2_id;
	    $chat->chatType = $query->chat_type;
	    $chat->lastArchived = mysql_to_unix($row->lastArchived);
	    break;
	}

	if (!$chat->error)
	{
	    foreach ($users as $user)
	    {
		if ($user->userId == $user1Id)
		{
		    $chat->user1 = $user;
		}
		if ($user->userId == $user2Id)
		{
		    $user->user2 = $user;
		}
	    }
	}

	return $chat;
	
    }

}