<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'pablo';
$password = 'usuario';
$database = 'Bichance';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('❌ Conexión fallida: ' . $conn->connect_error);
}

echo "✅ Conexión exitosa a la base de datos.";
