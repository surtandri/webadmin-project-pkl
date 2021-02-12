<?php

class Penjualans extends Controller
{
    public function __construct()
    {
        $this->barangModel = $this->model('Barang');

        $this->merkModel = $this->model('merk');

        $this->kategoriModel = $this->model('kategori');

        $this->distributorModel = $this->model('distributor');
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
}