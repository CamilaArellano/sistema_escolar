<!-- alumnos.view.php -->
<?php
require 'functions.php';
$permisos = ['Administrador', 'Profesor'];
permisos($permisos);

$secciones = $conn->prepare("select * from secciones");
$secciones->execute();
$secciones = $secciones->fetchAll();

$grados = $conn->prepare("select * from grados");
$grados->execute();
$grados = $grados->fetchAll();

include 'alumnos.html';
?>
