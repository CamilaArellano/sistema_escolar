<?php
// Arreglo con mensajes que puede recibir
$messages = [
    "1" => "Credenciales incorrectas",
    "2" => "No ha iniciado sesión"
];

if (isset($_GET['err']) && is_numeric($_GET['err']) && $_GET['err'] > 0 && $_GET['err'] < 3) {
    echo '<span class="error">' . $messages[$_GET['err']] . '</span>';
}

include 'index.html';
?>

