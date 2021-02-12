<?php

class Users extends Controller
{
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password'])
            ];

            $loggedIn = $this->userModel->login($data['username'], $data['password']);

            if($loggedIn){
                echo "<script> alert('Selamat Datang!');</script>";
                $this->createSessionLogin($loggedIn);
            }else{
                echo "<script> alert('Terjadi Kesalahan! Silahkan Login Kembali!');</script>";
                redirect('users/login');
            }
        }

        else{
            $data = [
                'username' => '',
                'password' => ''
            ];

            $this->view('users/login', $data);
        }
    }

    public function createSessionLogin($row)
    {
        $_SESSION['id'] = $row->id;
        $_SESSION['username'] = $row->username;
        $_SESSION['role'] = $row->role;
        
        if ($_SESSION['role'] == "admin") {
            redirect('admins/home');
        }else{
            redirect('pages/index'); 
        }
    }

    public function logOut()
    {
        unset($_SESSION['username']);

        session_destroy();

        redirect('users/login');
    }

}