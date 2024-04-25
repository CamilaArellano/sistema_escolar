<?php
require 'functions.php';
$permisos = ['Administrador', 'Profesor'];
permisos($permisos);

if (isset($_GET['id'])) {
    $id_alumno = $_GET['id'];

    $alumno = $conn->prepare("select * from alumnos where id = ".$id_alumno);
    $alumno->execute();
    $alumno = $alumno->fetch();

    // consulta las secciones
    $secciones = $conn->prepare("select * from secciones");
    $secciones->execute();
    $secciones = $secciones->fetchAll();

    // consulta de grados
    $grados = $conn->prepare("select * from grados");
    $grados->execute();
    $grados = $grados->fetchAll();
} else {
    die('Ha ocurrido un error');
}

// Incluye tu archivo HTML
include 'alumnoedit.html';
?>
