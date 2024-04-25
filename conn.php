<?php 

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "ccexam";
$conn = null;

try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  
}


 ?>