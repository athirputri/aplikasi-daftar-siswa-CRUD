<?php
session_start();
include("connection.php");


if (isset($_POST['id'])) {
    $name = $_POST['nama'];
    $class = $_POST['kelas'];
    $age = $_POST['umur'];
    $major = $_POST['jurusan'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE students SET nama='$nama', kelas='$kelas', umur='$umur', jurusan='$jurusan', keterangan='$keterangan' id='$id'";

    if ($connections->query($sql)) {
        session_start();
        $_SESSION['updated'] = "students has been updated";
        header("location: http://localhost/aplikasi-daftar-siswa/");
        $connections->close();
    }

    die();
}

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id=$id";

$student = mysqli_query($connections, $sql);

$connections->close();
