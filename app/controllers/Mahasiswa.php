<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data["judul"] = "Data Mahasiswa";
        $data["mhs"] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data["judul"] = "Detail Mahasiswa";
        $data["mhs"] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        // jika berhasil
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success'); // ini isi parameter di setflash, karena dia static jadi tdk perlu intansiasi
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else { // jika gagal
            Flasher::setFlash('gagal', 'ditambahkan', 'danger'); // ini isi parameter di setflash
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        // jika berhasil
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success'); // ini isi parameter di setflash, karena dia static jadi tdk perlu intansiasi
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else { // jika gagal
            Flasher::setFlash('gagal', 'dihapus', 'danger'); // ini isi parameter di setflash
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data["judul"] = "Data Mahasiswa";
        $data["mhs"] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
