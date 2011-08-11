<?php

include_once("application/models/vo/login_vo.php");

class LoginValidator
{
	protected $_validator;
	
	public function __construct($validator)
	{
		$this->_validator = $validator;
	}
	
	public function validateLogin($username, $password)
	{
		$response = new LoginResponse();
		$response->valid = true;
		
		return $response;
	}
	
	public function validateRegister($username, $password, $email)
	{
		$response = new RegisterResponse();
		$response->valid = true;
		
		return $response;
	}
}