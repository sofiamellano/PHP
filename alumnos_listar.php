<?php
include 'cnn.php';
        
    if (isset($_GET['eliminarid'])) {
        $eliminarid = $_GET['eliminarid'];
        // $sql = "DELETE FROM alumnos WHERE idalumno = $eliminarid";
        $sql = 'UPDATE alumnos SET deleted = 1 WHERE idalumno = '.$eliminarid; 
        mysqli_query($cnn, $sql); // Execute the DELETE query
    }
        $sql = "SELECT * FROM alumnos WHERE !deleted"; // Select only non-deleted records	
        $resp = mysqli_query($cnn, $sql);

        while ($campos = mysqli_fetch_array($resp)) {
            echo '<h3>'.$campos['idalumno']. '--'.$campos['nombre'].'</h3>';

            $link = 'alumnos_edit.php?idalumno='.$campos['idalumno'];

            $linkEliminar = 'alumnos_listar.php?eliminarid='.$campos['idalumno'];

            echo '<a href="'.$link.'">Editar</a>';
            echo '<br>';

            echo '<a href="'.$linkEliminar.'">Eliminar</a>';
            echo '<br>';
        }
        
    
?>
<!-- <a href=".php">Limpiar</a> -->
