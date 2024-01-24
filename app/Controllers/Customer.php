<?php

namespace App\Controllers;

use App\Models\M_model;
use CodeIgniter\Controller;


class Customer extends BaseController
{
    protected function checkAuth()
    {
        $id_user = session()->get('id_user');
        $role = session()->get('role');
        if ($id_user != null && $role == "Admin") {
            return true;
        } else {
            return false;
        }
    }
    public function index()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $model = new M_model;
        $on='users.idUser=pelanggan.userID';
        $on2='pelanggan.tarifID=tarif.idTarif';

        $data['pelanggan']=$model->super('users','pelanggan','tarif',$on,$on2);
        echo view('data/customer/customer', $data);
    }

    // public function detail($id)
    // {
    //     if (!$this->checkAuth()) {
    //         return redirect()->to(base_url('/home/dashboard'));
    //     }

    //     $model = new M_model;
    //     $on2='users.levelID=level.idLevel';
    //     $on='users.idUser=pelanggan.userID';
    //     $where =array('id_user'=>$id);
    //     $data['pelanggan'] = $model->super_row('users','pelanggan','level',$on,$on2,$where);
    //     echo view('data/customer/detail', $data);
    // }

    public function input()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }

        $model=new M_model;
        $data['tarif']=$model->tampil('tarif');

        echo view('data/customer/input', $data);
    }

    public function actinput()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }

        $username= $this->request->getPost('username');
        $name= $this->request->getPost('name');
        $NIK= $this->request->getPost('NIK');
        $NIP= $this->request->getPost('NIP');
        // $hp= $this->request->getPost('nohp');
        // $tgl_lahir= $this->request->getPost('tgl_lahir');
        $alamat= $this->request->getPost('alamat');
        $tarif= $this->request->getPost('tarif');
        $password= $this->request->getPost('password');
        $email= $this->request->getPost('email');
        $role= '3';

        $user=array(
            'username'=>$username,
            'password'=>md5($password),
            'email'=>$email,
            'levelID'=>$role,
        );
        // print_r($this->request->getPost());
        $model=new M_model();
        $model->simpan('users', $user);
        $where=array('email'=>$email);
        $id=$model->getRowArray('users', $where);
        $iduser = $id['idUser'];

    // //Yang ditambah ke karyawan
        $pelanggan=array(
            'nama'=>$name,
            'NIK'=>$NIK,
            // 'NIP'=>$NIP,
            // 'noHp'=>$hp,
            // 'tanggal_lahir'=>$tgl_lahir,
            'alamat'=>$alamat,
            'tarifID'=>$tarif,
            'userID'=>$iduser,
        );
        $model->simpan('pelanggan', $pelanggan);

        $log=array(
            'log'=>"User memasukan data Users",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

        return redirect()->to(base_url('/customer'));
    }


    public function edit($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $model = new M_model();

        $model=new M_model;
        $data['tarif']=$model->tampil('tarif');
        $on='users.idUser=pelanggan.userID';
        $on2='pelanggan.tarifID=tarif.idTarif';
        $where =array('idUser'=>$id);
        $data['pelanggan'] = $model->super_row('users','pelanggan','tarif',$on,$on2,$where);

        // echo view('head');
        // echo view('nav');
        echo view('data/customer/edit',$data);
        // echo view('footer');

    }

    public function actedit()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }

        $username= $this->request->getPost('username');
        $name= $this->request->getPost('name');
        $NIK= $this->request->getPost('NIK');
        $NIP= $this->request->getPost('NIP');
        // $hp= $this->request->getPost('nohp');
        // $tgl_lahir= $this->request->getPost('tgl_lahir');
        $alamat= $this->request->getPost('alamat');
        // $role= $this->request->getPost('role');
        $tarif= $this->request->getPost('tarif');
        $id= $this->request->getPost('id');

        $where=array('idUser'=>$id);
        $where2=array('userID'=>$id);

        $user=array(
            'username'=>$username,
        );
        // print_r($this->request->getPost());
        $model=new M_model();
        $model->edit('users', $user, $where);

    // //Yang ditambah ke karyawan
    $pelanggan=array(
        'nama'=>$name,
        'NIK'=>$NIK,
        'alamat'=>$alamat,
        'tarifID'=>$tarif,
    );
        $model->edit('pelanggan', $pelanggan, $where2);
        // print_r($where2);

         $log=array(
            'log'=>"User mengubah data pada Users",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

        return redirect()->to(base_url('/customer'));
    }

    public function delete($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $model=new M_model();
        $where=array('idUser'=>$id);
        $where2=array('userID'=>$id);
        $model->hapus('pelanggan',$where2);
        $model->hapus('users',$where);

         $log=array(
            'log'=>"User menghapus data pada Users",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

        return redirect()->to(base_url('/customer'));
    }


    public function reset($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }

        $where=array('idUser'=>$id);
        $user=array(
            'password'=>md5(12345)
        );
        // print_r($this->request->getPost());
        $model=new M_model();
        $model->edit('users', $user, $where);

    // //Yang ditambah ke karyawan
  

         $log=array(
            'log'=>"User mereset password Pelanggan",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

        return redirect()->to(base_url('/customer'));
    }


}