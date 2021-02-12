<?php

class Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function index(){
        if (isLoggedIn()){
            if($_SESSION['role'] == "admin"){
                $this->view('admins/home');
            }
        }
        else{
            $this->view('pages/index');
        }
    }

    public function profil()
    {
        $id_user = $_SESSION['id'];
        
        $profil = $this->adminModel->profil($id_user);

        $data=[
            'profil' => $profil
        ];

        $this->view('admins/profil', $data);
    }

    public function updateDataProfil($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
            
            $profil= $this->adminModel->cariProfil($id);

            $data = [
                'id' => $id,
                'nama' => trim($_POST['nama']),
                'email' => trim($_POST['email']),
                'telepon' => trim($_POST['telepon']),
                'nik' => trim($_POST['nik']),
                'alamat' => trim($_POST['alamat']),        
            ];

            $dataedit = $this->adminModel->updateDataProfil($data);

            if($dataedit){
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Succesfully Updated');
                    window.location.href='../../admins/profil';
                    </script>");
            }

        else{
            $profil= $this->adminrModel->cariProfil($id);
        
            $data = [
                'profil' => $profil
            ];

            $this->view('admins/profil', $data);
        }
    }
    }

}