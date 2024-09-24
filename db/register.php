<?php
include('connection.php');

session_start();

$full_name = htmlspecialchars($_POST['full_name']);
$email = htmlspecialchars($_POST['email']);
// $password = md5($_POST ['full_name']);
$password = password_hash($_POST['full_name'], PASSWORD_DEFAULT);

if ($full_name == '' || $email == '' || $_POST['password'] == '') {
    $_SESSION['error'] = "all field must to be filled";
    $_SESSION['full_name'] = $full_name;
    $_SESSION['email'] = $email;
    header('location: http://localhost/aplikasi-daftar-siswa-CRUD/register.php');
    die();
}

$sql = "INSERT INTO users(full_name, email, password) VALUES ('$full_name', '$email', '$password');";

if ($connections->query($sql)) {
    session_start();
    $_SESSION['message'] = "students has been added";
    header("location: http://localhost/aplikasi-daftar-siswa-CRUD/");
    $connections->close();

    die();
}