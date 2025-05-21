<?php
$host = 'localhost';
$user = 'pablo';
$password = 'usuario';
$database = 'Bichance';

$conn = @new mysqli($host, $user, $password, $database);

// Verificar errores de conexión
if ($conn->connect_error) {
    die('❌ Conexión fallida: (' . $conn->connect_errno . ') ' . $conn->connect_error);
} else {
    // Opcional: para verificar conexión exitosa
    // echo '✅ Conexión exitosa a la base de datos.';
}
?>
