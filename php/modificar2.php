<?php
    require("conexion.php");
    $conexion = new mysqli(SERVIDOR, USUARIO, PW, BD);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modificar</title>
</head>
<body>
    <h1>Modificar
        <?php
            $consulta = "SELECT * FROM empleados WHERE IdEmpleados='".$_GET['id']."';";
            $resultado = $conexion->query($consulta);
            $fila = $resultado->fetch_assoc();
            echo  $fila['Nombre']. ' con DNI: '.$fila['DNI'];
        ?>
    </h1>
    <form action="modificar2.php" method="post">
        <?php
            echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
            echo '<label for="dni">DNI: </label>';
            echo '<input type="text" name="dni" value="'.$fila['DNI'].'"><br><br>';
            echo '<label for="nombre">Nombre: </label>';
            echo '<input type="text" name="nombre" value="'.$fila['Nombre'].'"><br><br>';
            echo '<label for="correo">Correo: </label>';            
            echo '<input type="text " name="correo" value="'.$fila['Correo'].'"><br><br>';
            echo '<label for="telefono">Teléfono: </label>';
            echo '<input type="text" name="telefono" value="'.$fila['Tlfn'].'"><br><br>';
            echo '<input type="submit" name="modificar" value="Modificar"><br><br>';            
        ?>
        <a href="../index.php"><input type="button" name="volver" value="Volver"></a>
    </form>
    <?php
        if ($_POST) {
            $consulta2 = "UPDATE empleados SET DNI='".$_POST['dni']."', Nombre='".$_POST['nombre']."', Correo='".$_POST['correo']."', Tlfn='".$_POST['telefono']."' WHERE IdEmpleados='".$_POST['id']."';";
            $resultado2 = $conexion->query($consulta2);
            header("Location: modificar.php ");
        }
    ?>  
</body>
</html>