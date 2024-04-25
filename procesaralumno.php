<?php
if(!$_POST){
    header('location: alumnos.view.php');
}
else {
    //Se incluye el archivo con funciones que tiene la conexión
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD
    $nombres = htmlentities($_POST ['nombres']);
    $apellidos = htmlentities($_POST ['apellidos']);
    $genero = htmlentities($_POST['genero']);
    $numlista = htmlentities($_POST['numlista']);
    $idgrado = htmlentities($_POST['grado']);
    $idseccion = htmlentities($_POST['seccion']);
    $curp = htmlentities($_POST ['curp']);
    $contacto = htmlentities($_POST ['contacto']);

    // Verificar si el CURP ya existe en la base de datos
    $curpExistsQuery = $conn->prepare("SELECT COUNT(*) as count FROM alumnos WHERE curp = :curp");
    $curpExistsQuery->bindParam(':curp', $curp);
    $curpExistsQuery->execute();
    $curpExistsResult = $curpExistsQuery->fetch(PDO::FETCH_ASSOC);
    
    if ($curpExistsResult && $curpExistsResult['count'] > 0) {
        // El CURP ya existe, redirige con un mensaje de error
        header('location:alumnos.view.php?err_curp=1');
        exit(); // Asegúrate de salir después de redirigir
    }

     // Insertar es el nombre del botón "Guardar" que está en el archivo alumnos.view.php
    if (isset($_POST['insertar'])){

        $result = $conn->query("insert into alumnos (num_lista, nombres, apellidos, genero, id_grado, id_seccion, curp, contacto_emergencia) values ('$numlista', '$nombres', '$apellidos', '$genero', '$idgrado','$idseccion','$curp','$contacto')");
        if (isset($result)) {
            header('location:alumnos.view.php?info=1');
        } else {
            header('location:alumnos.view.php?err=1');
        }// Validación de registro

    //Sino, boton "Modificar" que esta en el archivo alumnoedit.view.php
    }else if (isset($_POST['modificar'])) {
        //Capturamos el id alumnos a modificar
            $id_alumno = htmlentities($_POST['id']);
            $result = $conn->query("update alumnos set num_lista = '$numlista', nombres = '$nombres', apellidos = '$apellidos', genero = '$genero',id_grado = '$idgrado', id_seccion = '$idseccion',curp = '$curp', contacto_emergencia = '$contacto' where id = " . $id_alumno);
            if (isset($result)) {
                header('location:alumnoedit.view.php?id=' . $id_alumno . '&info=1');
            } else {
                header('location:alumnoedit.view.php?id=' . $id_alumno . '&err=1');
            }// Validación de registro
    }

}

