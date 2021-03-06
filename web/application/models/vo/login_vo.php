<?php

class UserVO
{
    public $hadError;
    public $userId;
    public $displayName;
    public $username;
    public $email;
    public $usergroup;
    public $title;
    public $departmentId;
}

class LoginResponse
{
    public $valid = false;
    public $usernameValid = false;
    public $usernameError = "";
    public $passwordValid = false;
    public $passwordError = "";
    public $loginValid = false;
    public $user = null;
}

class RegisterResponse
{
    public $valid = false;
    public $usernameValid = false;
    public $usernameError = "";
    public $passwordValid = false;
    public $passwordError = "";
    public $displayNameValid = false;
    public $displayNameError = "";
    public $emailValid = false;
    public $emailError = "";
    public $registerValid = false;
    public $user = null;
}