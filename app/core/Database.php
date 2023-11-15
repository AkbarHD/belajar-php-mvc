<?php
// jadi kesimpulan config.php, App.php, Controller.hp, Database.php, itu saling keterhubungan di index.php jadi dia tdk perlu require lagi
//file database ini unutk mengelola relative database yang bisa di jalankan di semua fungsi
//database ini diibaratka di posisikan di index.php jadi dia hanya perlu keluar 1 folder
use function PHPSTORM_META\type;

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; //database handler = utk menampung koneksi ke database 
    private $stmt; //buat nyimpen query

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name; // ini cmn setup saja 

        //UNTUK OPTIMASI DATABASE
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // kenapa kita perlu jabaran satu"? karna unutk menghindari sql injection dan lebih aman 
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute()
    {
        $this->stmt->execute();
    }

    //JIKA DATANYA BANYAK PAKAI YANG INI
    public function resultset()
    {
        // $this->stmt->execute(); // jika manual tanpa menggnkn function bisa gunain ini
        $this->execute(); // execute dsn itu dia memanggil function
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //jika datanya hanya 1 saja
    public function single()
    {
        // $this->stmt->execute(); // jika manual tanpa menggnkn function bisa gunain ini
        $this->execute(); // execute dsn itu dia memanggil function       
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
