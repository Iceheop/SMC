<?php
function obtenerOpciones($table,$area,$orden) {
    global $db;
    // Preparar la consulta SQL
    $query = "SELECT * FROM $table ORDER BY id $orden";
    $result = mysqli_query($db, $query);

    // Verificar si hay resultados
    if (mysqli_num_rows($result) > 0) {
        while ($fila = mysqli_fetch_array($result)) {
            $id = $fila['id'];
            $value = $fila[$area];
            echo "<option value='$id'>$value</option>";
        }
    } else {
        echo "<option value=''>No se encontraron resultados</option>";
    }
}
?>