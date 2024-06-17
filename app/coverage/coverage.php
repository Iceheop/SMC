<?php

if (isset($_SESSION['perfil'])) {
    
    $perfil = $_SESSION['perfil'];
    $matricula = $perfil[0];

    $query = mysqli_query($db, "SELECT * FROM infogeneral WHERE id = '$matricula' ");
    $result = mysqli_fetch_array($query);

}else {

    header('Location: ../../../index.php');
    exit;
    
}

?>
