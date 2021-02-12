<?php

class Barang{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showBarang()
    {
        $this->db->query('SELECT * FROM barang join kategori on barang.id_kategori=kategori.id_kategori
                            join merk on barang.id_merk=merk.id_merk 
                            join distributor on barang.id_distributor=distributor.id_distributor');

        $result = $this->db->resultSet();

        return $result;
    }

    public function lacakBarang($data)
    {
        $this->db->query('SELECT * FROM barang WHERE kode_barang = :kode AND id_merk = :merk AND id_kategori = :kategori AND id_distributor = :distributor 
                            AND nama_barang = :nama AND nama_kendaraan = :kendaraan');

        $this->db->bind(':kode',$data['kode']);
        $this->db->bind(':merk',$data['merk']);
        $this->db->bind(':kategori',$data['kategori']);
        $this->db->bind(':distributor',$data['distributor']);
        $this->db->bind(':nama',$data['nama']);
        $this->db->bind(':kendaraan',$data['kendaraan']);

        $row = $this->db->rowCount();

        if ($row>0) {
            return true;
        }else{
            return false;
        }
    }

    public function tambahBarang($data)
    {
        $this->db->query('INSERT INTO barang(kode_barang, id_kategori, id_merk, id_distributor, nama_kendaraan, nama_barang, harga_beli, harga_jual1, harga_jual2, satuan_barang, stok, tgl_input) 
                            VALUES (:kode, :kategori, :merk, :distributor, :kendaraan, :nama, :beli, :jual1, :jual2, :satuan, :stok, :tgl_input)');

        $this->db->bind(':kode',$data['kode']);
        $this->db->bind(':merk',$data['merk']);
        $this->db->bind(':kategori',$data['kategori']);
        $this->db->bind(':distributor',$data['distributor']);
        $this->db->bind(':nama',$data['nama']);
        $this->db->bind(':kendaraan',$data['kendaraan']);
        $this->db->bind(':satuan',$data['satuan']);
        $this->db->bind(':beli',$data['beli']);
        $this->db->bind(':jual1',$data['jual1']);
        $this->db->bind(':jual2',$data['jual2']);
        $this->db->bind(':stok',$data['stok']);

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));
        
        if ($this->db->execute()) {
            return true;
        } else{
            return true;
        }
    }

    public function deleteBarang($id_barang)
    {
        $this->db->query('DELETE FROM barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id_barang);

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

    public function lacakInfoBarang($data)
    {
        $this->db->query('SELECT * FROM barang WHERE kode_barang = :kode AND id_kategori = :kategori AND id_merk = :merk AND id_distributor = :distributor 
                            AND nama_kendaraan = :kendaraan AND nama_barang = :nama AND harga_beli = :beli AND harga_jual1 = :jual1 
                            AND harga_jual2 = :jual2 AND satuan_barang = :satuan AND stok =  :stok AND id_barang = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':kode',$data['kode']);
        $this->db->bind(':merk',$data['merk']);
        $this->db->bind(':kategori',$data['kategori']);
        $this->db->bind(':distributor',$data['distributor']);
        $this->db->bind(':nama',$data['nama']);
        $this->db->bind(':kendaraan',$data['kendaraan']);
        $this->db->bind(':satuan',$data['satuan']);
        $this->db->bind(':beli',$data['beli']);
        $this->db->bind(':jual1',$data['jual1']);
        $this->db->bind(':jual2',$data['jual2']);
        $this->db->bind(':stok',$data['stok']);

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

    public function updateBarang($data)
    {   
        $this->db->query('UPDATE barang SET kode_barang = :kode, id_kategori = :kategori, id_merk = :merk, id_distributor = :distributor, nama_kendaraan = :kendaraan,  
                           nama_barang = :nama, harga_beli = :beli, harga_jual1 = :jual1, harga_jual2 = :jual2, satuan_barang = :satuan, stok =  :stok, tgl_input = :tgl_input 
                           WHERE id_barang = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':kode',$data['kode']);
        $this->db->bind(':merk',$data['merk']);
        $this->db->bind(':kategori',$data['kategori']);
        $this->db->bind(':distributor',$data['distributor']);
        $this->db->bind(':nama',$data['nama']);
        $this->db->bind(':kendaraan',$data['kendaraan']);
        $this->db->bind(':satuan',$data['satuan']);
        $this->db->bind(':beli',$data['beli']);
        $this->db->bind(':jual1',$data['jual1']);
        $this->db->bind(':jual2',$data['jual2']);
        $this->db->bind(':stok',$data['stok']);
        
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->bind('tgl_input', date("d-m-Y, (H:i:s)"));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}