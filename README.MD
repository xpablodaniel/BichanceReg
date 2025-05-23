# 📊 Bichance: Registro de Operaciones Cripto en PHP + MySQL

> Aplicación web sencilla para registrar operaciones de compra y venta de criptomonedas, desarrollada con PHP, MySQL/MariaDB y JavaScript.

---

## ✅ Funcionalidades

- Formulario web para registrar:
  - Fecha, Par, Base, Quote, Tipo (BUY/SELL)
  - Precio, Cantidad, Total, Fee y moneda del Fee
- Autocompletado de base/quote a partir del par (ej. BTC/USDT o BTCUSDT)
- Cálculo automático del total (`precio * cantidad`)
- Uso de sentencias preparadas (`Prepared Statements`) en PHP
- Inserciones seguras y mensaje de éxito al registrar
- Función almacenada opcional para calcular el balance por cripto

---

## 🗃️ Estructura de Base de Datos

```sql
CREATE TABLE operaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fecha TEXT,
  par VARCHAR(255),
  base VARCHAR(255),
  quote VARCHAR(255),
  tipo VARCHAR(255),
  precio DOUBLE,
  cantidad DOUBLE,
  total DOUBLE,
  fee DOUBLE,
  moneda_fee VARCHAR(255)
);

CREATE INDEX idx_operaciones_base ON operaciones (base);
CREATE INDEX idx_operaciones_tipo ON operaciones (tipo);
```

---

## 📁 Estructura del Proyecto

```bash
/bichance/
├── index.php       # Formulario HTML y mensajes
├── procesar.php    # Inserción a la base de datos
├── script.js       # Lógica dinámica: par → base/quote, cálculo total
├── style.css       # Estilos visuales básicos
├── config.php      # Configuración de conexión MySQL
```

---

## 🚀 Cómo Empezar

1. Crear base de datos `Bichance` en tu servidor MySQL/MariaDB.
2. Ejecutar las sentencias SQL para crear la tabla `operaciones`.
3. Configurar `config.php` con tus credenciales de conexión.
4. Colocar todos los archivos en un servidor web (por ejemplo, `htdocs/bichance/`).
5. Acceder a `index.php` desde el navegador para empezar a registrar.

---

## 🧠 Función Almacenada (Opcional)

```sql
CREATE FUNCTION calcular_balance_divisa (divisa_base VARCHAR(255))
RETURNS DOUBLE
READS SQL DATA
BEGIN
  DECLARE balance DOUBLE;
  SELECT SUM(CASE WHEN tipo = 'BUY' THEN cantidad
                  WHEN tipo = 'SELL' THEN -cantidad ELSE 0 END)
    INTO balance
    FROM operaciones
    WHERE base = divisa_base;
  RETURN balance;
END;
```

Consulta con:

```sql
SELECT calcular_balance_divisa('ETH');
```

---

## 📄 Licencia

Código abierto bajo Licencia MIT.
