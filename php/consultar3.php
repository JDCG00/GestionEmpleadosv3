<?php
    require("conexion.php");
    $conexion = new mysqli(SERVIDOR, USUARIO, PW, BD);
    function formulario1(){
        echo '
            <h1>Consultar</h1>
            <form action="consultar3.php" method="post">
                <label for="nombre">Introduzca Nombre: </label>
                <input name="nombre" type="text"><br><br>
                <input type="submit" name="enviar" value="Enviar"><br><br>
                <a href="../index.php"><input type="button" name="volver" value="Volver"></a>
                <a href="consultartodo.php"><input type="button" name="consultartodo" value="Consultar todo"></a>
            </form>
        ';
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Consultar</title>
    </head>
    <body>
        <?php            
            if(!$_POST){
                formulario1();
            }else{                    
                $consulta = "SELECT * FROM empleados WHERE Nombre = '".$_POST['nombre']."';";
                $resultado = $conexion->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
                    echo 'IdEmpleados: ' .$fila['IdEmpleados']. '<br/>';
                    echo 'DNI: ' .$fila['DNI']. '<br/>';
                    echo 'Nombre: ' .$fila['Nombre']. '<br/>';
                    echo 'Correo: ' .$fila['Correo']. '<br/>';
                    echo 'Teléfono: ' .$fila['Tlfn']. '<br/> <br/>';
                }
                echo '<a href="consultar3.php"><input type="button" name="volver" value="Volver"></a>';
            }                     
        ?>
    </body>
</html>
