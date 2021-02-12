<?php

class User{
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login($username,$password)
    {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        $this->db->bind(':username',$username);

        $row = $this->db->single();

        $hash_password = $row->password;

        if(password_verify($password, $hash_password)){
            return $row;
        }else{
            return false;
        }
    }
}

