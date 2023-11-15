<?php 
    class About extends Controller{
        public function index($nama = 'akbar', $profesi = 'progammer') {
            // utk paramater yg bisa dikirimkan di url
            $data["nama"] = $nama;
            $data["profesi"] = $profesi;
            $data["judul"] = "About";
            $this->view('templates/header', $data);
            $this->view('about/index', $data);
            $this->view('templates/footer');
        }
        public function page(){
            $data["judul"] = "About | page";
            $this->view('templates/header', $data);
            $this->view('about/page');
            $this->view('templates/footer');
        }

    }
