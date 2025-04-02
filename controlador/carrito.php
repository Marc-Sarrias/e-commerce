<?php
session_start();
//incluimos los ficheros para poder conectarnos a la base de datos y hacer la consulta (coger los productos)
require_once __DIR__.'/../modelo/connectaBD.php';

//si no té cap carrito creat, en creem un
if (!isset($_SESSION['carrito']))
    $_SESSION['carrito'] = array();

$productes = $_SESSION['carrito'];

require_once __DIR__.'/../vista/Carrito/carrito.php';
?>