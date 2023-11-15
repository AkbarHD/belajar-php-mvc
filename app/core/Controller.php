<?php
// jadi kesimpulan config.php, App.php, Controller.hp, Database.php, itu saling keterhubungan di index.php jadi dia tdk perlu require lagi
// akses untuk kita bisa menuju ke view dan models
//controller ini diibaratka di posisikan di index.php jadi dia hanya perlu keluar 1 folder
class Controller
{
    // pramater $views ini utk mengambil apa yg diketika di url
    // method ini untuk mengarahkan ke tampilan (views)  
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php'; // ini di posisikan di index
    }

    // method ini untuk mengarahkan ke tampilan (models)
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php'; // ini di posisikan di index
        return new $model; // karna dia class maka kita harus instansiasi dlu
    }
}
