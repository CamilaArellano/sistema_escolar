<?php
if (!$_POST) {
    header('location: usuarios.view.php');
} else {
    require 'functions.php';

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $nombre = htmlentities($_POST['nombre']);
    $rol = htmlentities($_POST['rol']);

    if (isset($_POST['insertar'])) {
        // Insertar nuevo usuario en la base de datos
        $result = $conn->query("INSERT INTO users (username, password, nombre, rol) VALUES ('$username', '$password', '$nombre', '$rol')");

        if ($result) {
            header('location:usuarios.view.php?info=1');
        } else {
            header('location:usuarios.view.php?err=1');
        }
    } else if (isset($_POST['modificar'])) {
        // Capturar el ID del usuario a modificar
        $id_usuario = $_POST['id']; // No necesitas htmlentities aquí, ya que el ID debería ser un entero
        
        // Actualizar la información del usuario en la base de datos
        $result = $conn->query("UPDATE users SET username = '$username', password = '$password', nombre = '$nombre', rol = '$rol' WHERE id = $id_usuario");

        if ($result) {
            header('location:usuarioedit.view.php?id=' . $id_usuario . '&info=1');
        } else {
            header('location:usuarioedit.view.php?id=' . $id_usuario . '&err=1');
        }
    }
}
?>
