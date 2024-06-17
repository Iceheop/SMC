<?php
//base de datos
include_once('../../../../db/db.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    //query consultar datos
    $query = mysqli_query($db, "SELECT * FROM reportes WHERE id ='$id' ");
    $result = mysqli_fetch_array($query);

    if ($result !== null && isset($result)) {

        $matricula_a = $result['matricula_a'];
        $matricula_d = $result['matricula_d'];
        $matricula_r = $result['matricula_r'];
        $nota = $result['nota'];
        $reporte = $result['reporte'];

        $response = [
            'success' => 1,
            'matricula_a' => $matricula_a,
            'matricula_d' => $matricula_d,
            'matricula_r' => $matricula_r,
            'nota' => $nota,
            'reporte' => $reporte
        ];
        echo json_encode($response);
        exit();
    }
} else {
    $response = [
        'success' => 0,
        'text' => 'Reporte no encotrado!',
        'message' => 'Hola! al parecer el reporte no se encuntra.',
    ];
    echo json_encode($response);
    exit();
}
