<?php

class Kategori{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showKategori()
    {
        $this->db->query('SELECT * FROM kategori');

        $result = $this->db->resultSet();

        return $result;
    }

    public function lacakKategori($kategori)
    {
        $this->db->query('SELECT * FROM kategori WHERE nama_kategori = :kategori');

        $this->db->bind(':kategori',$kategori);

        $row = $this->db->rowCount();

        if ($row>0) {
            return true;
        }else{
            return false;
        }
    }

    public function tambahKategori($data)
    {
        $this->db->query('INSERT INTO kategori(nama_kategori, tgl_input) VALUES (:nama_kategori, :tgl_input)');

        $this->db->bind('nama_kategori', $data['kategori']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));
        

        if ($this->db->execute()) {
            return true;
        } else{
            return true;
        }
    }

    public function deleteKategori($id)
    {
        $this->db->query('DELETE FROM kategori WHERE id_kategori = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cariKategori($id_kategori)
    {
        $this->db->query('SELECT * FROM kategori where id_kategori=:id_kategori');
        
        $this->db->bind(':id_kategori',$id_kategori);

        $row = $this->db->single();

        return $row;
    }

    public function updateKategori($data)
    {
        $this->db->query('UPDATE kategori SET nama_kategori = :nama, tgl_input = :tgl_input WHERE id_kategori = :id');

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