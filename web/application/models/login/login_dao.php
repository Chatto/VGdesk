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
		$encryptedPassword = $this->encryptPassword($password);
		
		//get the user with the same username and password
		$query = $this->_db->get_where("User",
			array 
			(
				'username' => $username,
				'password' => $encryptedPassword
			), 1, 0
		);
		$user = $this->createUserFromQuery($query);
		
		return $user;
	}
	
	public function createRegisterUser($username, $password, $email)
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
	
	protected function encryptPassword($password)
	{
		return $password;
	}
	
	protected function createUserFromQuery($query)
	{
		$user = $this->createErrorUser();
	
		foreach ($query->result() as $row)
		{
			$user->hadError = false;
			$user->userId = $row->user_id;
			$user->username = $row->username;
			$user->email = $row->email;
			$user->usergroup = $row->usergroup;
			$user->title = $row->title;
			$user->departmentId = $row->department_id;
			break;
		}
	
		return $user;
	}
	
	protected function createErrorUser()
	{
		$user = new UserVO();
		$user->hadError = true;
		return $user;	
	}
}