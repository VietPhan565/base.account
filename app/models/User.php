<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM User");
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAccountId($username){
        $this->db->query("SELECT * FROM account WHERE username = '" . $username . "'");
        $result = $this->db->single();
        return $result;
    }

    public function getUserByAccountId($id)
    {
        $this->db->query('SELECT * FROM user WHERE account_id = ' . $id);
        $data = $this->db->single();
        return $data;
    }
}
