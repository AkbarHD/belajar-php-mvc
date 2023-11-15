<?php
if (!session_id()) session_start(); // jika tdk ada session id maka jalankan session start
require_once '../app/init.php';

new App;
