<?php
session_start();

require_once __DIR__ . '/../modelo/connectaBD.php';
require_once __DIR__ . '/../modelo/comanda.php';
require_once __DIR__ . '/../modelo/lineaComanda.php';

$connexio = connectBD();

if (!isset($_SESSION["loggeado"])) {
    exit;
}

// Si está loggeado, continúa con la lógica de insertar la comanda
date_default_timezone_set("Europe/Madrid");
$data = date("Y-m-d H:i:s");
$productes_totals = $_SESSION['items'];
$preu_total = $_SESSION['total'];
$id_user = $_SESSION['id_user'];
$id_comanda = uniqid('comanda_');

$result_comanda = inserirComanda($connexio, $data, $productes_totals, $preu_total, $id_user, $id_comanda);

if ($result_comanda) {
    foreach ($_SESSION['carrito'] as $id => $producte) {
        $id_linia_comanda = uniqid('linia_');
        $nom = $producte['name'];
        $quantitat = $producte['quantitat'];
        $preu_unitari = $producte['preu'];
        $preu_total = $producte['total'];
        $product_id = $producte['id'];

        inserirLineaComanda($connexio, $id_linia_comanda, $nom, $quantitat, $preu_unitari, $preu_total, $product_id, $id_comanda);
    }

    // Vaciar el carrito después de la inserción exitosa
    unset($_SESSION['carrito']);
    $_SESSION['total'] = 0;
    $_SESSION['items'] = 0;
}

// Redirigir a la página de confirmación
header("Location: ../vista/Carrito/confirmacioComanda.php");
exit;


?>