<?php

class Account
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	
	/**
	 * register
	 *
	 * @param  mixed $data
	 * @return true/false
	 */
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
	
	/**
	 * getAccountByUser
	 *
	 * @param  mixed $user
	 * @return data/false
	 */
	public function getAccountByUser($user)
	{
		$this->db->query('SELECT * FROM account where username = :user');
		$this->db->bind(':user', $user);

		$data = $this->db->single();
		if (!is_null($data)) {
			return $data;
		} else {
			return false;
		}
	}
	
	/**
	 * logIn
	 *
	 * @param  mixed $user
	 * @param  mixed $pass
	 * @return data/false
	 */
	public function logIn($user, $pass)
	{
		$this->db->query('SELECT * FROM `account` WHERE username = :user');

		$this->db->bind(':user', $user);

		$row = $this->db->single();
		if ($row == null) {
			return false;
		}
		$hashed_pass = $row->password;
		if (password_verify($pass, $hashed_pass)) {
			return $row;
		} else {
			return false;
		}
	}
	
	/**
	 * checkUserExist
	 *
	 * @param  mixed $user
	 * @return data/false
	 */
	public function checkUserExist($user)
	{
		$this->db->query('SELECT * FROM `account` WHERE username = :user');
		$this->db->bind(':user', $user);

		$row = $this->db->single();
		if (!is_null($row)) {
			return $row;
		} else {
			return false;
		}
	}
	
	/**
	 * getAccountByID
	 *
	 * @param  mixed $id
	 * @return data/false
	 */
	public function getAccountByID($id)
	{
		$this->db->query('SELECT * FROM account WHERE account_id = :id');
		$this->db->bind(':id', $id);

		$row = $this->db->single();
		if ($row != null) {
			return $row;
		} else {
			return false;
		}
	}
	
	/**
	 * changePassword
	 *
	 * @param  mixed $id
	 * @param  mixed $password
	 * @return true/false
	 */
	public function changePassword($id, $password)
	{
		$this->db->query('UPDATE account SET password=:pass WHERE account_id=:id');
		$this->db->bind(':pass', $password);
		$this->db->bind(':id', $id);

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
