<?php

class Merk{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showMerk()
    {
        $this->db->query('SELECT * FROM merk');

        $result = $this->db->resultSet();

        return $result;
    }

    public function lacakMerk($merk)
    {
        $this->db->query('SELECT * FROM merk WHERE nama_merk = :merk');

        $this->db->bind(':merk',$merk);

        $row = $this->db->rowCount();

        if ($row>0) {
            return true;
        }else{
            return false;
        }
    }

    public function tambahMerk($data)
    {
        $this->db->query('INSERT INTO merk(nama_merk, tgl_input) VALUES (:nama_merk, :tgl_input)');

        $this->db->bind('nama_merk', $data['merk']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));
        

        if ($this->db->execute()) {
            return true;
        } else{
            return true;
        }
    }

    public function deleteMerk($id)
    {
        $this->db->query('DELETE FROM merk WHERE id_merk = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cariMerk($id_merk)
    {
        $this->db->query('SELECT * FROM merk where id_merk=:id_merk');
        
        $this->db->bind(':id_merk',$id_merk);

        $row = $this->db->single();

        return $row;
    }

    public function updateMerk($data)
    {
        $this->db->query('UPDATE merk SET nama_merk = :nama, tgl_input = :tgl_input WHERE id_merk = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nama', $data['nama']);

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}