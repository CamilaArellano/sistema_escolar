<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['Administrador', 'Profesor', 'Padre'];
permisos($permisos);
?>
<html>

<head>
    <title>Inicio | Registro de Notas</title>

</head>

<body>
    <?php include("./Cabecera.php"); ?><br>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>

<div class="container">
  <div class="left-panel">
    <div class="calendar">
      <h2 id="monthAndYear"></h2>
      <div class="weekdays">
        <div>Domingo</div>
        <div>Lunes</div>
        <div>Martes</div>
        <div>Miércoles</div>
        <div>Jueves</div>
        <div>Viernes</div>
        <div>Sábado</div>
      </div>
      <div class="days" id="days"></div>
    </div>
  </div>
  <div class="right-panel">
    <div class="clock">
      <div id="dateDisplay" class="date"></div>
      <div id="timeDisplay" class="time"></div>
      <div id="formatDisplay" class ="ampm"></div>
    </div>
  </div>
</div>

<script src="calendar.js"></script>
<script src="clock.js"></script>
<?php include("./footer.php"); ?>

</html>