<?php

class Penjualan{
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function searchBarangPenjualan($key)
    {       
        $this->db->query('SELECT * FROM barang join merk on barang.id_merk=merk.id_merk join kategori on barang.id_kategori=kategori.id_kategori
                            WHERE merk.nama_merk LIKE :key OR kategori.nama_kategori LIKE :key OR barang.nama_barang LIKE :key');

        $this->db->bind(':key', '%' . $key . '%',);
        
        $result = $this->db->resultSet();

        return $result;
    }

    // public function cariHarga($id_barang)
    // {
    //     $this->db->query('SELECT * FROM barang WHERE id_barang=:id');

    //     $this->db->bind(':id', $id_barang);              

    //     $result = $this->db->resultSet();

    //     return $result;
    // }

    public function tambahPenjualan($id_barang)
    {
        $jumlah = '0';
		$total = '0';

        $this->db->query('INSERT INTO penjualan(id_barang,id_member,jumlah,total,tgl_input) 
                            VALUES (:barang, :member, :jumlah, :total, :tgl_input');

        $this->db->bind(':barang',$id_barang);
        $this->db->bind(':member',$_SESSION['id']);
        $this->db->bind(':id', $id_barang);
        $this->db->bind(':jumlah', $jumlah);   
        $this->db->bind(':total', $total);      
        
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));

        $result = $this->db->resultSet();

        return $result;
    }
}