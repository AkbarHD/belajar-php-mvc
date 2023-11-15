<?php
// perbedaam extend, static, intansiasi
// extend :  jadi kita bisa menggunakan method di dlm class
// instansiasi :  jadi kita menggunakan method di dlm class
// static :  kita tdk perlu intansiasi 
// jadi kesimpulan config.php, App.php, Controller.hp, Database.php, itu saling keterhubungan di index.php jadi dia tdk perlu require lagi
//base url
define("BASEURL", "http://localhost/phpmvc/public");

//Dataabse
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'phpmvc');
