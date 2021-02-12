<?php

class Admin{
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function profil($id_user)
    {
        $this->db->query('SELECT * FROM user join member on user.id=member.id_member where user.id=:id_user');

        $this->db->bind(':id_user',$id_user);

        $result = $this->db->resultSet();

        return $result;
    }

    public function cariProfil($id_user)
    {
        $this->db->query('SELECT * FROM user join member on user.id=member.id_member where user.id=:id_user');
        
        $this->db->bind(':id_user',$id_user);

        $row = $this->db->single();

        return $row;
    }

    public function updateDataProfil($data)
    {
        $this->db->query('UPDATE member SET nama_member = :nama, alamat_member = :alamat, telepon = :telepon, 
                            email = :email, nik = :nik WHERE id_member = :id');

        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('nik', $data['nik']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}