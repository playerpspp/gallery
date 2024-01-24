<?php

namespace App\Controllers;

use App\Models\M_model;
use CodeIgniter\Controller;


class Settings extends BaseController
{
    protected function checkAuth(){
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

        $where=array('dipakai'=>'Y');

         $data['hotel']=$model->getRow('hotel',$where);
       
        echo view('settings/edit',$data);

        // echo view('settings/settings', $data);
        // print_r($data);
    }


    
    public function edit($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $model = new M_model();

        $model=new M_model;

        $where =array('id_hotel'=>$id);
        $data['hotel']=$model->getRow('hotel',$where);
        // echo view('head');
        // echo view('nav');
        echo view('settings/edit',$data);
        // echo view('footer');

    }

    public function actedit()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }

        $model=new M_model();


        $photo  = $this->request->getFile('foto');
        $id     = $this->request->getPost('id');
        $nama  = $this->request->getPost('nama');
       
        $where= array('id_hotel'=>$id);
        $cek=$model->getRow('hotel',$where);
        // print_r($_FILES['foto']['error']);
        if( $_FILES['foto']['error'] !=4 && !empty($cek->foto) ){

            unlink(PUBLIC_PATH."/assets/images/kamar/".$cek->foto);
            
            $img = $photo->getRandomName();
            $photo->move(PUBLIC_PATH.'/assets/images/kamar/',$img);
        }
        elseif( $_FILES['foto']['error'] !=4)  
            {
               

                $img = $photo->getRandomName();
                $photo->move(PUBLIC_PATH.'/assets/images/kamar/',$img);
            }

    if(!empty($cek->foto) && empty($img) ){
        $hotel=array(
            'nama_hotel'=>$nama,
            'logo_hotel'=>$cek->foto,
        );
    }else{
        $hotel=array(
            'nama_hotel'=>$nama,
            'logo_hotel'=>$img,
        );
    }
        $model->edit('hotel', $hotel, $where);

        if($cek->dipakai == "Y"){
            session()->remove('hotel');
            session()->set('hotel', $nama);
        }

        $log=array(
            'log'=>"User mengubah settingan web",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

        return redirect()->to(base_url('/settings'));
    
        // print_r($this->request->getPost());
       
    }

    // public function input()
    // {
    //     if (!$this->checkAuth()) {
    //         return redirect()->to(base_url('/home'));
    //     }

    //     $model=new M_model;

    //     echo view('settings/input');
    // }

    // public function actinput()
    // {
    //     if (!$this->checkAuth()) {
    //         return redirect()->to(base_url('/home'));
    //     }

    //     $photo= $this->request->getFile('foto');
    //     if( $_FILES['foto']['error'] !=4)  
    //         {
               

    //             $img = $photo->getRandomName();
    //             $photo->move(PUBLIC_PATH.'/assets/images/logo/',$img);
    //         }
       

    //     $nama= $this->request->getPost('nama');


    //     $model=new M_model();
    //     if(empty($img)){
    //         $hotel=array(
    //             'nama_hotel'=>$nama,
    //             'logo_hotel'=>'',
    //             'dipakai'=>'N',
    //         );
    //     }else{
    //         $hotel=array(
    //             'nama_hotel'=>$nama,
    //             'logo_hotel'=>$img,
    //             'dipakai'=>'N',
    //         );
    //     }
    //     $model->simpan('hotel', $hotel);
    //     return redirect()->to(base_url('/settings'));
    

    // }

    // public function select($id)
    // {
    //     if (!$this->checkAuth()) {
    //         return redirect()->to(base_url('/home'));
    //     }
    //     $model = new M_model();

    //     $model   =    new M_model;
    //     $where   =array('dipakai'=>'Y');
    //     $where2  =array('id_hotel'=>$id);
    //     $disable =array( 
    //         'dipakai'=>'N',
    //     );
    //     $enable=array(
            
    //         'dipakai'=>'Y',
    //     );
    
    //     $model->edit('hotel', $disable, $where);
    //     $model->edit('hotel', $enable, $where2);

    //     $hotel = $model->getRow('hotel',$where2);

    //     session()->remove('hotel');
    //     session()->set('hotel', $hotel->nama_hotel);
        
    //     return redirect()->to(base_url('/settings'));

    // }



    // public function delete($id)
    // {
    //     if (!$this->checkAuth()) {
    //         return redirect()->to(base_url('/home'));
    //     }
    //     $model=new M_model();
    //     $where=array('id_hotel'=>$id);
    //     $cek=$model->getRow('hotel',$where);
    //     if($cek->dipakai == "N"){
    //     $model->hapus('hotel',$where);
    //     }
    //     return redirect()->to(base_url('/settings'));
    // }



}