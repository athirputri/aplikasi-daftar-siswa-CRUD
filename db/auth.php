<?php
session_start();
include("connection.php");

$email = $_POST['email'];
$password = $_POST['password'];

if ($email == "" || $password == "") {
    $_SESSION['error'] = "All field must be filled";
    header("Location: http://localhost/aplikasi-daftar-siswa-CRUD/login.php");
    die();
}

$sql = "SELECT * FROM users WHERE email='$email'";
$user = mysqli_query($connections, $sql);

// var_dump($user->num_rows);

if ($user->num_rows == 0) {
    $_SESSION['error'] = "email is not registered";
    header("Location: http://localhost/aplikasi-daftar-siswa-CRUD/login.php");
    die();
}


$auth = $user->fetch_assoc();

// var_dump($auth);

if (password_verify($password, $auth['password'])) {
    $_SESSION['is_login'] = true;
    $_SESSION['full_name'] = $auth['full_name'];
    $_SESSION['email'] = $auth['full_name'];
    header("Location: http://localhost/aplikasi-daftar-siswa-CRUD/index.php");
    die();
}

$_SESSION['error'] = "wrong password";
header("Location: http://localhost/aplikasi-daftar-siswa-CRUD/login.php");
die();