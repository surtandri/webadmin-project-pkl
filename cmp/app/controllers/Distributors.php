<?php

class Distributors extends Controller
{
    public function __construct()
    {
        $this->distributorModel = $this->model('Distributor');
    }

    public function index(){
        $distributors = $this->distributorModel->showDistributor();

        $data = [
            'distributors' => $distributors
        ];

        $this->view('distributors/index', $data);
    }

    public function tambahDistributor(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'nama' =>trim($_POST['nama']),
                'sales' =>trim($_POST['sales']),
                'hp' =>trim($_POST['hp']),
                'alamat' =>trim($_POST['alamat']),
            ];
   
            if ($this->distributorModel->lacakDistributor($data['nama'])){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Merk sudah terdaftar!');
                            window.location.href='../distributors/index';
                            </script>");
                            
            }else{
                if($this->distributorModel->tambahDistributor($data)){
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Succesfully Added');
                            window.location.href='../distributors/index';
                            </script>");
                    
                }else{
                    redirect('distributors/index');
                }
            }
        }

        else{
            $data = [
                'nama' => '',
                'sales' => '',
                'hp' => '',
                'alamat' => '',
            ];
            $this->view('distributors/index', $data);
        }
    }

    public function deleteDistributor($id)
    {
        if ($this->distributorModel->deleteDistributor($id)){
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Succesfully Delete!');
                     window.location.href='../distributors/index';
                    </script>");
        } else{
            die("Terjadi kesalahan");
        }
    }

    public function detailDistributor($id)
    {
        $distributors = $this->distributorModel->showDetailDistributor($id);

        $data = [
            'distributors' => $distributors
        ];

        $this->view('distributors/index', $data);
    }

    public function updateDistributor($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  

            $data = [
                'id' => $id,
                'id' => trim($_POST['id']), 
                'nama' => trim($_POST['nama']), 
                'sales' => trim($_POST['sales']),    
                'hp' => trim($_POST['hp']), 
                'alamat' => trim($_POST['alamat']), 
            ];
            
            if ($this->distributorModel->lacakInfoDistributor($data)){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Update gagal! Distributor ini sudah terdaftar!');
                            window.location.href='../../distributors/index';
                            </script>");
            }else{
                $dataedit = $this->distributorModel->updateDistributor($data);

                if($dataedit){
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Succesfully Updated');
                        window.location.href='../../distributors/index';
                        </script>");
                }
            }
        }
           
        else{
            $distributors = $this->distributorModel->showDistributor();

            $data = [
                'distributors' => $distributors
            ];

            $this->view('distributors/index', $data);
        }
    }
}

