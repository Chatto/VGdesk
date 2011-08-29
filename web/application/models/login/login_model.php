<?php

include_once("application/models/vo/login_vo.php");

include_once("application/models/login/login_validator.php");
include_once("application/models/login/login_dao.php");
include_once("application/models/login/login_session_manager.php");

class Login_model extends CI_Model
{
    protected $_validator;
    protected $_loginSessionManager;
    protected $_loginDAO;

    public function __construct()
    {
        parent::__construct();

        // Load Libraries
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->database();

        // Load model components
        $this->_validator = new LoginValidator($this->form_validation);
        $this->_loginDAO = new LoginDAO($this->db);
        $this->_loginSessionManager = new LoginSessionManager($this->session, $this->_loginDAO);
    }

    public function loginUser($username, $password, $remember = false)
    {
        $response = $this->_validator->validateLogin($username, $password);

        if ($response->valid === true)
        {
            $loginValid = $this->processLogin($username, $password, $remember);
            if ($loginValid === true)
            {
                $response->loginValid = true;
            }
            else
            {
                $response->loginValid = false;
                $response->valid = false;
            }
        }

	$response->user = $this->getLoggedInUser();

        return $response;
    }

    public function registerUser($username, $password, $displayName, $email)
    {
        $response = $this->_validator->validateRegister($username, $password, $displayName, $email);

        if ($response->valid)
        {
            $registerValid = $this->processRegister($username, $password, $displayName, $email);
            if ($registerValid === true)
            {
                $response->registerValid = true;
            }
            else
            {
                $response->registerValid = false;
                $response->valid = false;
            }
        }

	$response->user = $this->getLoggedInUser();

        return $response;
    }

    public function isLoggedIn()
    {
        return $this->_loginSessionManager->hasUser();
    }

    public function getLoggedInUser()
    {
        return $this->_loginSessionManager->getUser();
    }

    public function logoutUser()
    {
        $this->_loginSessionManager->setUser(null);
    }

    protected function processLogin($username, $password, $remember)
    {
        $result = false;
        $user = $this->_loginDAO->createLoginUser($username, $password);

        if (!$user->hadError)
        {
            $this->saveUser($user);
            $result = true;
        }

        return $result;
    }
    
    protected function processRegister($username, $password, $displayName, $email)
    {
	$result = false;
        $user = $this->_loginDAO->createRegisterUser($username, $password, $displayName, $email);

        if (!$user->hadError)
        {
            $this->saveUser($user);
	    $result = true;
        }

        return $result;
    }
    
    protected function saveUser($user)
    {
        if ($this->isLoggedIn())
        {
            $this->logoutUser();
        }
        
        $this->_loginSessionManager->setUser($user);
    }
}