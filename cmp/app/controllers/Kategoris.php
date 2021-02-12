<?php

class Kategoris extends Controller
{
    public function __construct()
    {
        $this->kategoriModel = $this->model('Kategori');
    }

    public function index(){
        $kategoris = $this->kategoriModel->showKategori();

        $data = [
            'kategoris' => $kategoris
        ];

        $this->view('kategoris/index', $data);
    }

    public function tambahKategori(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'kategori' =>trim($_POST['kategori']),
            ];
           
            if ($this->kategoriModel->lacakKategori($data['kategoris'])){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Merk sudah terdaftar!');
                            window.location.href='../kategoris/index';
                            </script>");
                            
            }else{
                if($this->kategoriModel->tambahKategori($data)){
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Succesfully Added');
                            window.location.href='../kategoris/index';
                            </script>");
                    
                }else{
                    redirect('kategoris/index');
                }
            }
        }

        else{
            $data = [
                'kategoris' => '',
            ];

            $this->view('kategoris/index', $data);
        }
    }

    public function deleteKategori($id)
    {
        if ($this->kategoriModel->deleteKategori($id)){
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Succesfully Delete!');
                     window.location.href='../kategoris/index';
                    </script>");
        } else{
            die("Terjadi kesalahan");
        }
    }

    public function updateKategori($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  

            $data = [
                'id' => $id,
                'nama' => trim($_POST['nama']),    
            ];
            
            if ($this->kategoriModel->lacakKategori($data['nama'])){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Update gagal! Kategori ini sudah terdaftar!');
                            window.location.href='../../kategoris/index';
                            </script>");
            }else{
                $dataedit = $this->kategoriModel->updateKategori($data);

                if($dataedit){
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Succesfully Updated');
                        window.location.href='../../kategoris/index';
                        </script>");
                }
            }
        }
           
        else{
            $kategoris = $this->kategoriModel->showKategori();

            $data = [
                'kategoris' => $kategoris
            ];

            $this->view('kategoris/index', $data);
        }
    }
}

