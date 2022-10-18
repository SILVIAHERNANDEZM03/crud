<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['idEmpleado'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $idEmpleado = $_GET['idEmpleado'];

    $sentencia = $bd->prepare("select * from empleado where idEmpleado = ?;");
    $sentencia->execute([$idEmpleado]);
    $empleado = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($empleado);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $empleado->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $empleado->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono: </label>
                        <input type="text" class="form-control" name="txtTelefono" autofocus required
                        value="<?php echo $empleado->telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TipoPuesto: </label>
                        <input type="text" class="form-control" name="txtTipoPuesto" autofocus required
                        value="<?php echo $empleado->tipoPuesto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TiempoContratado: </label>
                        <input type="text" class="form-control" name="txtTiempoContratado" autofocus required
                        value="<?php echo $empleado->tiempoContratado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salario: </label>
                        <input type="text" class="form-control" name="txtSalario" autofocus required
                        value="<?php echo $empleado->salario; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idEmpleado" value="<?php echo $empleado->idEmpleado; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>