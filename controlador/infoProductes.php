<?php
    //incluimos los ficheros para poder conectarnos a la base de datos y hacer la consulta (coger los productos)
    require_once __DIR__ . '/../modelo/connectaBD.php';
    require_once __DIR__ . '/../modelo/infoProducte.php';

    $connexio = connectBD();
    //aqui recuperem el ID del producte que hem clicat, com no es cap formulari ni hem introduit cap dada, hem de fer servir GET!!!
    $producte_id = $_GET['producte_id'];

    $producte_info = consultaProductos($connexio, $producte_id);

    require_once __DIR__ . '/../vista/Productes/infoProductes.php';
  
?>