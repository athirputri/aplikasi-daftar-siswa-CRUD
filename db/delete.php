<?php
session_start();
include('connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";

if ($connections->query($sql)) {
    session_start();
    $_SESSION['delete'] = "students has been deleted";
    header("location: http://localhost/aplikasi-daftar-siswa/");
    $connections->close();

    die();
}
