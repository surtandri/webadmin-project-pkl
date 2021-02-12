<?php

class Distributor{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showDistributor()
    {
        $this->db->query('SELECT * FROM distributor');

        $result = $this->db->resultSet();

        return $result;
    }

    public function lacakDistributor($nama)
    {
        $this->db->query('SELECT * FROM distributor WHERE nama_distributor = :nama');

        $this->db->bind(':nama',$nama);

        $row = $this->db->rowCount();

        if ($row>0) {
            return true;
        }else{
            return false;
        }
    }

    public function tambahDistributor($data)
    {
        $this->db->query('INSERT INTO distributor(nama_distributor, sales, hp, alamat_distributor, tgl_input) VALUES (:nama, :sales, :hp, :alamat, :tgl_input)');

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('sales', $data['sales']);
        $this->db->bind('hp', $data['hp']);
        $this->db->bind('alamat', $data['alamat']);

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));
        
        if ($this->db->execute()) {
            return true;
        } else{
            return true;
        }
    }

    public function deleteDistributor($id_distributor)
    {
        $this->db->query('DELETE FROM distributor WHERE id_distributor = :id_distributor');

        $this->db->bind(':id_distributor', $id_distributor);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cariDistributor($id_distributor)
    {
        $this->db->query('SELECT * FROM distributor where id_distributor=:id_distributor');
        
        $this->db->bind(':id_distributor',$id_distributor);

        $row = $this->db->single();

        return $row;
    }

    public function lacakInfoDistributor($data)
    {
        $this->db->query('SELECT * FROM distributor WHERE nama_distributor = :nama AND sales = :sales AND hp = :hp AND alamat_distributor = :alamat AND id_distributor = :id_distributor');

        $this->db->bind(':id_distributor',$data['id']);
        $this->db->bind(':nama',$data['nama']);
        $this->db->bind(':sales',$data['sales']);
        $this->db->bind(':hp',$data['hp']);
        $this->db->bind(':alamat',$data['alamat']);

        $row = $this->db->rowCount();

        if ($row>0) {
            return true;
        }else{
            return false;
        }
    }

    public function showDetailDistributor($id){
        $this->db->query('SELECT * FROM distributor WHERE id_distributor = :id');

        $this->db->bind(':id', $id);

        $result = $this->db->resultSet();

        return $result;
    }

    public function updateDistributor($data)
    {
        $this->db->query('UPDATE distributor SET nama_distributor = :nama, sales = :sales, hp = :hp, alamat_distributor = :alamat, tgl_input = :tgl_input WHERE id_distributor = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':sales', $data['sales']);
        $this->db->bind(':hp', $data['hp']);
        $this->db->bind(':alamat', $data['alamat']);
        
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}