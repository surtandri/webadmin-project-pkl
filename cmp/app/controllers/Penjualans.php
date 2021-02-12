<?php

class Penjualans extends Controller
{
    public function __construct()
    {
        $this->barangModel = $this->model('Barang');

        $this->merkModel = $this->model('Merk');

        $this->kategoriModel = $this->model('Kategori');

        $this->distributorModel = $this->model('Distributor');

        $this->penjualanModel = $this->model('Penjualan');
    }

    public function index(){
        $barangs = $this->barangModel->showBarang();

        $merks = $this->merkModel->showMerk();

        $kategoris = $this->kategoriModel->showKategori();

        $distributors = $this->distributorModel->showDistributor();

        $data = [
            'barangs' => $barangs,
            'merks' => $merks,
            'kategoris' => $kategoris,
            'distributors' => $distributors
        ];

        $this->view('penjualans/index', $data);
    }

    public function cariBarangPenjualan(){
        $cari = trim(strip_tags($_POST['keyword']));

        $penjualans = $this->penjualanModel->searchBarangPenjualan($cari);

        $data = [
            'penjualans' => $penjualans,
        ];

        $this->view('penjualans/tabel', $data);
    }

    public function tambahKeranjang($id_barang)
    {
        // // echo ("<script LANGUAGE='JavaScript'>
        // //                     window.alert('Merk sudah terdaftar!');
        // //                     window.location.href='../kategoris/index';
        // //                     </script>");

        // $penjualan = $this->penjualanModel->cariHarga($id_barang);
        
        // $dat = [
        //     'penjualan' => $penjualan,
        // ];

        // echo 'halo';
        // echo $dat['penjualan']->nama_barang;
        // // echo $dat['penjualan']->id_barang;
        $penjualans = $this->penjualanModel->tambahPenjualan($id_barang);

        $data = [
            'penjualans' => $penjualans,
        ];

        $this->view('penjualans/keranjang', $data);
    }
}