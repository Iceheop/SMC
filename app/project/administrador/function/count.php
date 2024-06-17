<?php
    function contar($tabla,$rol){
        global $db;

        $query = mysqli_query($db,"SELECT COUNT(*) as count FROM $tabla WHERE $tabla.id IN (SELECT matricula FROM usuarios WHERE rol_id = $rol)");
        $result = mysqli_fetch_array($query);
        echo $result['count'];
    }
?>