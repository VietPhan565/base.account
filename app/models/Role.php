<?php

class Role
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRole()
    {
        $this->db->query("SELECT * FROM role");
        $result = $this->db->resultSet();
        return $result;
    }
}
