document.addEventListener('DOMContentLoaded', function() {
    // --- 1. Establecer la fecha y hora actual ---
    const fechaInput = document.getElementById('fecha');
    if (fechaInput) {
        const now = new Date();
        // Formato YYYY-MM-DDTHH:MM requerido por input type="datetime-local"
        const year = now.getFullYear();
        const month = (now.getMonth() + 1).toString().padStart(2, '0'); // getMonth() es base 0
        const day = now.getDate().toString().padStart(2, '0');
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');

        fechaInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
    }

    // --- 2. Llenar campo Base y Quote basado en Par (Corregido para usar '/') ---
    const parInput = document.getElementById('par');
    const baseInput = document.getElementById('base');
    const quoteInput = document.getElementById('quote'); // Necesitamos este input para actualizarlo también

    if (parInput && baseInput && quoteInput) {
        parInput.addEventListener('input', function() {
            const parValue = parInput.value.trim().toUpperCase(); // Convertir a mayúsculas
            const slashIndex = parValue.indexOf('/'); // Buscar la posición del '/'

            // Verificar si se encontró el '/' y si hay texto antes y después de él
            if (slashIndex > 0 && slashIndex < parValue.length - 1) {
                // Si se encontró el '/' y no está ni al principio ni al final
                const baseValue = parValue.substring(0, slashIndex); // Parte antes del '/'
                const quoteValue = parValue.substring(slashIndex + 1); // Parte después del '/'

                baseInput.value = baseValue;
                quoteInput.value = quoteValue; // Actualizamos también el campo quote

            } else {
                // Si no se encontró el '/' o el formato no es el esperado (ej: "BTC/", "/USDT", "BTCUSDT")
                // Aquí puedes decidir qué hacer. Una opción es intentar la lógica anterior (sin slash)
                // si quieres soportar ambos formatos (con o sin slash).
                // Otra opción es simplemente dejar los campos base y quote vacíos, forzando al usuario
                // a usar el formato con slash para la auto-detección.
                // Optaremos por dejar vacíos si el formato slash es incorrecto o no está presente,
                // y si el quote es USDT, intentamos la lógica anterior como fallback.

                const quoteDefaultValue = 'USDT'; // Valor por defecto o el que esperas sin slash
                const quoteValue = quoteInput.value.trim().toUpperCase(); // Valor actual del campo quote

                 if (parValue.endsWith(quoteValue) && parValue.length > quoteValue.length) {
                     // Lógica original: quitar el quote del final si termina con él
                     const baseValue = parValue.substring(0, parValue.length - quoteValue.length);
                     baseInput.value = baseValue;
                     // No cambiamos quoteInput.value aquí, ya que la lógica se basa en que el par termina en el quote actual
                     // Podrías añadir una comprobación más estricta si quieres.
                 } else if (parValue.endsWith(quoteDefaultValue) && parValue.length > quoteDefaultValue.length) {
                     // Fallback si el par termina en el quote DEFAULT (USDT) aunque el campo quote cambie
                     const baseValue = parValue.substring(0, parValue.length - quoteDefaultValue.length);
                     baseInput.value = baseValue;
                     quoteInput.value = quoteDefaultValue; // Aseguramos que quote sea USDT en este caso
                 }
                 else {
                    // Si ninguno de los formatos coincide, dejar vacíos
                    baseInput.value = '';
                    quoteInput.value = '';
                 }
            }
        });
    }


    // --- 3. Calcular Total basado en Precio y Cantidad ---
    const precioInput = document.getElementById('precio');
    const cantidadInput = document.getElementById('cantidad');
    const totalInput = document.getElementById('total');

    if (precioInput && cantidadInput && totalInput) {
        // Función para calcular y actualizar el total
        const calcularTotal = function() {
            const precio = parseFloat(precioInput.value);
            const cantidad = parseFloat(cantidadInput.value);

            // Verificar si ambos valores son números válidos
            if (!isNaN(precio) && !isNaN(cantidad)) {
                const total = precio * cantidad;
                // Considera redondear aquí si quieres precisión en la interfaz antes de enviar
                // totalInput.value = total.toFixed(8); // Ejemplo a 8 decimales
                totalInput.value = total;
            } else {
                // Si alguno no es un número, dejar el total vacío o 0
                totalInput.value = ''; // O 0, dependiendo de la preferencia
            }
        };

        // Agregar listeners para que el cálculo ocurra cada vez que cambien precio o cantidad
        precioInput.addEventListener('input', calcularTotal);
        cantidadInput.addEventListener('input', calcularTotal);
    }

    // --- 4. y 5. Fee y Moneda del Fee ya están predeterminados en el HTML ---
    // No se necesita código JS adicional a menos que quisieras hacer algo dinámico con ellos.
    // Solo como ejemplo, puedes verificar que los valores estén cargados al inicio:
    // const feeInput = document.getElementById('fee');
    // const monedaFeeInput = document.getElementById('moneda_fee');
    // if (feeInput && !feeInput.value) feeInput.value = '0.00001969';
    // if (monedaFeeInput && !monedaFeeInput.value) monedaFeeInput.value = 'BNB';
    // Esto no es necesario si ya los pones en el HTML con el atributo value.
});