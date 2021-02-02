<?php

class Pages extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        if (isLoggedIn()){
            if($_SESSION['role'] == "admin"){
                $this->view('admin/index');
            }
        }
        else{
            $this->view('pages/index');
        }
    }
}
    