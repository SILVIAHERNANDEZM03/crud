<?php
    print_r($_POST);
    if(!isset($_POST['idEmpleado'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idEmpleado = $_POST['idEmpleado'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $telefono = $_POST['txtTelefono'];
    $tipoPuesto = $_POST['txtTipoPuesto'];
    $tiempoContratado = $_POST['txtTiempoContratado'];
    $salario = $_POST['txtSalario'];
   

    $sentencia = $bd->prepare("UPDATE empleado SET nombre = ?, edad = ?, telefono = ?, tipoPuesto = ?, tiempoContratado = ?, salario = ? where idEmpleado = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $telefono,$tipoPuesto,$tiempoContratado, $salario, $idEmpleado]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>