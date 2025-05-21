<?php
require 'config.php';

function limpiar($valor) {
    return htmlspecialchars(trim($valor));
}

$campos = ['fecha', 'par', 'base', 'quote', 'tipo', 'precio', 'cantidad', 'total', 'fee', 'moneda_fee'];
$datos = [];

foreach ($campos as $campo) {
    if (!isset($_POST[$campo]) || $_POST[$campo] === '') {
        die("Error: Falta completar el campo: " . htmlspecialchars($campo));
    }
    $datos[$campo] = limpiar($_POST[$campo]);
}

// 🔁 Corrección de formato de fecha (reemplaza 'T' por un espacio)
$datos['fecha'] = str_replace('T', ' ', $datos['fecha']);

// 🔁 Redondear precio y total a 3 decimales
$datos['precio'] = round(floatval($datos['precio']), 3);
$datos['total']  = round(floatval($datos['total']), 3);

// También podemos redondear 'cantidad' y 'fee' si querés consistencia
$datos['cantidad'] = round(floatval($datos['cantidad']), 8);
$datos['fee']      = round(floatval($datos['fee']), 8);

$stmt = $conn->prepare("INSERT INTO operaciones (fecha, par, base, quote, tipo, precio, cantidad, total, fee, moneda_fee)
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Error en la preparación de la sentencia: " . $conn->error);
}

$stmt->bind_param("sssssdddds",
    $datos['fecha'],
    $datos['par'],
    $datos['base'],
    $datos['quote'],
    $datos['tipo'],
    $datos['precio'],
    $datos['cantidad'],
    $datos['total'],
    $datos['fee'],
    $datos['moneda_fee']
);

if ($stmt->execute()) {
    // Redirección con mensaje a index.php
    header("Location: index.php?mensaje=ok");
    exit;
} else {
    echo "<h2>❌ Error al insertar la operación: " . $stmt->error . "</h2>";
}

$stmt->close();
$conn->close();
?>
