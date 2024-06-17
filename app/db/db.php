<?php
$db = mysqli_connect( 'localhost','root','','smc_pfmr');

if (!$db) {
    echo 'connect die!';
    mysqli_connect_error();
}
?>