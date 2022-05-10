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

    public function findUserById($id){
        $this->db->query('SELECT * FROM user WHERE account_id = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->single();
        return $data;
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM user where email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        if ($row!=null) {
            return $row;
        } else {
            return false;
        }
    }

    public function register($data, $id)
    {
        $this->db->query('INSERT INTO user(email, account_id) VALUES (:email, :acc_id)');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':acc_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
