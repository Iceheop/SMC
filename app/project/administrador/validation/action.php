<?php
include_once('../../../db/db.php');

if (isset($_POST['eliminar'])) {
    if ($_POST['eliminar']) {
        //variables
        $id = $_POST['eliminar'];
        //query
        $query = mysqli_query($db, "DELETE FROM infogeneral WHERE id ='$id' ");
        if ($query !== null && isset($query)) {
            $response = [
                'success' => 1,
                'text' => 'Alumno eliminado!'
            ];
            echo json_encode($response);
            exit();
        } else {
            $response = [
                'success' => 0,
                'text' => 'Alumno no encotrado!'
            ];
            echo json_encode($response);
            exit();
        }
    }
}

if (isset($_POST['añadir'])) {
    if (isset($_POST['añadir'])) {
        //variables Alumno
        $nombre = $_POST['nombre'];
        $matricula = $_POST['matricula'];
        $password = $_POST['password'];
        $numero = $_POST['numero'];
        $curso = $_POST['curso'];
        $grado = $_POST['grado'];
        $area = $_POST['area'];
        $tecnico = $_POST['tecnico'];

        //query insertar alumno
        $query = "INSERT INTO infogeneral (nombre,matricula,no_orden,curso,grado,area,materia,tecnico) VALUES ('$nombre','$matricula','$numero','$curso','$grado','$area','1','$tecnico')";
        $result = mysqli_query($db, $query);

        //validar que el query funciona
        if ($query !== null && isset($query)) {

            //seleciondo id del alumno
            $query_id = mysqli_query($db, "SELECT * FROM infogeneral WHERE matricula = $matricula");
            $result_id = mysqli_fetch_array($query_id);
            $matricula_alumo = $result_id['id'];

            //insertar en usuarios
            $query = "INSERT INTO usuarios (rol_id,user,matricula,password) VALUES ('3','$matricula','$matricula_alumo','$password')";
            $result = mysqli_query($db, $query);

            //respuesta
            $response = [
                'success' => 1,
                'text' => 'Alumno Anadido con exito!'
            ];
            echo json_encode($response);
            exit();
        } else {
            $response = [
                'success' => 0,
                'text' => 'Alumno no insertado en infogeneral!'
            ];
            echo json_encode($response);
            exit();
        }
    } else {
        $response = [
            'success' => 0,
            'text' => 'registro no llego!'
        ];
        echo json_encode($response);
        exit();
    }
}
