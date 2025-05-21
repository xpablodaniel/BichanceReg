import mysql.connector
import sys

# Detalles de la conexión a la base de datos MySQL
db_config = {
    'host': 'localhost',  # Reemplaza con tu host de MySQL si es diferente
    'user': 'pablo',      # Reemplaza con tu nombre de usuario de MySQL
    'password': 'usuario',  # Reemplaza con tu contraseña de MySQL
    'database': 'Bichance'  # Reemplaza con el nombre de tu base de datos MySQL
}

# Los datos que quieres insertar como una lista de tuplas
# Cada tupla corresponde a una fila en la tabla 'operaciones'
# NOTA: El campo 'id' (si existe y es AUTO_INCREMENT) no se incluye.
# El orden de los datos en cada tupla DEBE coincidir con el orden de las columnas
# en tu sentencia INSERT INTO (excluyendo 'id').
data_to_insert = [
  
      
    ('2025-05-17 10:43:52', 'RUNE/USDT', 'RUNE', 'USDT', 'BUY', 1.66, 7.00, 11.62, 0.00001364, 'BNB'),
    
    

]

# Sentencia SQL para insertar datos en MySQL
# Usamos %s como placeholders para los valores que serán proporcionados
sql_insert = """
INSERT INTO operaciones (fecha, par, base, quote, tipo, precio, cantidad, total, fee, moneda_fee)
VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s);
"""

conn = None  # Inicializa la conexión a None
try:
    # Conectar a la base de datos MySQL
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()

    # Ejecutar la inserción múltiple
    cursor.executemany(sql_insert, data_to_insert)

    # Confirmar la transacción
    conn.commit()

    print(f"Se insertaron {cursor.rowcount} registros exitosamente en la tabla 'operaciones' de MySQL.")

except mysql.connector.Error as err:
    print(f"Error de MySQL: {err}")
    if conn:
        conn.rollback()  # Revertir si algo salió mal
except Exception as e:
    print(f"Ocurrió un error: {e}")
    if conn:
        conn.rollback()  # Revertir si algo salió mal
finally:
    # Cerrar la conexión
    if conn and conn.is_connected():
        cursor.close()
        conn.close()
        print("Conexión a la base de datos MySQL cerrada.")
