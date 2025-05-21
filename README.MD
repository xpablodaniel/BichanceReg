# Proyecto de Registro de Operaciones Crypto en PHP y Mysql

Este proyecto es un ejemplo básico de una aplicación web sencilla para registrar operaciones de compra y venta de criptomonedas a través de un formulario HTML/PHP, almacenando los datos en una base de datos MariaDB/MySQL. Utiliza JavaScript para interactividad en el formulario y demuestra el uso de funciones almacenadas en la base de datos.

\#\# Características

\* Formulario web para ingreso de operaciones (Fecha, Par, Tipo, Precio, Cantidad, Fee, Moneda del Fee).  
\* Auto-llenado de Fecha/Hora actual en el formulario.  
\* Auto-llenado de los campos "Base" y "Quote" basado en el campo "Par" (soporta formatos \`BASE/QUOTE\` y \`BASEQUOTE\` si el quote es USDT por defecto).  
\* Cálculo automático del "Total" (Precio \\\* Cantidad) en el formulario.  
\* Almacenamiento de datos en una tabla \`operaciones\` en MariaDB/MySQL.  
\* Uso de sentencias preparadas en PHP para una inserción segura en la base de datos.  
\* Mensaje de confirmación de registro exitoso al enviar el formulario.  
\* Configuración de conexión a base de datos externa.  
\* Ejemplo de uso de una Función Almacenada para calcular el balance de una divisa.

\#\# Requisitos

\* Servidor Web (como Apache o Nginx) con soporte para PHP.  
\* PHP (versión 5.6 o superior recomendada, compatible con \`mysqli\`).  
\* Servidor de Base de Datos MariaDB o MySQL.

\#\# Estructura del Proyecto

La estructura de archivos del proyecto es la siguiente:  
/tu\_proyecto/   
├── index.php \# Archivo principal con el formulario HTML y lógica PHP para mostrar mensajes.   
├── procesar.php \# Archivo PHP para procesar los datos del formulario e insertar en la DB. ├── script.js \# Archivo JavaScript para la interactividad del formulario (fechas, cálculo, parsing de par).  
├── style.css \# Archivo CSS para dar estilos básicos al formulario.   
└── config.php \# Archivo PHP con la configuración de conexión a la base de datos.

\#\# Configuración y Puesta en Marcha \#\#\#   
1\. Configuración de la Base de Datos MariaDB/MySQL Primero, necesitas crear la base de datos y la tabla \`operaciones\`. Conéctate a tu servidor MariaDB/MySQL (usando la línea de comandos \`mysql\` o una herramienta gráfica como phpMyAdmin, Adminer, DBeaver, etc.) y ejecuta las siguientes sentencias SQL: 

\`\`\`sql  
 \-- Crear la base de datos (si no existe)  
CREATE DATABASE IF NOT EXISTS Bichance;  
 \-- Usar la base de datos USE Bichance;  
 \-- Crear la tabla 'operaciones' CREATE TABLE IF NOT EXISTS operaciones (  
id INT AUTO\_INCREMENT PRIMARY KEY,   
fecha TEXT,  \-- Considerar cambiar a DATETIME o TIMESTAMP en un proyecto más robusto   
par VARCHAR(255),   
base VARCHAR(255),  
 quote VARCHAR(255),  
 tipo VARCHAR(255), \-- BUY o SELL  
 precio DOUBLE,   
cantidad DOUBLE,  
 total DOUBLE,  
 fee DOUBLE,   
moneda\_fee VARCHAR(255)  
 );  
 \-- Opcional pero recomendado para mejorar el rendimiento en consultas por 'base' o 'tipo' CREATE INDEX idx\_operaciones\_base ON operaciones (base);  
CREATE INDEX idx\_operaciones\_tipo ON operaciones (tipo);  
 \-- Si consultas mucho por base Y tipo, un índice compuesto podría ser útil  
 \-- CREATE INDEX idx\_operaciones\_base\_tipo ON operaciones (base, tipo);  
\`\`\`

¡Excelente\! Me parece una gran idea documentar este proyecto colaborativo en un archivo README.md. Será muy útil para ti como referencia y para compartir si alguien más quiere aprender o utilizarlo.

Aquí tienes el contenido completo para tu archivo `README.md`, incluyendo la estructura del proyecto, el código de cada archivo, la configuración de la base de datos y la función almacenada, así como el documento sobre Stored Procedures y Prepared Statements.

Markdown  
\# Proyecto Simple de Registro de Operaciones Crypto en PHP y MariaDB

Este proyecto es un ejemplo básico de una aplicación web sencilla para registrar operaciones de compra y venta de criptomonedas a través de un formulario HTML/PHP, almacenando los datos en una base de datos MariaDB/MySQL. Utiliza JavaScript para interactividad en el formulario y demuestra el uso de funciones almacenadas en la base de datos.

\#\# Características

\* Formulario web para ingreso de operaciones (Fecha, Par, Tipo, Precio, Cantidad, Fee, Moneda del Fee).  
\* Auto-llenado de Fecha/Hora actual en el formulario.  
\* Auto-llenado de los campos "Base" y "Quote" basado en el campo "Par" (soporta formatos \`BASE/QUOTE\` y \`BASEQUOTE\` si el quote es USDT por defecto).  
\* Cálculo automático del "Total" (Precio \\\* Cantidad) en el formulario.  
\* Almacenamiento de datos en una tabla \`operaciones\` en MariaDB/MySQL.  
\* Uso de sentencias preparadas en PHP para una inserción segura en la base de datos.  
\* Mensaje de confirmación de registro exitoso al enviar el formulario.  
\* Configuración de conexión a base de datos externa.  
\* Ejemplo de uso de una Función Almacenada para calcular el balance de una divisa.

\#\# Requisitos

\* Servidor Web (como Apache o Nginx) con soporte para PHP.  
\* PHP (versión 5.6 o superior recomendada, compatible con \`mysqli\`).  
\* Servidor de Base de Datos MariaDB o MySQL.

\#\# Estructura del Proyecto

La estructura de archivos del proyecto es la siguiente:

/tu\_proyecto/ ├── index.php \# Archivo principal con el formulario HTML y lógica PHP para mostrar mensajes. ├── procesar.php \# Archivo PHP para procesar los datos del formulario e insertar en la DB. ├── script.js \# Archivo JavaScript para la interactividad del formulario (fechas, cálculo, parsing de par). ├── style.css \# Archivo CSS para dar estilos básicos al formulario. └── config.php \# Archivo PHP con la configuración de conexión a la base de datos.

\#\# Configuración y Puesta en Marcha

### **1\. Configuración de la Base de Datos MariaDB/MySQL**

Primero, necesitas crear la base de datos y la tabla \`operaciones\`. Conéctate a tu servidor MariaDB/MySQL (usando la línea de comandos \`mysql\` o una herramienta gráfica como phpMyAdmin, Adminer, DBeaver, etc.) y ejecuta las siguientes sentencias SQL:

\`\`\`sql  
\-- Crear la base de datos (si no existe)  
CREATE DATABASE IF NOT EXISTS Bichance;

\-- Usar la base de datos  
USE Bichance;

\-- Crear la tabla 'operaciones'  
CREATE TABLE IF NOT EXISTS operaciones (  
    id INT AUTO\_INCREMENT PRIMARY KEY,  
    fecha TEXT, \-- Considerar cambiar a DATETIME o TIMESTAMP en un proyecto más robusto  
    par VARCHAR(255),  
    base VARCHAR(255),  
    quote VARCHAR(255),  
    tipo VARCHAR(255), \-- BUY o SELL  
    precio DOUBLE,  
    cantidad DOUBLE,  
    total DOUBLE,  
    fee DOUBLE,  
    moneda\_fee VARCHAR(255)  
);

\-- Opcional pero recomendado para mejorar el rendimiento en consultas por 'base' o 'tipo'  
CREATE INDEX idx\_operaciones\_base ON operaciones (base);  
CREATE INDEX idx\_operaciones\_tipo ON operaciones (tipo);  
\-- Si consultas mucho por base Y tipo, un índice compuesto podría ser útil  
\-- CREATE INDEX idx\_operaciones\_base\_tipo ON operaciones (base, tipo);  
\`\`\`

**Nota sobre Permisos de Creación:**

La creación de la base de datos, tablas, índices y funciones almacenadas requiere permisos suficientes en el servidor MariaDB/MySQL. Típicamente, el usuario `root` tiene estos permisos. Si usas otro usuario, asegúrate de que tenga los privilegios `CREATE DATABASE`, `CREATE TABLE`, `CREATE INDEX`, `CREATE ROUTINE`, etc., sobre la base de datos `Bichance`.

### **2\. Configuración de Conexión (`config.php`)**

Edita el archivo `config.php` con los detalles de tu conexión a la base de datos:

\`\`\`php

\<?php

$host \= 'localhost'; // O la IP/nombre del servidor de la DB

$user \= 'pablo';     // Tu usuario de base de datos

$password \= 'usuario'; // Tu contraseña de base de datos

$database \= 'Bichance'; // El nombre de la base de datos que creaste

$conn \= @new mysqli($host, $user, $password, $database);

// Verificar errores de conexión

if ($conn-\>connect\_error) {

    // En un entorno de producción, es mejor no mostrar detalles del error al usuario final

    die('❌ Conexión fallida: (' . $conn-\>connect\_errno . ') ' . $conn-\>connect\_error);

} else {

    // Opcional: para verificar conexión exitosa (comentar o eliminar en producción)

    // echo '✅ Conexión exitosa a la base de datos.';

}

?\>

\`\`\`

Reemplaza `'localhost'`, `'pablo'`, `'usuario'` y `'Bichance'` con tus datos de conexión.

### **3\. Archivos del Proyecto**

Coloca los archivos `index.php`, `procesar.php`, `script.js`, `style.css` y `config.php` dentro de un directorio en tu servidor web (por ejemplo, `htdocs/bichance/` si usas XAMPP/Apache).

### **4\. Crear la Función Almacenada (Opcional pero Recomendado)**

Como discutimos, una forma útil de consultar el balance de una divisa es usando una función almacenada. Puedes crearla ejecutando el siguiente código SQL en tu base de datos `Bichance`:

\`\`\`sql  
USE Bichance;

DELIMITER $$ \-- Cambiamos el delimitador temporalmente

CREATE FUNCTION calcular\_balance\_divisa (divisa\_base VARCHAR(255))  
RETURNS DOUBLE \-- Indicamos que la función devolverá un valor de tipo DOUBLE  
READS SQL DATA \-- Indica que la función solo lee datos de las tablas  
BEGIN  
    DECLARE balance DOUBLE; \-- Declaramos una variable para almacenar el resultado

    \-- Calculamos la suma condicional (BUYs positivos, SELLs negativos)  
    SELECT SUM(case when tipo \= 'BUY' THEN cantidad when tipo \= 'SELL' THEN \-cantidad else 0 END)  
    INTO balance \-- Guardamos el resultado de la suma en la variable 'balance'  
    FROM operaciones  
    WHERE base \= divisa\_base; \-- Filtramos por la divisa\_base que recibimos como parámetro

    RETURN balance; \-- Devolvemos el valor calculado  
END$$

DELIMITER ; \-- Restauramos el delimitador original

\`\`\`

¡Excelente\! Me parece una gran idea documentar este proyecto colaborativo en un archivo README.md. Será muy útil para ti como referencia y para compartir si alguien más quiere aprender o utilizarlo.

Aquí tienes el contenido completo para tu archivo `README.md`, incluyendo la estructura del proyecto, el código de cada archivo, la configuración de la base de datos y la función almacenada, así como el documento sobre Stored Procedures y Prepared Statements.

Markdown  
\# Proyecto Simple de Registro de Operaciones Crypto en PHP y MariaDB

Este proyecto es un ejemplo básico de una aplicación web sencilla para registrar operaciones de compra y venta de criptomonedas a través de un formulario HTML/PHP, almacenando los datos en una base de datos MariaDB/MySQL. Utiliza JavaScript para interactividad en el formulario y demuestra el uso de funciones almacenadas en la base de datos.

\#\# Características

\* Formulario web para ingreso de operaciones (Fecha, Par, Tipo, Precio, Cantidad, Fee, Moneda del Fee).  
\* Auto-llenado de Fecha/Hora actual en el formulario.  
\* Auto-llenado de los campos "Base" y "Quote" basado en el campo "Par" (soporta formatos \`BASE/QUOTE\` y \`BASEQUOTE\` si el quote es USDT por defecto).  
\* Cálculo automático del "Total" (Precio \\\* Cantidad) en el formulario.  
\* Almacenamiento de datos en una tabla \`operaciones\` en MariaDB/MySQL.  
\* Uso de sentencias preparadas en PHP para una inserción segura en la base de datos.  
\* Mensaje de confirmación de registro exitoso al enviar el formulario.  
\* Configuración de conexión a base de datos externa.  
\* Ejemplo de uso de una Función Almacenada para calcular el balance de una divisa.

\#\# Requisitos

\* Servidor Web (como Apache o Nginx) con soporte para PHP.  
\* PHP (versión 5.6 o superior recomendada, compatible con \`mysqli\`).  
\* Servidor de Base de Datos MariaDB o MySQL.

\#\# Estructura del Proyecto

La estructura de archivos del proyecto es la siguiente:

/tu\_proyecto/ ├── index.php \# Archivo principal con el formulario HTML y lógica PHP para mostrar mensajes. ├── procesar.php \# Archivo PHP para procesar los datos del formulario e insertar en la DB. ├── script.js \# Archivo JavaScript para la interactividad del formulario (fechas, cálculo, parsing de par). ├── style.css \# Archivo CSS para dar estilos básicos al formulario. └── config.php \# Archivo PHP con la configuración de conexión a la base de datos.

\#\# Configuración y Puesta en Marcha

\#\#\# 1\. Configuración de la Base de Datos MariaDB/MySQL

Primero, necesitas crear la base de datos y la tabla \`operaciones\`. Conéctate a tu servidor MariaDB/MySQL (usando la línea de comandos \`mysql\` o una herramienta gráfica como phpMyAdmin, Adminer, DBeaver, etc.) y ejecuta las siguientes sentencias SQL:

\`\`\`sql  
\-- Crear la base de datos (si no existe)  
CREATE DATABASE IF NOT EXISTS Bichance;

\-- Usar la base de datos  
USE Bichance;

\-- Crear la tabla 'operaciones'  
CREATE TABLE IF NOT EXISTS operaciones (  
    id INT AUTO\_INCREMENT PRIMARY KEY,  
    fecha TEXT, \-- Considerar cambiar a DATETIME o TIMESTAMP en un proyecto más robusto  
    par VARCHAR(255),  
    base VARCHAR(255),  
    quote VARCHAR(255),  
    tipo VARCHAR(255), \-- BUY o SELL  
    precio DOUBLE,  
    cantidad DOUBLE,  
    total DOUBLE,  
    fee DOUBLE,  
    moneda\_fee VARCHAR(255)  
);

\-- Opcional pero recomendado para mejorar el rendimiento en consultas por 'base' o 'tipo'  
CREATE INDEX idx\_operaciones\_base ON operaciones (base);  
CREATE INDEX idx\_operaciones\_tipo ON operaciones (tipo);  
\-- Si consultas mucho por base Y tipo, un índice compuesto podría ser útil  
\-- CREATE INDEX idx\_operaciones\_base\_tipo ON operaciones (base, tipo);

**Nota sobre Permisos de Creación:**

La creación de la base de datos, tablas, índices y funciones almacenadas requiere permisos suficientes en el servidor MariaDB/MySQL. Típicamente, el usuario `root` tiene estos permisos. Si usas otro usuario, asegúrate de que tenga los privilegios `CREATE DATABASE`, `CREATE TABLE`, `CREATE INDEX`, `CREATE ROUTINE`, etc., sobre la base de datos `Bichance`.

### **2\. Configuración de Conexión (`config.php`)**

Edita el archivo `config.php` con los detalles de tu conexión a la base de datos:

\`\`\`PHP  
\<?php  
$host \= 'localhost'; // O la IP/nombre del servidor de la DB  
$user \= 'pablo';     // Tu usuario de base de datos  
$password \= 'usuario'; // Tu contraseña de base de datos  
$database \= 'Bichance'; // El nombre de la base de datos que creaste

$conn \= @new mysqli($host, $user, $password, $database);

// Verificar errores de conexión  
if ($conn-\>connect\_error) {  
    // En un entorno de producción, es mejor no mostrar detalles del error al usuario final  
    die('❌ Conexión fallida: (' . $conn-\>connect\_errno . ') ' . $conn-\>connect\_error);  
} else {  
    // Opcional: para verificar conexión exitosa (comentar o eliminar en producción)  
    // echo '✅ Conexión exitosa a la base de datos.';  
}  
?\>  
\`\`\`

Reemplaza `'localhost'`, `'pablo'`, `'usuario'` y `'Bichance'` con tus datos de conexión.

### **3\. Archivos del Proyecto**

Coloca los archivos `index.php`, `procesar.php`, `script.js`, `style.css` y `config.php` dentro de un directorio en tu servidor web (por ejemplo, `htdocs/bichance/` si usas XAMPP/Apache).

### **4\. Crear la Función Almacenada (Opcional pero Recomendado)**

Como discutimos, una forma útil de consultar el balance de una divisa es usando una función almacenada. Puedes crearla ejecutando el siguiente código SQL en tu base de datos `Bichance`:

\`\`\`SQL  
USE Bichance;

DELIMITER $$ \-- Cambiamos el delimitador temporalmente

CREATE FUNCTION calcular\_balance\_divisa (divisa\_base VARCHAR(255))  
RETURNS DOUBLE \-- Indicamos que la función devolverá un valor de tipo DOUBLE  
READS SQL DATA \-- Indica que la función solo lee datos de las tablas  
BEGIN  
    DECLARE balance DOUBLE; \-- Declaramos una variable para almacenar el resultado

    \-- Calculamos la suma condicional (BUYs positivos, SELLs negativos)  
    SELECT SUM(case when tipo \= 'BUY' THEN cantidad when tipo \= 'SELL' THEN \-cantidad else 0 END)  
    INTO balance \-- Guardamos el resultado de la suma en la variable 'balance'  
    FROM operaciones  
    WHERE base \= divisa\_base; \-- Filtramos por la divisa\_base que recibimos como parámetro

    RETURN balance; \-- Devolvemos el valor calculado  
END$$

DELIMITER ; \-- Restauramos el delimitador original  
\`\`\`

Una vez creada, puedes consultar el balance de una divisa (ej: BCH) ejecutando `SELECT calcular_balance_divisa('BCH');` en tu cliente SQL.

## **Uso**

1. Abre tu navegador web y navega a la URL donde desplegaste el proyecto (ej: `http://localhost/bichance/` o `http://tu_dominio/bichance/`).  
2. Verás el formulario de registro de operaciones.  
3. Llena los campos. Al ingresar el "Par" (ej: `ETH/USDT`), los campos "Base" (ETH) y "Quote" (USDT) se auto-llenarán. Al ingresar "Precio" y "Cantidad", el campo "Total" se calculará automáticamente.  
4. Haz clic en el botón "Registrar".  
5. Si la operación se registra con éxito, serás redirigido a `index.php` y verás el mensaje de éxito en la parte superior de la página. Si falla, verás un mensaje de error.

## **Código de los Archivos**

Aquí se incluye el código completo de cada archivo del proyecto para referencia:

### **`index.php`**

\`\`\`php  
\<\!DOCTYPE html\>  
\<html lang="es"\>  
\<head\>  
    \<meta charset="UTF-8"\>  
    \<meta name="viewport" content="width=device-width, initial-scale=1.0"\>  
    \<title\>Registrar Operación\</title\>  
    \<link rel="stylesheet" href="style.css"\>  
    \<script src="script.js" defer\>\</script\>  
\</head\>  
\<body\>  
    \<h1\>Ingreso de Operación Crypto\</h1\>

    \<?php  
    // Verifica si el parámetro 'mensaje' existe en la URL y si su valor es 'ok'  
    if (isset($\_GET\['mensaje'\]) && $\_GET\['mensaje'\] \== 'ok') {  
    ?\>  
        \<div style="color: green; font-weight: bold; margin-bottom: 10px;"\>  
            ✅ Operación registrada con éxito  
        \</div\>  
    \<?php  
    }  
    // Si quisieras mostrar errores pasados por URL, podrías añadir otro 'if' aquí:  
    // if (isset($\_GET\['mensaje'\]) && $\_GET\['mensaje'\] \== 'error') { ... }  
    ?\>

    \<form action="procesar.php" method="post" id="formularioOperacion"\>  
        \<label\>Fecha: \<input type="datetime-local" name="fecha" id="fecha" required\>\</label\>

        \<label\>Par: \<input type="text" name="par" id="par" required placeholder="Ej: BTC/USDT o BTCUSDT"\>\</label\>

        \<label\>Base: \<input type="text" name="base" id="base" required readonly\>\</label\>  
        \<label\>Quote: \<input type="text" name="quote" id="quote" value="USDT" required readonly\>\</label\>

        \<label\>Tipo:  
            \<select name="tipo" id="tipo" required\>  
                \<option value="BUY"\>Compra\</option\>  
                \<option value="SELL"\>Venta\</option\>  
            \</select\>  
        \</label\>

        \<label\>Precio: \<input type="number" step="0.00000001" name="precio" id="precio" required\>\</label\>  
        \<label\>Cantidad: \<input type="number" step="0.00000001" name="cantidad" id="cantidad" required\>\</label\>

        \<label\>Total: \<input type="number" step="0.00000001" name="total" id="total" required readonly\>\</label\>  
        \<label\>Fee: \<input type="number" step="0.00000001" name="fee" id="fee" value="0.00001969" required\>\</label\>

        \<label\>Moneda del Fee: \<input type="text" name="moneda\_fee" id="moneda\_fee" value="BNB" required readonly\>\</label\>  
        \<button type="submit"\>Registrar\</button\>  
    \</form\>

    \<div id="messages"\>\</div\>

\</body\>  
\</html\>

\`\`\`

### **`procesar.php`**

\`\`\`php  
\<?php  
require 'config.php';

// Función para limpiar y escapar datos (básico, considera usar más robustos si es necesario)  
function limpiar($valor) {  
    // Elimina espacios al inicio y final, y convierte caracteres especiales a entidades HTML  
    return htmlspecialchars(trim($valor));  
}

$campos \= \['fecha', 'par', 'base', 'quote', 'tipo', 'precio', 'cantidad', 'total', 'fee', 'moneda\_fee'\];  
$datos \= \[\];

// Validar y limpiar campos POST  
foreach ($campos as $campo) {  
    if (\!isset($\_POST\[$campo\]) || $\_POST\[$campo\] \=== '') {  
        // Si falta algún campo, muestra un error y detiene la ejecución  
        die("Error: Falta completar el campo: " . htmlspecialchars($campo));  
    }  
    $datos\[$campo\] \= limpiar($\_POST\[$campo\]);  
}

// 🔁 Corrección de formato de fecha si viene de input\[type="datetime-local"\] (reemplaza 'T' por un espacio)  
$datos\['fecha'\] \= str\_replace('T', ' ', $datos\['fecha'\]);

// 🔁 Redondear valores numéricos a una precisión adecuada antes de insertar  
// Esto ayuda a evitar problemas de precisión flotante en la base de datos y al mostrar  
// Se usan floatval() para asegurar que los datos sean tratados como números  
$datos\['precio'\] \= round(floatval($datos\['precio'\]), 8); // Usar una precisión mayor para precios/cantidades  
$datos\['cantidad'\] \= round(floatval($datos\['cantidad'\]), 8);  
$datos\['total'\] \= round(floatval($datos\['total'\]), 8);  
$datos\['fee'\] \= round(floatval($datos\['fee'\]), 8);

// Preparar la sentencia SQL para insertar datos  
// Se usan placeholders (?) para prevenir inyecciones SQL  
$stmt \= $conn-\>prepare("INSERT INTO operaciones (fecha, par, base, quote, tipo, precio, cantidad, total, fee, moneda\_fee)  
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Verificar si la preparación de la sentencia fue exitosa  
if ($stmt \=== false) {  
    // Muestra un error si la preparación falla  
    die("Error en la preparación de la sentencia: " . $conn-\>error);  
}

// Vincular los parámetros con los valores limpios de los datos POST  
// La cadena "sssssdddds" especifica los tipos de datos de los parámetros:  
// s \= string, d \= double (o float/decimal), i \= integer, b \= blob  
$stmt-\>bind\_param("ssssddddds",  
    $datos\['fecha'\],  
    $datos\['par'\],  
    $datos\['base'\],  
    $datos\['quote'\],  
    $datos\['tipo'\],  
    $datos\['precio'\],  
    $datos\['cantidad'\],  
    $datos\['total'\],  
    $datos\['fee'\],  
    $datos\['moneda\_fee'\]  
);

// Ejecutar la sentencia preparada  
if ($stmt-\>execute()) {  
    // Si la ejecución es exitosa, redirigir a index.php con un mensaje de éxito  
    // El parámetro 'mensaje=ok' será leído por index.php  
    header("Location: index.php?mensaje=ok");  
    exit(); // Importante terminar el script después de una redirección  
} else {  
    // Si la ejecución falla, muestra un mensaje de error  
    // Considera redirigir también con un parámetro de error para consistencia  
    echo "\<h2\>❌ Error al insertar la operación: " . $stmt-\>error . "\</h2\>";  
    // Opcional: Redirigir con error \-\> header("Location: index.php?mensaje=error\&detalle=" . urlencode($stmt-\>error)); exit();  
}

// Cerrar la sentencia y la conexión a la base de datos  
$stmt-\>close();  
$conn-\>close();  
?\>  
Nota: He añadido `round(floatval(...), 8)` a los campos numéricos en `procesar.php` para manejar mejor la precisión de los puntos flotantes antes de la inserción, lo cual es una buena práctica.

\`\`\`

### **`script.js`**

\`\`\`Javascript

document.addEventListener('DOMContentLoaded', function() {  
    // \--- 1\. Establecer la fecha y hora actual \---  
    const fechaInput \= document.getElementById('fecha');  
    if (fechaInput) {  
        const now \= new Date();  
        // Formato\<ctrl97\>-MM-DDTHH:MM requerido por input type="datetime-local"  
        const year \= now.getFullYear();  
        const month \= (now.getMonth() \+ 1).toString().padStart(2, '0'); // getMonth() es base 0  
        const day \= now.getDate().toString().padStart(2, '0');  
        const hours \= now.getHours().toString().padStart(2, '0');  
        const minutes \= now.getMinutes().toString().padStart(2, '0');

        fechaInput.value \= \`${year}-${month}-${day}T${hours}:${minutes}\`;  
    }

    // \--- 2\. Llenar campo Base y Quote basado en Par (Corregido para usar '/') \---  
    const parInput \= document.getElementById('par');  
    const baseInput \= document.getElementById('base');  
    const quoteInput \= document.getElementById('quote'); // Necesitamos este input para actualizarlo también

    if (parInput && baseInput && quoteInput) {  
        parInput.addEventListener('input', function() {  
            const parValue \= parInput.value.trim().toUpperCase(); // Convertir a mayúsculas  
            const slashIndex \= parValue.indexOf('/'); // Buscar la posición del '/'

            // Verificar si se encontró el '/' y si hay texto antes y después de él  
            if (slashIndex \> 0 && slashIndex \< parValue.length \- 1\) {  
                // Si se encontró el '/' y no está ni al principio ni al final  
                const baseValue \= parValue.substring(0, slashIndex); // Parte antes del '/'  
                const quoteValue \= parValue.substring(slashIndex \+ 1); // Parte después del '/'

                baseInput.value \= baseValue;  
                quoteInput.value \= quoteValue; // Actualizamos también el campo quote

            } else {  
                // Si no se encontró el '/' o el formato no es el esperado (ej: "BTC/", "/USDT", "BTCUSDT")  
                // Aquí puedes decidir qué hacer. Una opción es intentar la lógica anterior (sin slash)  
                // si quieres soportar ambos formatos (con o sin slash).  
                // Otra opción es simplemente dejar los campos base y quote vacíos, forzando al usuario  
                // a usar el formato con slash para la auto-detección.  
                // Optaremos por dejar vacíos si el formato slash es incorrecto o no está presente,  
                // y si el quote es USDT, intentamos la lógica anterior como fallback.

                const quoteDefaultValue \= 'USDT'; // Valor por defecto o el que esperas sin slash  
                const quoteValue \= quoteInput.value.trim().toUpperCase(); // Valor actual del campo quote

                 if (parValue.endsWith(quoteValue) && parValue.length \> quoteValue.length) {  
                     // Lógica original: quitar el quote del final si termina con él  
                     const baseValue \= parValue.substring(0, parValue.length \- quoteValue.length);  
                     baseInput.value \= baseValue;  
                     // No cambiamos quoteInput.value aquí, ya que la lógica se basa en que el par termina en el quote actual  
                     // Podrías añadir una comprobación más estricta si quieres.  
                 } else if (parValue.endsWith(quoteDefaultValue) && parValue.length \> quoteDefaultValue.length) {  
                     // Fallback si el par termina en el quote DEFAULT (USDT) aunque el campo quote cambie  
                     const baseValue \= parValue.substring(0, parValue.length \- quoteDefaultValue.length);  
                     baseInput.value \= baseValue;  
                     quoteInput.value \= quoteDefaultValue; // Aseguramos que quote sea USDT en este caso  
                 }  
                 else {  
                    // Si ninguno de los formatos coincide, dejar vacíos  
                    baseInput.value \= '';  
                    quoteInput.value \= '';  
                 }  
            }  
        });  
    }

    // \--- 3\. Calcular Total basado en Precio y Cantidad \---  
    const precioInput \= document.getElementById('precio');  
    const cantidadInput \= document.getElementById('cantidad');  
    const totalInput \= document.getElementById('total');

    if (precioInput && cantidadInput && totalInput) {  
        // Función para calcular y actualizar el total  
        const calcularTotal \= function() {  
            const precio \= parseFloat(precioInput.value);  
            const cantidad \= parseFloat(cantidadInput.value);

            // Verificar si ambos valores son números válidos  
            if (\!isNaN(precio) && \!isNaN(cantidad)) {  
                const total \= precio \* cantidad;  
                // Considera redondear aquí si quieres precisión en la interfaz antes de enviar  
                // totalInput.value \= total.toFixed(8); // Ejemplo a 8 decimales  
                totalInput.value \= total;  
            } else {  
                // Si alguno no es un número, dejar el total vacío o 0  
                totalInput.value \= ''; // O 0, dependiendo de la preferencia  
            }  
        };

        // Agregar listeners para que el cálculo ocurra cada vez que cambien precio o cantidad  
        precioInput.addEventListener('input', calcularTotal);  
        cantidadInput.addEventListener('input', calcularTotal);  
    }

    // \--- 4\. y 5\. Fee y Moneda del Fee ya están predeterminados en el HTML \---  
    // No se necesita código JS adicional a menos que quisieras hacer algo dinámico con ellos.  
    // Solo como ejemplo, puedes verificar que los valores estén cargados al inicio:  
    // const feeInput \= document.getElementById('fee');  
    // const monedaFeeInput \= document.getElementById('moneda\_fee');  
    // if (feeInput && \!feeInput.value) feeInput.value \= '0.00001969';  
    // if (monedaFeeInput && \!monedaFeeInput.value) monedaFeeInput.value \= 'BNB';  
    // Esto no es necesario si ya los pones en el HTML con el atributo value.  
});

\`\`\`

### **`style.css`**

\`\`\`css

body {  
    font-family: Arial, sans-serif;  
    background: \#f3f6fa;  
    padding: 20px;  
    max-width: 600px;  
    margin: auto; /\* Centra el contenido \*/  
}

h1 {  
    color: \#333;  
    text-align: center;  
    margin-bottom: 20px; /\* Espacio debajo del título \*/  
}

form {  
    background: white;  
    padding: 20px;  
    border-radius: 8px;  
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
    display: flex; /\* Usa flexbox para organizar los labels \*/  
    flex-direction: column; /\* Apila los labels verticalmente \*/  
}

label {  
    display: block; /\* Asegura que cada label ocupe su propia línea \*/  
    margin-bottom: 15px; /\* Espacio entre labels \*/  
    font-weight: bold;  
}

/\* Estilo para inputs y selects dentro de labels \*/  
label input:not(\[type="checkbox"\]),  
label select {  
    display: block; /\* Hace que el input/select ocupe el ancho disponible bajo el label \*/  
    width: 100%; /\* Ocupa el 100% del ancho de su contenedor (el label) \*/  
    padding: 10px; /\* Aumenta el padding \*/  
    margin-top: 5px; /\* Espacio entre el texto del label y el input \*/  
    margin-bottom: 0; /\* Elimina el margin-bottom del input para que el label controle el espacio \*/  
    border-radius: 4px;  
    border: 1px solid \#ccc;  
    box-sizing: border-box; /\* Incluye padding y border en el ancho total \*/  
    font-size: 1rem; /\* Tamaño de fuente legible \*/  
}

/\* Estilo específico para grupos de inputs en la misma línea si los hay (ajustar si tu HTML cambia) \*/  
/\* Actualmente, todos son 'display: block', así que esto puede no ser necesario \*/  
/\*  
label.inline-group input {  
    width: auto;  
    margin-right: 10px;  
    display: inline-block;  
}  
\*/

button {  
    width: 100%;  
    padding: 12px; /\* Aumenta el padding del botón \*/  
    background: \#2d89ef;  
    color: white;  
    border: none;  
    border-radius: 5px;  
    font-size: 1rem; /\* Tamaño de fuente legible \*/  
    cursor: pointer; /\* Indica que es clickeable \*/  
    transition: background-color 0.3s ease; /\* Transición suave al pasar el mouse \*/  
    margin-top: 10px; /\* Espacio encima del botón \*/  
}

button:hover {  
    background: \#1b5fbf; /\* Color más oscuro al pasar el mouse \*/  
}

/\* Estilo para el mensaje de éxito/error \*/  
.success-message {  
    color: green;  
    font-weight: bold;  
    margin-bottom: 15px; /\* Espacio debajo del mensaje \*/  
    text-align: center; /\* Centra el texto \*/  
    padding: 10px;  
    background-color: \#e9ffeb; /\* Fondo suave \*/  
    border: 1px solid \#d0e9c6;  
    border-radius: 4px;  
}

.error-message {  
     color: red;  
     font-weight: bold;  
     margin-bottom: 15px;  
     text-align: center;  
     padding: 10px;  
     background-color: \#ffebeb;  
     border: 1px solid \#e9d0d0;  
     border-radius: 4px;  
}

\`\`\`  
Nota: Añadí algunos comentarios y pequeños ajustes al CSS para mejorar la legibilidad y el espaciado, además de clases `.success-message` y `.error-message` por si decides estilizarlos.

## **Base de Datos \- Estructura de la Tabla `operaciones`**

Aquí está la estructura de la tabla `operaciones` en MariaDB/MySQL:

\`\`\`sql

DESC operaciones;  
\+------------+--------------+------+-----+---------+----------------+  
| Field      | Type         | Null | Key | Default | Extra          |  
\+------------+--------------+------+-----+---------+----------------+  
| id         | int          | NO   | PRI | NULL    | auto\_increment |  
| fecha      | text         | YES  |     | NULL    |                |  
| par        | varchar(255) | YES  |     | NULL    |                |  
| base       | varchar(255) | YES  |     | NULL    |                |  
| quote      | varchar(255) | YES  |     | NULL    |                |  
| tipo       | varchar(255) | YES  |     | NULL    |                |  
| precio     | double       | YES  |     | NULL    |                |  
| cantidad   | double       | YES  |     | NULL    |                |  
| total      | double       | YES  |     | NULL    |                |  
| fee        | double       | YES  |     | NULL    |                |  
| moneda\_fee | varchar(255) | YES  |     | NULL    |                |  
\+------------+--------------+------+-----+---------+----------------+  
\`\`\`

¡Excelente\! Me parece una gran idea documentar este proyecto colaborativo en un archivo README.md. Será muy útil para ti como referencia y para compartir si alguien más quiere aprender o utilizarlo.

Aquí tienes el contenido completo para tu archivo `README.md`, incluyendo la estructura del proyecto, el código de cada archivo, la configuración de la base de datos y la función almacenada, así como el documento sobre Stored Procedures y Prepared Statements.

Markdown  
\# Proyecto Simple de Registro de Operaciones Crypto en PHP y MariaDB

Este proyecto es un ejemplo básico de una aplicación web sencilla para registrar operaciones de compra y venta de criptomonedas a través de un formulario HTML/PHP, almacenando los datos en una base de datos MariaDB/MySQL. Utiliza JavaScript para interactividad en el formulario y demuestra el uso de funciones almacenadas en la base de datos.

\#\# Características

\* Formulario web para ingreso de operaciones (Fecha, Par, Tipo, Precio, Cantidad, Fee, Moneda del Fee).  
\* Auto-llenado de Fecha/Hora actual en el formulario.  
\* Auto-llenado de los campos "Base" y "Quote" basado en el campo "Par" (soporta formatos \`BASE/QUOTE\` y \`BASEQUOTE\` si el quote es USDT por defecto).  
\* Cálculo automático del "Total" (Precio \\\* Cantidad) en el formulario.  
\* Almacenamiento de datos en una tabla \`operaciones\` en MariaDB/MySQL.  
\* Uso de sentencias preparadas en PHP para una inserción segura en la base de datos.  
\* Mensaje de confirmación de registro exitoso al enviar el formulario.  
\* Configuración de conexión a base de datos externa.  
\* Ejemplo de uso de una Función Almacenada para calcular el balance de una divisa.

\#\# Requisitos

\* Servidor Web (como Apache o Nginx) con soporte para PHP.  
\* PHP (versión 5.6 o superior recomendada, compatible con \`mysqli\`).  
\* Servidor de Base de Datos MariaDB o MySQL.

\#\# Estructura del Proyecto

La estructura de archivos del proyecto es la siguiente:

/tu\_proyecto/ ├── index.php \# Archivo principal con el formulario HTML y lógica PHP para mostrar mensajes. ├── procesar.php \# Archivo PHP para procesar los datos del formulario e insertar en la DB. ├── script.js \# Archivo JavaScript para la interactividad del formulario (fechas, cálculo, parsing de par). ├── style.css \# Archivo CSS para dar estilos básicos al formulario. └── config.php \# Archivo PHP con la configuración de conexión a la base de datos.

\#\# Configuración y Puesta en Marcha

\#\#\# 1\. Configuración de la Base de Datos MariaDB/MySQL

Primero, necesitas crear la base de datos y la tabla \`operaciones\`. Conéctate a tu servidor MariaDB/MySQL (usando la línea de comandos \`mysql\` o una herramienta gráfica como phpMyAdmin, Adminer, DBeaver, etc.) y ejecuta las siguientes sentencias SQL:

\`\`\`sql  
\-- Crear la base de datos (si no existe)  
CREATE DATABASE IF NOT EXISTS Bichance;

\-- Usar la base de datos  
USE Bichance;

\-- Crear la tabla 'operaciones'  
CREATE TABLE IF NOT EXISTS operaciones (  
    id INT AUTO\_INCREMENT PRIMARY KEY,  
    fecha TEXT, \-- Considerar cambiar a DATETIME o TIMESTAMP en un proyecto más robusto  
    par VARCHAR(255),  
    base VARCHAR(255),  
    quote VARCHAR(255),  
    tipo VARCHAR(255), \-- BUY o SELL  
    precio DOUBLE,  
    cantidad DOUBLE,  
    total DOUBLE,  
    fee DOUBLE,  
    moneda\_fee VARCHAR(255)  
);

\-- Opcional pero recomendado para mejorar el rendimiento en consultas por 'base' o 'tipo'  
CREATE INDEX idx\_operaciones\_base ON operaciones (base);  
CREATE INDEX idx\_operaciones\_tipo ON operaciones (tipo);  
\-- Si consultas mucho por base Y tipo, un índice compuesto podría ser útil  
\-- CREATE INDEX idx\_operaciones\_base\_tipo ON operaciones (base, tipo);

**Nota sobre Permisos de Creación:**

La creación de la base de datos, tablas, índices y funciones almacenadas requiere permisos suficientes en el servidor MariaDB/MySQL. Típicamente, el usuario `root` tiene estos permisos. Si usas otro usuario, asegúrate de que tenga los privilegios `CREATE DATABASE`, `CREATE TABLE`, `CREATE INDEX`, `CREATE ROUTINE`, etc., sobre la base de datos `Bichance`.

### **2\. Configuración de Conexión (`config.php`)**

Edita el archivo `config.php` con los detalles de tu conexión a la base de datos:

PHP  
\<?php  
$host \= 'localhost'; // O la IP/nombre del servidor de la DB  
$user \= 'pablo';     // Tu usuario de base de datos  
$password \= 'usuario'; // Tu contraseña de base de datos  
$database \= 'Bichance'; // El nombre de la base de datos que creaste

$conn \= @new mysqli($host, $user, $password, $database);

// Verificar errores de conexión  
if ($conn-\>connect\_error) {  
    // En un entorno de producción, es mejor no mostrar detalles del error al usuario final  
    die('❌ Conexión fallida: (' . $conn-\>connect\_errno . ') ' . $conn-\>connect\_error);  
} else {  
    // Opcional: para verificar conexión exitosa (comentar o eliminar en producción)  
    // echo '✅ Conexión exitosa a la base de datos.';  
}  
?\>

Reemplaza `'localhost'`, `'pablo'`, `'usuario'` y `'Bichance'` con tus datos de conexión.

### **3\. Archivos del Proyecto**

Coloca los archivos `index.php`, `procesar.php`, `script.js`, `style.css` y `config.php` dentro de un directorio en tu servidor web (por ejemplo, `htdocs/bichance/` si usas XAMPP/Apache).

### **4\. Crear la Función Almacenada (Opcional pero Recomendado)**

Como discutimos, una forma útil de consultar el balance de una divisa es usando una función almacenada. Puedes crearla ejecutando el siguiente código SQL en tu base de datos `Bichance`:

SQL  
USE Bichance;

DELIMITER $$ \-- Cambiamos el delimitador temporalmente

CREATE FUNCTION calcular\_balance\_divisa (divisa\_base VARCHAR(255))  
RETURNS DOUBLE \-- Indicamos que la función devolverá un valor de tipo DOUBLE  
READS SQL DATA \-- Indica que la función solo lee datos de las tablas  
BEGIN  
    DECLARE balance DOUBLE; \-- Declaramos una variable para almacenar el resultado

    \-- Calculamos la suma condicional (BUYs positivos, SELLs negativos)  
    SELECT SUM(case when tipo \= 'BUY' THEN cantidad when tipo \= 'SELL' THEN \-cantidad else 0 END)  
    INTO balance \-- Guardamos el resultado de la suma en la variable 'balance'  
    FROM operaciones  
    WHERE base \= divisa\_base; \-- Filtramos por la divisa\_base que recibimos como parámetro

    RETURN balance; \-- Devolvemos el valor calculado  
END$$

DELIMITER ; \-- Restauramos el delimitador original

Una vez creada, puedes consultar el balance de una divisa (ej: BCH) ejecutando `SELECT calcular_balance_divisa('BCH');` en tu cliente SQL.

## **Uso**

1. Abre tu navegador web y navega a la URL donde desplegaste el proyecto (ej: `http://localhost/bichance/` o `http://tu_dominio/bichance/`).  
2. Verás el formulario de registro de operaciones.  
3. Llena los campos. Al ingresar el "Par" (ej: `ETH/USDT`), los campos "Base" (ETH) y "Quote" (USDT) se auto-llenarán. Al ingresar "Precio" y "Cantidad", el campo "Total" se calculará automáticamente.  
4. Haz clic en el botón "Registrar".  
5. Si la operación se registra con éxito, serás redirigido a `index.php` y verás el mensaje de éxito en la parte superior de la página. Si falla, verás un mensaje de error.

## **Código de los Archivos**

Aquí se incluye el código completo de cada archivo del proyecto para referencia:

### **`index.php`**

PHP  
\<\!DOCTYPE html\>  
\<html lang="es"\>  
\<head\>  
    \<meta charset="UTF-8"\>  
    \<meta name="viewport" content="width=device-width, initial-scale=1.0"\>  
    \<title\>Registrar Operación\</title\>  
    \<link rel="stylesheet" href="style.css"\>  
    \<script src="script.js" defer\>\</script\>  
\</head\>  
\<body\>  
    \<h1\>Ingreso de Operación Crypto\</h1\>

    \<?php  
    // Verifica si el parámetro 'mensaje' existe en la URL y si su valor es 'ok'  
    if (isset($\_GET\['mensaje'\]) && $\_GET\['mensaje'\] \== 'ok') {  
    ?\>  
        \<div style="color: green; font-weight: bold; margin-bottom: 10px;"\>  
            ✅ Operación registrada con éxito  
        \</div\>  
    \<?php  
    }  
    // Si quisieras mostrar errores pasados por URL, podrías añadir otro 'if' aquí:  
    // if (isset($\_GET\['mensaje'\]) && $\_GET\['mensaje'\] \== 'error') { ... }  
    ?\>

    \<form action="procesar.php" method="post" id="formularioOperacion"\>  
        \<label\>Fecha: \<input type="datetime-local" name="fecha" id="fecha" required\>\</label\>

        \<label\>Par: \<input type="text" name="par" id="par" required placeholder="Ej: BTC/USDT o BTCUSDT"\>\</label\>

        \<label\>Base: \<input type="text" name="base" id="base" required readonly\>\</label\>  
        \<label\>Quote: \<input type="text" name="quote" id="quote" value="USDT" required readonly\>\</label\>

        \<label\>Tipo:  
            \<select name="tipo" id="tipo" required\>  
                \<option value="BUY"\>Compra\</option\>  
                \<option value="SELL"\>Venta\</option\>  
            \</select\>  
        \</label\>

        \<label\>Precio: \<input type="number" step="0.00000001" name="precio" id="precio" required\>\</label\>  
        \<label\>Cantidad: \<input type="number" step="0.00000001" name="cantidad" id="cantidad" required\>\</label\>

        \<label\>Total: \<input type="number" step="0.00000001" name="total" id="total" required readonly\>\</label\>  
        \<label\>Fee: \<input type="number" step="0.00000001" name="fee" id="fee" value="0.00001969" required\>\</label\>

        \<label\>Moneda del Fee: \<input type="text" name="moneda\_fee" id="moneda\_fee" value="BNB" required readonly\>\</label\>  
        \<button type="submit"\>Registrar\</button\>  
    \</form\>

    \<div id="messages"\>\</div\>

\</body\>  
\</html\>

### **`procesar.php`**

PHP  
\<?php  
require 'config.php';

// Función para limpiar y escapar datos (básico, considera usar más robustos si es necesario)  
function limpiar($valor) {  
    // Elimina espacios al inicio y final, y convierte caracteres especiales a entidades HTML  
    return htmlspecialchars(trim($valor));  
}

$campos \= \['fecha', 'par', 'base', 'quote', 'tipo', 'precio', 'cantidad', 'total', 'fee', 'moneda\_fee'\];  
$datos \= \[\];

// Validar y limpiar campos POST  
foreach ($campos as $campo) {  
    if (\!isset($\_POST\[$campo\]) || $\_POST\[$campo\] \=== '') {  
        // Si falta algún campo, muestra un error y detiene la ejecución  
        die("Error: Falta completar el campo: " . htmlspecialchars($campo));  
    }  
    $datos\[$campo\] \= limpiar($\_POST\[$campo\]);  
}

// 🔁 Corrección de formato de fecha si viene de input\[type="datetime-local"\] (reemplaza 'T' por un espacio)  
$datos\['fecha'\] \= str\_replace('T', ' ', $datos\['fecha'\]);

// 🔁 Redondear valores numéricos a una precisión adecuada antes de insertar  
// Esto ayuda a evitar problemas de precisión flotante en la base de datos y al mostrar  
// Se usan floatval() para asegurar que los datos sean tratados como números  
$datos\['precio'\] \= round(floatval($datos\['precio'\]), 8); // Usar una precisión mayor para precios/cantidades  
$datos\['cantidad'\] \= round(floatval($datos\['cantidad'\]), 8);  
$datos\['total'\] \= round(floatval($datos\['total'\]), 8);  
$datos\['fee'\] \= round(floatval($datos\['fee'\]), 8);

// Preparar la sentencia SQL para insertar datos  
// Se usan placeholders (?) para prevenir inyecciones SQL  
$stmt \= $conn-\>prepare("INSERT INTO operaciones (fecha, par, base, quote, tipo, precio, cantidad, total, fee, moneda\_fee)  
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Verificar si la preparación de la sentencia fue exitosa  
if ($stmt \=== false) {  
    // Muestra un error si la preparación falla  
    die("Error en la preparación de la sentencia: " . $conn-\>error);  
}

// Vincular los parámetros con los valores limpios de los datos POST  
// La cadena "sssssdddds" especifica los tipos de datos de los parámetros:  
// s \= string, d \= double (o float/decimal), i \= integer, b \= blob  
$stmt-\>bind\_param("ssssddddds",  
    $datos\['fecha'\],  
    $datos\['par'\],  
    $datos\['base'\],  
    $datos\['quote'\],  
    $datos\['tipo'\],  
    $datos\['precio'\],  
    $datos\['cantidad'\],  
    $datos\['total'\],  
    $datos\['fee'\],  
    $datos\['moneda\_fee'\]  
);

// Ejecutar la sentencia preparada  
if ($stmt-\>execute()) {  
    // Si la ejecución es exitosa, redirigir a index.php con un mensaje de éxito  
    // El parámetro 'mensaje=ok' será leído por index.php  
    header("Location: index.php?mensaje=ok");  
    exit(); // Importante terminar el script después de una redirección  
} else {  
    // Si la ejecución falla, muestra un mensaje de error  
    // Considera redirigir también con un parámetro de error para consistencia  
    echo "\<h2\>❌ Error al insertar la operación: " . $stmt-\>error . "\</h2\>";  
    // Opcional: Redirigir con error \-\> header("Location: index.php?mensaje=error\&detalle=" . urlencode($stmt-\>error)); exit();  
}

// Cerrar la sentencia y la conexión a la base de datos  
$stmt-\>close();  
$conn-\>close();  
?\>

*Nota: He añadido `round(floatval(...), 8)` a los campos numéricos en `procesar.php` para manejar mejor la precisión de los puntos flotantes antes de la inserción, lo cual es una buena práctica.*

### **`script.js`**

JavaScript  
document.addEventListener('DOMContentLoaded', function() {  
    // \--- 1\. Establecer la fecha y hora actual \---  
    const fechaInput \= document.getElementById('fecha');  
    if (fechaInput) {  
        const now \= new Date();  
        // Formato\<ctrl97\>-MM-DDTHH:MM requerido por input type="datetime-local"  
        const year \= now.getFullYear();  
        const month \= (now.getMonth() \+ 1).toString().padStart(2, '0'); // getMonth() es base 0  
        const day \= now.getDate().toString().padStart(2, '0');  
        const hours \= now.getHours().toString().padStart(2, '0');  
        const minutes \= now.getMinutes().toString().padStart(2, '0');

        fechaInput.value \= \`${year}-${month}-${day}T${hours}:${minutes}\`;  
    }

    // \--- 2\. Llenar campo Base y Quote basado en Par (Corregido para usar '/') \---  
    const parInput \= document.getElementById('par');  
    const baseInput \= document.getElementById('base');  
    const quoteInput \= document.getElementById('quote'); // Necesitamos este input para actualizarlo también

    if (parInput && baseInput && quoteInput) {  
        parInput.addEventListener('input', function() {  
            const parValue \= parInput.value.trim().toUpperCase(); // Convertir a mayúsculas  
            const slashIndex \= parValue.indexOf('/'); // Buscar la posición del '/'

            // Verificar si se encontró el '/' y si hay texto antes y después de él  
            if (slashIndex \> 0 && slashIndex \< parValue.length \- 1\) {  
                // Si se encontró el '/' y no está ni al principio ni al final  
                const baseValue \= parValue.substring(0, slashIndex); // Parte antes del '/'  
                const quoteValue \= parValue.substring(slashIndex \+ 1); // Parte después del '/'

                baseInput.value \= baseValue;  
                quoteInput.value \= quoteValue; // Actualizamos también el campo quote

            } else {  
                // Si no se encontró el '/' o el formato no es el esperado (ej: "BTC/", "/USDT", "BTCUSDT")  
                // Aquí puedes decidir qué hacer. Una opción es intentar la lógica anterior (sin slash)  
                // si quieres soportar ambos formatos (con o sin slash).  
                // Otra opción es simplemente dejar los campos base y quote vacíos, forzando al usuario  
                // a usar el formato con slash para la auto-detección.  
                // Optaremos por dejar vacíos si el formato slash es incorrecto o no está presente,  
                // y si el quote es USDT, intentamos la lógica anterior como fallback.

                const quoteDefaultValue \= 'USDT'; // Valor por defecto o el que esperas sin slash  
                const quoteValue \= quoteInput.value.trim().toUpperCase(); // Valor actual del campo quote

                 if (parValue.endsWith(quoteValue) && parValue.length \> quoteValue.length) {  
                     // Lógica original: quitar el quote del final si termina con él  
                     const baseValue \= parValue.substring(0, parValue.length \- quoteValue.length);  
                     baseInput.value \= baseValue;  
                     // No cambiamos quoteInput.value aquí, ya que la lógica se basa en que el par termina en el quote actual  
                     // Podrías añadir una comprobación más estricta si quieres.  
                 } else if (parValue.endsWith(quoteDefaultValue) && parValue.length \> quoteDefaultValue.length) {  
                     // Fallback si el par termina en el quote DEFAULT (USDT) aunque el campo quote cambie  
                     const baseValue \= parValue.substring(0, parValue.length \- quoteDefaultValue.length);  
                     baseInput.value \= baseValue;  
                     quoteInput.value \= quoteDefaultValue; // Aseguramos que quote sea USDT en este caso  
                 }  
                 else {  
                    // Si ninguno de los formatos coincide, dejar vacíos  
                    baseInput.value \= '';  
                    quoteInput.value \= '';  
                 }  
            }  
        });  
    }

    // \--- 3\. Calcular Total basado en Precio y Cantidad \---  
    const precioInput \= document.getElementById('precio');  
    const cantidadInput \= document.getElementById('cantidad');  
    const totalInput \= document.getElementById('total');

    if (precioInput && cantidadInput && totalInput) {  
        // Función para calcular y actualizar el total  
        const calcularTotal \= function() {  
            const precio \= parseFloat(precioInput.value);  
            const cantidad \= parseFloat(cantidadInput.value);

            // Verificar si ambos valores son números válidos  
            if (\!isNaN(precio) && \!isNaN(cantidad)) {  
                const total \= precio \* cantidad;  
                // Considera redondear aquí si quieres precisión en la interfaz antes de enviar  
                // totalInput.value \= total.toFixed(8); // Ejemplo a 8 decimales  
                totalInput.value \= total;  
            } else {  
                // Si alguno no es un número, dejar el total vacío o 0  
                totalInput.value \= ''; // O 0, dependiendo de la preferencia  
            }  
        };

        // Agregar listeners para que el cálculo ocurra cada vez que cambien precio o cantidad  
        precioInput.addEventListener('input', calcularTotal);  
        cantidadInput.addEventListener('input', calcularTotal);  
    }

    // \--- 4\. y 5\. Fee y Moneda del Fee ya están predeterminados en el HTML \---  
    // No se necesita código JS adicional a menos que quisieras hacer algo dinámico con ellos.  
    // Solo como ejemplo, puedes verificar que los valores estén cargados al inicio:  
    // const feeInput \= document.getElementById('fee');  
    // const monedaFeeInput \= document.getElementById('moneda\_fee');  
    // if (feeInput && \!feeInput.value) feeInput.value \= '0.00001969';  
    // if (monedaFeeInput && \!monedaFeeInput.value) monedaFeeInput.value \= 'BNB';  
    // Esto no es necesario si ya los pones en el HTML con el atributo value.  
});

### **`style.css`**

CSS  
body {  
    font-family: Arial, sans-serif;  
    background: \#f3f6fa;  
    padding: 20px;  
    max-width: 600px;  
    margin: auto; /\* Centra el contenido \*/  
}

h1 {  
    color: \#333;  
    text-align: center;  
    margin-bottom: 20px; /\* Espacio debajo del título \*/  
}

form {  
    background: white;  
    padding: 20px;  
    border-radius: 8px;  
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
    display: flex; /\* Usa flexbox para organizar los labels \*/  
    flex-direction: column; /\* Apila los labels verticalmente \*/  
}

label {  
    display: block; /\* Asegura que cada label ocupe su propia línea \*/  
    margin-bottom: 15px; /\* Espacio entre labels \*/  
    font-weight: bold;  
}

/\* Estilo para inputs y selects dentro de labels \*/  
label input:not(\[type="checkbox"\]),  
label select {  
    display: block; /\* Hace que el input/select ocupe el ancho disponible bajo el label \*/  
    width: 100%; /\* Ocupa el 100% del ancho de su contenedor (el label) \*/  
    padding: 10px; /\* Aumenta el padding \*/  
    margin-top: 5px; /\* Espacio entre el texto del label y el input \*/  
    margin-bottom: 0; /\* Elimina el margin-bottom del input para que el label controle el espacio \*/  
    border-radius: 4px;  
    border: 1px solid \#ccc;  
    box-sizing: border-box; /\* Incluye padding y border en el ancho total \*/  
    font-size: 1rem; /\* Tamaño de fuente legible \*/  
}

/\* Estilo específico para grupos de inputs en la misma línea si los hay (ajustar si tu HTML cambia) \*/  
/\* Actualmente, todos son 'display: block', así que esto puede no ser necesario \*/  
/\*  
label.inline-group input {  
    width: auto;  
    margin-right: 10px;  
    display: inline-block;  
}  
\*/

button {  
    width: 100%;  
    padding: 12px; /\* Aumenta el padding del botón \*/  
    background: \#2d89ef;  
    color: white;  
    border: none;  
    border-radius: 5px;  
    font-size: 1rem; /\* Tamaño de fuente legible \*/  
    cursor: pointer; /\* Indica que es clickeable \*/  
    transition: background-color 0.3s ease; /\* Transición suave al pasar el mouse \*/  
    margin-top: 10px; /\* Espacio encima del botón \*/  
}

button:hover {  
    background: \#1b5fbf; /\* Color más oscuro al pasar el mouse \*/  
}

/\* Estilo para el mensaje de éxito/error \*/  
.success-message {  
    color: green;  
    font-weight: bold;  
    margin-bottom: 15px; /\* Espacio debajo del mensaje \*/  
    text-align: center; /\* Centra el texto \*/  
    padding: 10px;  
    background-color: \#e9ffeb; /\* Fondo suave \*/  
    border: 1px solid \#d0e9c6;  
    border-radius: 4px;  
}

.error-message {  
     color: red;  
     font-weight: bold;  
     margin-bottom: 15px;  
     text-align: center;  
     padding: 10px;  
     background-color: \#ffebeb;  
     border: 1px solid \#e9d0d0;  
     border-radius: 4px;  
}

*Nota: Añadí algunos comentarios y pequeños ajustes al CSS para mejorar la legibilidad y el espaciado, además de clases `.success-message` y `.error-message` por si decides estilizarlos.*

### **`config.php`**

(Ya proporcionado arriba en la sección de Configuración)

## 

## 

## **Base de Datos \- Estructura de la Tabla `operaciones`**

Aquí está la estructura de la tabla `operaciones` en MariaDB/MySQL:

\`\`\`sql  
DESC operaciones;

\+------------+--------------+------+-----+---------+----------------+  
| Field      | Type         | Null | Key | Default | Extra          |  
\+------------+--------------+------+-----+---------+----------------+  
| id         | int          | NO   | PRI | NULL    | auto\_increment |  
| fecha      | text         | YES  |     | NULL    |                |  
| par        | varchar(255) | YES  |     | NULL    |                |  
| base       | varchar(255) | YES  |     | NULL    |                |  
| quote      | varchar(255) | YES  |     | NULL    |                |  
| tipo       | varchar(255) | YES  |     | NULL    |                |  
| precio     | double       | YES  |     | NULL    |                |  
| cantidad   | double       | YES  |     | NULL    |                |  
| total      | double       | YES  |     | NULL    |                |  
| fee        | double       | YES  |     | NULL    |                |  
| moneda\_fee | varchar(255) | YES  |     | NULL    |                |  
\+------------+--------------+------+-----+---------+----------------+  
\`\`\`

## **Documentación Adicional: Stored Procedures y Prepared Statements**

Aquí se incluye el documento que generamos previamente explicando qué son los Stored Procedures, Stored Functions y Prepared Statements, sus ventajas y ejemplos.

### **\# Stored Procedures y Prepared Statements en MariaDB/SQL**

Este documento explica qué son los Stored Procedures y los Prepared Statements en el contexto de bases de datos SQL, enfocándose en su aplicación en MariaDB (aunque los conceptos son generales para SQL), sus ventajas y ofrece ejemplos prácticos.

#### **\#\# Introducción**

Tanto los Stored Procedures como los Prepared Statements son características poderosas en SQL que ayudan a mejorar el rendimiento, la seguridad y la mantenibilidad de las aplicaciones que interactúan con bases de datos. Aunque ambos involucran la ejecución de código SQL en el servidor, cumplen propósitos ligeramente diferentes y se usan en distintos escenarios.

#### **1\. Stored Procedures (Procedimientos Almacenados)**

##### **¿Qué son?**

Un Stored Procedure es un bloque de código SQL que se compila y almacena en la base de datos del servidor. Esencialmente, es una subrutina o función que puede ser llamada y ejecutada por aplicaciones cliente u otros procedimientos almacenados. Pueden aceptar parámetros de entrada, devolver valores (a través de parámetros de salida) y ejecutar múltiples sentencias SQL, incluyendo lógica de control de flujo como IF, WHILE, cursores, etc.

##### **Ventajas**

* **Rendimiento:** Al estar pre-compilados en la base de datos, su ejecución es más rápida ya que no necesitan ser parseados y optimizados cada vez que se les llama. Esto también reduce el tráfico de red, ya que solo se envía el nombre del procedimiento y sus parámetros, en lugar de todo el código SQL.  
* **Modularidad y Reusabilidad:** Permiten encapsular lógica de negocio compleja en un solo lugar, que puede ser reutilizada por múltiples aplicaciones o partes de una misma aplicación.  
* **Seguridad:** Se pueden otorgar permisos de ejecución a los usuarios o roles solo sobre el procedimiento almacenado, sin darles acceso directo a las tablas subyacentes. Esto limita la superficie de ataque y controla cómo se manipulan los datos.  
* **Mantenimiento:** Al centralizar la lógica en la base de datos, las actualizaciones o correcciones solo necesitan hacerse en un lugar (el procedimiento almacenado), en lugar de actualizar cada aplicación cliente que use esa lógica.

## **Base de Datos \- Función Almacenada `calcular_balance_divisa`**

##### **Ejemplo Función Almacenada para Cálculo de Balance**

Esta función almacena la lógica para calcular el balance neto (compras \- ventas) de una divisa específica. Su código de creación se encuentra en la sección de "Configuración y Puesta en Marcha".

Una **Función Almacenada (Stored Function)** es similar a un Stored Procedure, pero está diseñada para calcular y *devolver un único valor* escalar. Son ideales para usar directamente en consultas `SELECT` o dentro de otras sentencias SQL.

Aquí tienes la función que calculamos para obtener el balance neto de una divisa específica en tu tabla `operaciones`:

\`\`\`SQL

USE Bichance; \-- Asegúrate de estar en la base de datos correcta

DELIMITER $$ \-- Cambiamos el delimitador temporalmente

CREATE FUNCTION calcular\_balance\_divisa (divisa\_base VARCHAR(255))

RETURNS DOUBLE \-- Indicamos que la función devolverá un valor de tipo DOUBLE

READS SQL DATA \-- Indica que la función solo lee datos de las tablas

BEGIN

    DECLARE balance DOUBLE; \-- Declaramos una variable para almacenar el resultado

    \-- Calculamos la suma condicional (BUYs positivos, SELLs negativos)

    SELECT SUM(case when tipo \= 'BUY' THEN cantidad when tipo \= 'SELL' THEN \-cantidad else 0 END)

    INTO balance \-- Guardamos el resultado de la suma en la variable 'balance'

    FROM operaciones

    WHERE base \= divisa\_base; \-- Usamos el parámetro de la función

    RETURN balance; \-- Devolvemos el valor calculado

END$$

DELIMITER ; \-- Restaura el delimitador original

\`\`\`

**Cómo usar la Función:**

Una vez creada, puedes llamar a esta función directamente en tus consultas `SELECT`:

\`\`\`SQL  
\-- Para obtener el balance de BCH  
SELECT calcular\_balance\_divisa('BCH');  
\`\`\`

#### **Nota Importante: Permisos de Creación**

Es fundamental tener en cuenta que la creación de objetos de base de datos como Stored Procedures, Stored Functions y Views generalmente requiere permisos elevados.

Típicamente, el usuario `root` (el superusuario de la base de datos) tiene permisos para crear cualquier objeto. Sin embargo, en un entorno de producción o con una buena política de seguridad, no se suele usar `root` para tareas diarias.

Para crear Stored Procedures y Functions, un usuario necesita el privilegio `CREATE ROUTINE`. Para modificar o eliminar procedimientos y funciones existentes, necesita el privilegio `ALTER ROUTINE` o `DROP ROUTINE` respectivamente.

Para crear Views (como la que vimos como opción para el balance por divisa), se necesita el privilegio `CREATE VIEW`.

Por lo tanto, si no estás utilizando el usuario `root`, asegúrate de que el usuario con el que intentas crear estos objetos tenga los permisos adecuados (`GRANT CREATE ROUTINE ON tu_base_de_datos.* TO 'tu_usuario'@'localhost';`, por ejemplo).

## **Contribuciones**

Este proyecto fue desarrollado de forma colaborativa. Siéntete libre de usarlo, modificarlo y mejorarlo!!

---

¡Espero que este README.md te sea de gran utilidad\! 

