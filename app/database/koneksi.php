<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_bebas5";

try {
    $configs = new PDO("mysql:host=$host;dbname=$dbname;", $user,$pass);
} catch(PDOException $e) {
    die("Koneksi gagal : ".$e->getMessage());
}

?>