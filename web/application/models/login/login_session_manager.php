<?php

class LoginSessionManager
{
	protected $_session;
	protected $_loginDAO;
	protected $_currentUser;
	
	public function __construct($session, $loginDAO)
	{
		$this->_session = $session;
		$this->_loginDAO = $loginDAO;
		$this->_currentUser = null;
	}
	
	public function hasUser()
	{
		$user = $this->getUser();
		return $user != null;
	}
	
	public function getUser()
	{
		if ($this->_currentUser == null)
		{
			$this->loadUser();
		}
		
		return $this->_currentUser;
	}
	
	public function setUser($user, $remember = false)
	{
		$this->_currentUser = $user;
		
		// ignore remember me
		
		if ($user === null)
		{
			$this->deleteUser();
		}
		else
		{
			$this->saveUser($user->userId);
		}
	}
	
	protected function deleteUser()
	{
		$newData = array(
						"logged_in" => "0",
						"userId" => "-1"
		);
		$this->_session->set_userdata($newData);
	}
	
	protected function saveUser($userId)
	{
		$newData = array
		(
			"logged_in" => "1",
			"userId" => $userId
		);
		$this->_session->set_userdata($newData);
	}
	
	protected function loadUser()
	{
		$this->_currentUser = null;
		
		$loggedIn = $this->_session->userdata("logged_in");
		if ($loggedIn == "1")
		{
			$userId = $this->_session->userdata("userId");
			$this->_currentUser = $this->_loginDAO->createUser($userId);
		}
	}
}