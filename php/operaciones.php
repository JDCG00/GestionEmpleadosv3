<?php
    switch ($_GET['op']) {
        case 'b':
            header("Location:baja2.php?id=".$_GET['id']."");
            break;
        case 'm':
            header("Location:modificar2.php?id=".$_GET['id']."");
            break;
        case 'a':
            header("Location:alta.php");
            break;
    }
?>