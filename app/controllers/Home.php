<?php
// NB = PENAMAAN FILE DENGAN CONTROLER (CLASS) HARUS SAMA JIKA TIDAK AKAN ERROR
class Home extends Controller
{
    // karena prottected methodmya = "index", maka yang akan muncul ke web deafault yaitu isi dari function index
    public function index()
    {
        $data["judul"] = "Home";
        $data["nama"] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data); // $data untuk mengamil dari judul header
        $this->view('home/index', $data); // cara bacanya : panggil this->view yg artinya mengrarahkan ke folder views, lalu di dlm folder view, masuk ke dalam folder home, setelah itu di dlm folder home ada file index.php
        $this->view('templates/footer');
    }
}
