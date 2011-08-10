<?php

include_once("application/models/vo/login_vo.php");

class LoginDAO
{
	protected $_database;
	
	public function __construct($database)
	{
		$this->_database = $database;
	}
	
	public function createUser($userId)
	{
		$user = new UserVO();
		
		return $user;
	}
	
	public function createLoginUser($username, $password)
	{
		$user = new UserVO();
		
		
		return $user;
	}
	
	public function createRegisterUser($username, $password, $email)
	{
		$user = new UserVO();
		
		
		return $user;
	}
}