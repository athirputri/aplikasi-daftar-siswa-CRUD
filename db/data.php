<?php
session_start();
if(isset($_SESSION['is auth']) == false) {
    header ('location: http://localhost/aplikasi-daftar-siswa-CRUD/login.php');
}

include("connection.php");

$students = [];

$sql = "SELECT * FROM students";

$students = mysqli_query($connections, $sql);

$connections->close();
