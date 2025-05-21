<?php
if (function_exists('mysqli_connect')) {
    echo "✅ mysqli está habilitada";
} else {
    echo "❌ mysqli no está disponible";
}
