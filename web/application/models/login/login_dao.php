<?php

include_once("application/models/vo/login_vo.php");

class LoginDAO
{
    protected $_db;
    
    public function __construct($database)
    {
        $this->_db = $database;
    }
    
    public function createUser($userId)
    {
        // get the user with the same user ID
        $query = $this->_db->get_where("User",
            array 
            (
                'user_id' => $userId
            ), 1, 0
        );
        $user = $this->createUserFromQuery($query);
        
        return $user;
    }
    
    public function createLoginUser($username, $password)
    {
	$user = $this->createErrorUser();
	
        //get the user with the same username and password
        $query = $this->_db->get_where("User",
            array 
            (
                'username' => $username
            ), 1, 0
        );
        $loginUser = $this->createUserFromQuery($query);
	$encryptedPassword = $this->getUserPasswordFromQuery($query);

	if ($this->comparePasswords($password, $encryptedPassword))
	{
	    $user = $loginUser;
	}
        
        return $user;
    }
    
    public function createRegisterUser($username, $password, $displayName, $email)
    {
        $user = $this->createErrorUser();

        $query = $this->_db->get_where("User",
            array
            (
                'username' => $username
            ), 1, 0
        );
        $existingUser = $this->createUserFromQuery($query);
        
        if ($existingUser->hadError)
        {
            // good, user doesn't exist
            $encryptedPassword = $this->encryptPassword($password);

            $newUserData = array
            (
		"display_name" => $displayName,
                "username" => $username,
                "password" => $encryptedPassword,
                "email" => $email,
                "usergroup" => 0,
                "title" => "New User"
            );
            $query = $this->_db->insert("User", $newUserData);
            
            $user = $this->createLoginUser($username, $password);
        }
        
        return $user;
    }

    protected function comparePasswords($password, $encryptedPassword)
    {
	return $encryptedPassword == crypt($password, $encryptedPassword);
    }
    
    protected function encryptPassword($password)
    {
	return crypt($password);
    }
    
    protected function createUserFromQuery($query)
    {
        $user = $this->createErrorUser();
    
        foreach ($query->result() as $row)
        {
            $user->hadError = false;
            $user->userId = $row->user_id;
	    $user->displayName = $row->display_name;
            $user->username = $row->username;
            $user->email = $row->email;
            $user->usergroup = $row->usergroup;
            $user->title = $row->title;
            $user->departmentId = $row->department_id;
            break;
        }
    
        return $user;
    }

    protected function getUserPasswordFromQuery($query)
    {
	$password = null;
	foreach ($query->result() as $row)
	{
	    $password = $row->password;
	    break;
	}

	return $password;
    }
    
    protected function createErrorUser()
    {
        $user = new UserVO();
        $user->hadError = true;
        return $user;    
    }
}