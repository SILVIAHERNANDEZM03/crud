<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtTelefono"])|| empty($_POST["txtTipoPuesto"])|| empty($_POST["txtTiempoContratado"])|| empty($_POST["txtSalario"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $telefono = $_POST["txtTelefono"];
    $tipoPuesto = $_POST["txtTipoPuesto"];
    $tiempoContratado = $_POST["txtTiempoContratado"];
    $salario = $_POST["txtSalario"];
    
    $sentencia = $bd->prepare("INSERT INTO empleado(nombre,edad,telefono, tipoPuesto, tiempoContratado, salario) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$edad,$telefono,$tipoPuesto,$tiempoContratado,$salario]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>