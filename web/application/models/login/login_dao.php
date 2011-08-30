<?php

include_once("application/models/vo/login_vo.php");

/**
 * Login Data Access Object
 * Encapsulates all Login Database Access Logic
 */
class LoginDAO
{
    protected $_db; /// Code Igniter Database Object
    
    public function __construct($database)
    {
        $this->_db = $database;
    }
    
    /**
     * Return a UserVO of the user with the given ID.
     * If there is no such user, return an error UserVO
     */
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
    
    /**
     * Return a UserVO of the user with the given username and password.
     * If the login info was incorrect, return an error UserVO
     */
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
    
    /**
     * Register a new user, and return a new UserVO.
     * If a user with the same username already exists, return an error UserVO
     */
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

    /**
     * Compare the password with the one stored in the database
     * Retrieve the salt and password hash from $encryptedPassword
     * and recreate the hash using the salt and the test password
     */
    protected function comparePasswords($password, $encryptedPassword)
    {
	$salt = substr($encryptedPassword, 0, 64);
	$validHash = substr($encryptedPassword, 64, 64);
	$testHash = hash("sha256", $salt . $password);
	
	return $testHash === $validHash;
    }

    /**
     * Encrypt the Password using Sha256 and a random salt
     * Store the salt alonside the password hash
     * The final $encryptedPassword will be 128 characters
     */
    protected function encryptPassword($password)
    {
	$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	$hash = hash("sha256", $salt . $password);
	$final = $salt . $hash;
	return $final;
    }
    
    /**
     * Create a UserVO from a database query of the User table
     */
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

    /**
     * Returns the encrypted password from a database query of the User table
     */
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
    
    /**
     * Create an error UserVO
     */
    protected function createErrorUser()
    {
        $user = new UserVO();
        $user->hadError = true;
        return $user;    
    }
}