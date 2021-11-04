<?php
    require("php/conexion.php");
    $conexion = new mysqli(SERVIDOR, USUARIO, PW, BD);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Empleados</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <header><h1>Listado</h1></header>
    <nav></nav>
    <main>
        <aside class="centrar">
            <div class="div1 centrar2">
                <a href="php/operaciones.php?op=a"><input type="button" name="añadir" value="Añadir"></a><br><br><br>
                <a href="php/operaciones.php?op=c_dni"><input type="button" name="consultar_dni" value="Consultar DNI"></a><br><br><br>
                <a href="php/operaciones.php?op=c_nombre"><input type="button" name="consultar_nombre" value="Consultar Nombre"></a>
            </div>            
        </aside>
        <article class="centrar">
            <div>
                <form action="index.php" method="post">
                    <label for="baja"><span class="negrita">Usuarios mostrados: </span></label><br><br>     
                    <?php
                        $consulta = "SELECT IdEmpleados, Nombre, DNI FROM empleados ";
                        $resultado = $conexion->query($consulta); 
                        while ($fila = $resultado->fetch_assoc()) {
                            $id = $fila['IdEmpleados'];
                            $nombre = $fila['Nombre'];
                            $dni = $fila['DNI'];
                            echo "<label value=$id>$nombre con DNI: $dni</label>&nbsp&nbsp&nbsp";
                            echo '<a href="php/operaciones.php?id='.$id.'&op=b"><input type="button" name="borrar" value="Borrar"></a>&nbsp&nbsp';
                            echo '<a href="php/operaciones.php?id='.$id.'&op=m"><input type="button" name="modificar" value="Modificar"></a><br><br>';
                        }
                    ?>
                </form>
            </div>
        </article>
    </main>
    <footer></footer>
</body>
</html>