<?php
session_start();
include("connection.php");

$name = htmlspecialchars($_POST['name']);
$class = strip_tags($_POST['kelas']);
$age = htmlspecialchars($_POST['umur']);
$major = addslashes($_POST['jurusan']);
$keterangan = htmlspecialchars($_POST['keterangan']);

$sql = "INSERT INTO students(name, kelas, umur, jurusan, keterangan) VALUES ('$name', '$class', $age, '$major', '$keterangan');";

if ($connections->query($sql)) {
    session_start();
    $_SESSION['message'] = "students has been added";
    header("location: http://localhost/aplikasi-daftar-siswa-CRUD/");
    $connections->close();

    die();
}

echo "Error: " . $sql . "<br>" . $connections->error;
$connections->close();
