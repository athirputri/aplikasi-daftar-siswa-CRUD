<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'data_absensi';

$connections = new mysqli($server, $username, $password, $db_name);

if ($connections->connect_error) {
    die("Connection FAILED: " . $$connections->connect_error);
}

// echo "Connections Success";
