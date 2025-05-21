<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Operación</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Ingreso de Operación Crypto</h1>

    <?php
    // Verifica si el parámetro 'mensaje' existe en la URL y si su valor es 'ok'
    if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'ok') {
    ?>
        <div style="color: green; font-weight: bold; margin-bottom: 10px;">
            ✅ Operación registrada con éxito
        </div>
    <?php
    }
    // Si quisieras mostrar errores pasados por URL, podrías añadir otro 'if' aquí:
    // if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error') { ... }
    ?>

    <form action="procesar.php" method="post" id="formularioOperacion">
        <label>Fecha: <input type="datetime-local" name="fecha" id="fecha" required></label>

        <label>Par: <input type="text" name="par" id="par" required placeholder="Ej: BTC/USDT o BTCUSDT"></label>

        <label>Base: <input type="text" name="base" id="base" required readonly></label>
        <label>Quote: <input type="text" name="quote" id="quote" value="USDT" required readonly></label>

        <label>Tipo:
            <select name="tipo" id="tipo" required>
                <option value="BUY">Compra</option>
                <option value="SELL">Venta</option>
            </select>
        </label>

        <label>Precio: <input type="number" step="0.00000001" name="precio" id="precio" required></label>
        <label>Cantidad: <input type="number" step="0.00000001" name="cantidad" id="cantidad" required></label>

        <label>Total: <input type="number" step="0.00000001" name="total" id="total" required readonly></label>
        <label>Fee: <input type="number" step="0.00000001" name="fee" id="fee" value="0.00001969" required></label>

        <label>Moneda del Fee: <input type="text" name="moneda_fee" id="moneda_fee" value="BNB" required readonly></label>
        <button type="submit">Registrar</button>
    </form>

    <div id="messages"></div>

    #/mnt/c/Users/xpabl/OneDrive/Escritorio/PhpNotes/phpExe/Bichance

</body>
</html>