<?php
    //incluimos los ficheros para poder conectarnos a la base de datos y hacer la consulta (coger los productos)
    require_once __DIR__ . '/../modelo/connectaBD.php';
    $connexio = connectBD();

    require_once __DIR__ . '/../modelo/consultaProductos.php';
    $categoria_id = $_GET['category_id'];
    $productes = consultaProductos($connexio, $categoria_id);

    require_once __DIR__ . '/../vista/Productes/productes.php';
  
?>