<?php
    function consulta($tabla, $campo){
        global $db;

        $query = mysqli_query($db,"SELECT * FROM $tabla");
        while ($result = mysqli_fetch_array($query)) {
            echo '<th scope="col">'.$result[$campo].'</th>';
        }
    }
?>