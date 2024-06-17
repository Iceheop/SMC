<?php
include_once("../../../db/db.php");

/* Funcion para contar los alummno de cada grado */
function contar($tabla,$rol,$grado){
    global $db;

    $query = mysqli_query($db,"SELECT COUNT(*) as count FROM $tabla WHERE (grado = $grado) AND ($tabla.id IN (SELECT matricula FROM usuarios WHERE rol_id = $rol))");
    $result = mysqli_fetch_array($query);
    return $result['count'];
}

/* arreglo de objetos con cada grado */
$data = [
    [
        'value' => contar("infogeneral",3,2),
        'name'  => "3ro"
    ],
    [
        'value' => contar("infogeneral",3,3),
        'name'  => "4to"
    ],
    [
        'value' => contar("infogeneral",3,4),
        'name'  => "5to"
    ],
    [
        'value' => contar("infogeneral",3,5),
        'name'  => "6to"
    ]
];

/* devolver el odjeto a js */
echo json_encode($data);
exit();
?>