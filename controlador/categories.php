<?php
session_start();
//incluimos los ficheros para poder conectarnos a la base de datos y hacer la consulta (coger los productos)
require_once __DIR__.'/../modelo/connectaBD.php';
require_once __DIR__.'/../modelo/consultaCategories.php';

if (!isset($_SESSION['items'])) {
    $_SESSION['items'] = 0;
}

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

$connexio = connectBD();

$categories = consultaCategorias($connexio);

require_once __DIR__.'/../vista/Header/header.php';
?>