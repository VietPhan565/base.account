<?php

class Account
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function register($data)
	{
		$this->db->query('INSERT INTO account(username, password, role_id) 
        VALUES (:user, :pass, 2)');

		$this->db->bind(':user', $data['username']);
		$this->db->bind(':pass', $data['password']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getAccountByUser($user){
		$this->db->query('SELECT * FROM account where username = :user');
		$this->db->bind(':user', $user);

		$data = $this->db->single();
		return $data;
	}

	public function logIn($user, $pass){
		$this->db->query('SELECT * FROM `account` WHERE username = :user');
		
		$this->db->bind(':user', $user);

		$row = $this->db->single();
		$hashed_pass = $row->password;
		if(password_verify($pass, $hashed_pass)){
			return $row;
		}else{
			return false;
		}
	}
}
