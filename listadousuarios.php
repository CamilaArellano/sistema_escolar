<?php
require 'functions.php';
// Arreglo de permisos
$permisos = ['Administrador'];
permisos($permisos);

// Consulta los usuarios para el listado de usuarios
$usuarios = $conn->query("SELECT * FROM users");
$usuarios = $usuarios->fetchAll();

include "listadousuarios.html";
?>
