<?php

// mengelola table mahasiswa
class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database; // jd dia bisa menggunakan funggsi database
    }


    public function getAllMahasiswa()
    {
        // jadi ini kan seharusnya $this->stmt = $this->dbh->preppare("Select * Form mahasiswa)
        $this->db->query('SELECT * FROM ' . $this->table); //query itu dpt dari function query yang ada di folder core fi;e database
        return $this->db->resultset();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount(); // unutk mngembalikan nilai 1
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }
}
