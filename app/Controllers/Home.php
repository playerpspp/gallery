<?php

namespace App\Controllers;

use App\Models\M_model;
use CodeIgniter\Controller;


class Home extends BaseController
{

    protected function checkAuth()
    {
        $id_user = session()->get('id_user');
        if ($id_user != null) {
            return true;
        } else {
            return false;
        }
    }
    public function index()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/login'));
        }
        $model = new M_model;
       $on='images.user_id=user.IDuser';
       $on2='images.album_id=album.IDalbum';
        $data['data']=$model->super('images','user','album',$on,$on2);
        echo view('pages/home',$data);
        // echo view('layout/_footer');
    }

    public function login()
    {
        if ($this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        
        echo view('pages/login');
    }

   

    public function log_out()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }
        $model= new M_model();

        $log=array(
            'log'=>"User melakukan Logout",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

         session()->destroy();
         return redirect()->to('/home');

     
    }


    public function act_login()
    {
        $n=$this->request->getPost('username'); //mengambil username dan password dari halaman Login
        $p=$this->request->getPost('password');

        // $captchaResponse = $this->request->getPost('g-recaptcha-response');
        // $captchaSecretKey = '6Ldj-MknAAAAACrxYKprUQ33wh34tQx2VnSJCqUY';

        // $verifyCaptchaResponse = file_get_contents(
        //     "https://www.google.com/recaptcha/api/siteverify?secret={$captchaSecretKey}&response={$captchaResponse}"
        // );

        // $captchaData = json_decode($verifyCaptchaResponse);

        // if (!$captchaData->success) {
       
        //     session()->setFlashdata('error', 'CAPTCHA verification failed. Please try again.');
        //     return redirect()->to(base_url('/Home/login'));
        // }

        $model= new M_model();
        $where=array(
             'username'=>$n, //memasukan username dan password ke satu STRING($) 
             'password'=>md5($p)
 
         );
       

        $user = $model->getRowArray('user', $where);
        if (!empty($user)) {
       
         session()->set('id_user', $user['IDuser']);
         session()->set('nama', $user['nama_user']);
        //  session()->set('email', $user['email']);
        //  session()->set('role', $user['level']);
         session()->set('foto', $user['foto']);
        // print_r(session()->get());

    }else{
        return redirect()->to(base_url('/home/login'));
    }
        $log=array(
            'log'=>"User melakukan login",
            'log_user'=>session()->get('id_user'),
            'datetime'=>date('Y-m-d H:i:s' ),
        );
        $model->simpan('log', $log);

         return redirect()->to(base_url('/home'));
        
     
    }

   
    

    public function SignUp()
    {
       
        echo view('layout2/head');
        echo view('layout2/nav');
        $model=new M_model;

        $data['types']=$model->tampil('kamartype');
        
        echo view('pages/signup',$data);
        echo view('layout2/foot');
        
    }

    

    public function fetch_albums()
    {
       

        $model = new M_model;
        $where=array('album.user_id'=> session()->get('id_user'));
        $albums=$model->getWhere('album',$where);
        return $this->response->setJSON(['albums' => $albums]);
    }

    public function check_like($id)
    {
       

        $model = new M_model;
        $where=array(
            'user_id'=> session()->get('id_user'),
            'image_id'=> $id,
    );
        $like=$model->getRowArray('likes',$where);
       $response = array(
                        'status' => $like['status'],
                    );

echo json_encode(array('response' => $response));
    }

    public function like($id)
    {
       

        $model = new M_model;
        $where=array(
            'user_id'=> session()->get('id_user'),
            'image_id'=> $id,
    );
        $like=$model->getRowArray('likes',$where);

        if(empty($like)){
       $data= array(
       'user_id'=> session()->get('id_user'),
            'image_id'=> $id,
            'status'=>"Y"
        );
   $model->simpan('likes',$data);
}elseif(!empty($like) && $like->status == "Y"){
    $data= array(
            'status'=>"N"
        );
   $model->edit('likes',$data,$where);
}elseif(!empty($like) && $like->status == "N"){
    $data= array(
            'status'=>"Y"
        );
   $model->edit('likes',$data,$where);
}
$response[] = array(
                        'status' => $data['status'],
                    );

echo json_encode(array('response' => $response));
    }

    public function add_gallery()
    {

        // Get form data
        $model = new M_model;
        $title = $this->request->getPost('pictureTitle');
        $description = $this->request->getPost('description');
        $albumId = $this->request->getPost('album');
        $image = $this->request->getFile('image');

       

        // $posts = $model->getWhere('images',['user_id'=> session()->get('user_id')]);
 // Process and store the uploaded image (adjust path as needed)
        $newImageName = session()->get('id_user') . "_" . time() . "_" . $image->getRandomName();
        $image->move(PUBLIC_PATH . '/assets/images/gallery/', $newImageName);

        // Store other details in the database
        $data = array(
            'nama_image' => $title,
            'deskripsi_image' => $description,
            'image' => $newImageName,
            'album_id' => $albumId,
            'user_id' => session()->get('id_user')
        );
        $model->simpan('images', $data);

        // Return a success message
        return $this->response->setJSON(['success' => 'Gallery added successfully']);
    }

    public function delete($id)
    {
       
        $model=new M_model();
        $where=array('IDimage'=>$id);

       
        $model->hapus('images', $where);

        return $this->response->setJSON(['success' => 'Gallery deleted successfully']);
    }

    
}
