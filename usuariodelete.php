<?php
require 'functions.php';
// Arreglo de permisos
$permisos = ['Administrador'];
permisos($permisos);

// Obtener el ID del usuario a eliminar
$id_usuario = $_GET['id'];

// Eliminar el usuario de la base de datos
$result = $conn->query("DELETE FROM users WHERE id = $id_usuario");

if ($result) {
    header('location:listadousuarios.php?info=1');
} else {
    header('location:listadousuarios.php?err=1');
}
?>
