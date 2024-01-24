<?php

namespace App\Controllers;

use App\Models\M_model;
use CodeIgniter\Controller;


class Profile extends BaseController
{

    protected function checkAuth()
    {
        $id_user = session()->get('id_user');
        $role = session()->get('role');
        if ($id_user != null) {
            return true;
        } else {
            return false;
        }
    }


    public function index()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $model = new M_model();

        if(session()->get('level') != 3){
        $on='users.levelID=level.idLevel';
        $on2='users.idUser=petugas.userID';
            $where =array('userID'=> session()->get('id_user'));
            $user['user'] = $model->super_row('users','level','petugas',$on,$on2, $where);
        }else{
            $on='users.levelID=level.idLevel';
        $on2='users.idUser=pelanggan.userID';
            $where =array('userID'=> session()->get('id_user'));
            $user['user'] = $model->super_row('users','level','pelanggan',$on,$on2, $where);
        }

        echo view('users/profile',$user);

    }
    public function self()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $model = new M_model();
        if(session()->get('level') != 3){
            $on='users.levelID=level.idLevel';
            $on2='users.idUser=petugas.userID';
                $where =array('userID'=> session()->get('id_user'));
                $user['user'] = $model->super_row('users','level','petugas',$on,$on2, $where);
            }else{
                $on='users.levelID=level.idLevel';
            $on2='users.idUser=pelanggan.userID';
                $where =array('userID'=> session()->get('id_user'));
                $user['user'] = $model->super_row('users','level','pelanggan',$on,$on2, $where);
            }
       

        echo view('users/self',$user);

    }

    public function password()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }

        echo view('users/password');

    }

    public function actprofile()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $photo  = $this->request->getFile('foto');

        $id = session()->get('id_user');
        $username= $this->request->getPost('username');
        $email= $this->request->getPost('email');
        $where=array('idUser'=>$id);
        // $where2=array('userID'=>$id);

        if( $_FILES['foto']['error'] !=4 && !empty(session()->get('foto')) ){

            unlink(PUBLIC_PATH."/assets/images/avatar/".session()->get('foto'));
            
            $img = $photo->getRandomName();
            $photo->move(PUBLIC_PATH.'/assets/images/avatar/',$img);
             session()->remove('foto');
        }
        elseif( $_FILES['foto']['error'] !=4)  
            {
               

                $img = $photo->getRandomName();
                $photo->move(PUBLIC_PATH.'/assets/images/avatar/',$img);
                        session()->set('foto', $img);
            }
       if(!empty(session()->get('foto')) && empty($img)){

            $user=array(
                'username'=>$username,
                'email'=>$email,
            );
        }else{
            $user=array(
                'username'=>$username,
                'email'=>$email,
                'foto'=>$img
            );

            session()->remove('foto');
            session()->set('foto', $img);
        }
        // print_r($this->request->getPost());
        $model=new M_model();
        $model->edit('users', $user, $where);

       
        $log=array(
            'log'=>"User mengubah profil diri",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

       
        return redirect()->to(base_url('/profile'));
    }

    public function actself()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $id = session()->get('id_user');
        $nama= $this->request->getPost('name');
        $NIK= $this->request->getPost('NIK');

        if(session()->get('level') != 3){
            $where=array('userID'=>$id);

            $petugas=array(
                'nama'=>$nama,
                'NIK'=>$NIK,
            );
        
        // print_r($this->request->getPost());
        $model=new M_model();
        $model->edit('petugas', $petugas, $where);
        }else{
            $where=array('userID'=>$id);

            $pelanggan=array(
                'nama'=>$nama,
                'NIK'=>$NIK,
            );
        
        // print_r($this->request->getPost());
        $model=new M_model();
        $model->edit('pelanggan', $pelanggan, $where);

       }

       
           

        session()->remove('nama');
        session()->set('nama', $nama);

        $log=array(
            'log'=>"User mengubah data diri",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);
       
        return redirect()->to(base_url('/profile/self'));
    }

    public function actpassword()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $model=new M_model();


        $id         = session()->get('id_user');
        $old        = $this->request->getPost('password_old');
        $password   = $this->request->getPost('password');
        $confirm    = $this->request->getPost('password_confirmation');

        $where      =array('id_user'=>$id);
        $cek        =$model->getRow('users', $where);
        // $where2=array('user_id'=>$id);

        if($password === $confirm && md5($old) == $cek->password) {
            // $pass = md5($password);
            $user = array(
                'password'=> md5($password)
            );
        // print_r($this->request->getPost());
            $model->edit('users', $user, $where);
        }else{
// Load the session library
            $session = session();

// Set the error message
            $session->setFlashdata('error', 'password does not match');

            return redirect()->back()->withInput();

        }

        $log=array(
            'log'=>"User mengubah password",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);


        return redirect()->to(base_url('/home/log_out'));
    }




}
