<?php
// jadi kesimpulan config.php, App.php, Controller.hp, Database.php, itu saling keterhubungan di index.php jadi dia tdk perlu require lagi
// app ini berisikan : apa mengelola apa yang akan di ketikan oleh user
//App.php ini diibaratka di posisikan di index.php jadi dia hanya perlu keluar 1 folder karna dia di instansiasikan di index.php
class App
{
    // proteced adalah propert utk inisialisa sebagai default
    protected $controller = 'Home'; // jd ini kita inisialiasikan sbg default utama, jika penulisan url salah maka kita akan jadiakan sebagai default ke home
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseURL(); // jalankan fungsi url

        //controller
        //kita cek ada ga sebuah file di dlm folder controller yang namanya filenya sesauai yg kita tulis di url
        //nah krna di protected kita jadikan controller difaultnya Home maka file Home lah yg namaya harus sesuai
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {  // ini tu mulai dari index.php yang ada di publiv
            $this->controller = $url[0]; // kita timpa dengan url / controller yang baru
            unset($url[0]); // ini dihilangkan karna untuk params, jd yang ada di url itu hanya params saja jika ada
            // echo "<pre>";
            //     var_dump($url);
            // echo "<pre>";
        }

        //instansiasi menjadi controller yang baru
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]); // ini dihilangkan karna untuk params, jd yang ada di url itu hanya params saja jika ada
            }
        }

        //params
        //jika tidak kosong / jika ada
        if (($url)) {
            // ambil data params
            $this->params = array_values($url);
            // var_dump($url);
        }

        // jalankan controller dan method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // bikin method yang bertugas untuk mengambil url lalu memecah dengan sesuai keinginan kita
    public function parseURL()
    {
        // jika urlnya di set
        if (isset($_GET['url'])) {
            // lalu kita masukan url ini ke dalam variable
            $url = rtrim($_GET['url'], '/');  // retrim utk menghilangan karakter tertentu, disitu kita ingin menghilangkan tanda miring / slash di akhir
            $url = filter_var($url, FILTER_SANITIZE_URL); // bersihkan url dari karakter" yang ngaco atau ada yang ngehack
            $url = explode('/', $url); // pecah url nya menggunakan delimiter / (tanda miring), jadi nnti tanda miring ilang kita ambil isi urlya 
            return $url;
        } else {
            $url = [$this->controller];
            return $url;
        }
    }
}
