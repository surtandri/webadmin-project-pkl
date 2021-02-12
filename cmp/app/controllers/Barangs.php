<?php

class Barangs extends Controller
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

        $this->view('barangs/index', $data);
    }

    public function tambahBarang(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'kode' =>trim($_POST['kode']),
                'merk' =>trim($_POST['merk']),
                'kategori' =>trim($_POST['kategori']),
                'distributor' =>trim($_POST['distributor']),
                'nama' =>trim($_POST['nama']),
                'kendaraan' =>trim($_POST['kendaraan']),
                'satuan' =>trim($_POST['satuan']),
                'beli' =>trim($_POST['beli']),
                'jual1' =>trim($_POST['jual1']),
                'jual2' =>trim($_POST['jual2']),
                'stok' =>trim($_POST['stok']),
            ];
           
            if ($this->barangModel->lacakBarang($data)){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Barang sudah terdaftar!');
                            window.location.href='../barangs/index';
                            </script>");
                            
            }else{
                if($this->barangModel->tambahBarang($data)){
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Succesfully Added');
                            window.location.href='../barangs/index';
                            </script>");
                    
                }else{
                    redirect('barangs/index');
                }
            }
        }

        else{
            $barangs = $this->barangModel->showBarang();

            $data = [
                'barangs' => $barangs
            ];

            $this->view('barangs/index', $data);
        }
    }

    public function deleteBarang($id)
    {
        if ($this->barangModel->deleteBarang($id)){
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Succesfully Delete');
                     window.location.href='../barangs/index';
                    </script>");
        } else{
            die("Terjadi kesalahan");
        }
    }

    public function updateBarang($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  

            $data = [
                'id' => $id,
                'kode' =>trim($_POST['kode']),
                'merk' =>trim($_POST['merk']),
                'kategori' =>trim($_POST['kategori']),
                'distributor' =>trim($_POST['distributor']),
                'nama' =>trim($_POST['nama']),
                'kendaraan' =>trim($_POST['kendaraan']),
                'satuan' =>trim($_POST['satuan']),
                'beli' =>trim($_POST['beli']),
                'jual1' =>trim($_POST['jual1']),
                'jual2' =>trim($_POST['jual2']),
                'stok' =>trim($_POST['stok']), 
            ];
            
            if ($this->barangModel->lacakInfoBarang($data)){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Update gagal! Barang ini sudah terdaftar!');
                            window.location.href='../../barangs/index';
                            </script>");
            }else{
                $dataedit = $this->barangModel->updateBarang($data);

                if($dataedit){
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Succesfully Updated');
                        window.location.href='../../barangs/index';
                        </script>");
                }
            }
        }
           
        else{
            $barangs = $this->barangModel->showBarang();

            $data = [
                'barangs' => $barangs
            ];

            $this->view('barangs/index', $data);
        }
    }
}

