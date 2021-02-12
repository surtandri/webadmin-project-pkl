<?php

class Merks extends Controller
{
    public function __construct()
    {
        $this->merkModel = $this->model('Merk');
    }

    public function index(){
        $merks = $this->merkModel->showMerk();

        $data = [
            'merks' => $merks
        ];

        $this->view('merks/index', $data);
        
    }

    public function tambahMerk(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'merk' =>trim($_POST['merk']),
            ];
           
            if ($this->merkModel->lacakMerk($data['merk'])){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Merk sudah terdaftar!');
                            window.location.href='merks/index';
                            </script>");
                            
            }else{
                if($this->merkModel->tambahMerk($data)){
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Succesfully Added');
                            window.location.href='../merks/index';
                            </script>");
                    
                }else{
                    redirect('merks/index');
                }
            }
        }

        else{
            $data = [
                'merks' => '',
            ];

            $this->view('merks/index', $data);
        }
    }

    public function deleteMerk($id)
    {
        if ($this->merkModel->deleteMerk($id)){
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Succesfully Delete!');
                     window.location.href='../merks/index';
                    </script>");
        } else{
            die("Terjadi kesalahan");
        }
    }

    public function updateMerk($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
            
            $data = [
                'id' => $id,
                'nama' => trim($_POST['nama']),    
            ];
            
            if ($this->merkModel->lacakMerk($data['nama'])){
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Update gagal! Merk ini sudah terdaftar!');
                            window.location.href='../../merks/index';
                            </script>");
            }else{
                $dataedit = $this->merkModel->updateMerk($data);

                if($dataedit){
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Succesfully Updated');
                        window.location.href='../../merks/index';
                        </script>");
                }
            }
        }
           
        else{
            $merks = $this->merkModel->showMerk();

            $data = [
                'merks' => $merks
            ];

            $this->view('merks/index', $data);
        }
    }
}
