<?php
require_once __DIR__.'/../modelo/connectaBD.php';
require_once __DIR__.'/../modelo/cercador.php';

$connexio = connectBD();

if(isset($_GET['cercador'])){
    $infoCercador = $_GET['cercador'];
    $productes = cercador($connexio, $infoCercador);

    if($productes){
        require_once __DIR__.'/../vista/Productes/productes.php';
    } else {
        echo "<p>No s'han trobat productes.</p>";
    }
}



