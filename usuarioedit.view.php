<?php
require 'functions.php';
$permisos = ['Administrador'];
permisos($permisos);

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    $usuario = $conn->prepare("SELECT * FROM users WHERE id = $id_usuario");
    $usuario->execute();
    $usuario = $usuario->fetch();
} else {
    die('ID de usuario no proporcionado.');
}

include 'usuarioedit.html';
?>

