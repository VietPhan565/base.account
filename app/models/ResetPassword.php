<?php

class ResetPassword
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    /**
     * deleteResetEmail
     *
     * @param  mixed $email
     * @return true/false
     */
    public function deleteResetEmail($email)
    {
        $this->db->query('DELETE FROM reset_password WHERE reset_email = :email');
        $this->db->bind(':email', $email);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * insertToken
     *
     * @param  mixed $email
     * @param  mixed $selector
     * @param  mixed $token
     * @param  mixed $expires
     * @return true/false
     */
    public function insertToken($email, $selector, $token, $expires)
    {
        $this->db->query('INSERT INTO reset_password (reset_email, reset_selector,
        reset_token, reset_expires) VALUES (:email, :selector, :token, :expire)');
        $this->db->bind(':email', $email);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':token', $token);
        $this->db->bind(':expire', $expires);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * checkExpire
     *
     * @param  mixed $selector
     * @param  mixed $current_date
     * @return data/false
     */
    public function checkExpire($selector, $current_date)
    {
        $this->db->query('SELECT * FROM reset_password WHERE reset_selector = :selector
         AND reset_expires >= :current_date');

        $this->db->bind(':selector', $selector);
        $this->db->bind(':current_date', $current_date);

        $row = $this->db->single();

        if (!is_null($row)) {
            return $row;
        } else {
            return false;
        }
    }
}
