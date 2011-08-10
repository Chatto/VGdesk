<?php

class UserVO
{
	public $hadError;
	public $userId;
	public $username;
	public $email;
}

class LoginResponse
{
	public $valid = false;
	public $usernameValid = false;
	public $usernameError = "";
	public $passwordValid = false;
	public $passwordError = "";
	public $loginValid = false;
}

class RegisterResponse
{
	public $valid = false;
	public $usernameValid = false;
	public $usernameError = "";
	public $passwordValid = false;
	public $passwordError = "";
	public $emailValid = false;
	public $emailError = "";
	public $registerValid = false;
}