<?php

# Proses koneksi ke database dengan MySQLi

$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'uji_level';

$con = mysqli_connect($hostname, $username, $password, $database);
