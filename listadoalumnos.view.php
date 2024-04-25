<?php
require 'functions.php';

$permisos = ['Administrador','Profesor'];
permisos($permisos);

// Consulta los alumnos para el listado de alumnos
$alumnos = $conn->prepare("SELECT a.id, a.num_lista, a.nombres, a.apellidos, a.genero, a.curp, a.contacto_emergencia, b.nombre as grado, c.nombre as seccion FROM alumnos as a INNER JOIN grados as b ON a.id_grado = b.id INNER JOIN secciones as c ON a.id_seccion = c.id ORDER BY a.apellidos");
$alumnos->execute();
$alumnos = $alumnos->fetchAll();

include "listadoalumnos.html";


?>

