<?php
session_start();
ob_clean();// Limpia cualquier salida previa al script

require_once __DIR__ . '/../modelo/connectaBD.php';
require_once __DIR__ . '/../modelo/infoProducte.php';

$connexio = connectBD();
$producte_id = $_GET['product'];
$cantidad = $_GET['quant'];

$producte_info = consultaProductos($connexio, $producte_id);

if (!isset($_SESSION['carrito'][$producte_id])) {
    // Inicializar el producto en el carrito
    $_SESSION['carrito'][$producte_id] = array(
        'id' => $producte_id,
        'name' => $producte_info['nom'],
        'foto' => $producte_info['foto'],
        'preu' => $producte_info['Precio'],
        'total' => $producte_info['Precio'] * (float)$cantidad,
        'quantitat' => (int)$cantidad, 
    );
    
} else {
    // Incrementar la cantidad si ya existe
    $_SESSION['carrito'][$producte_id]['quantitat'] += (int)$cantidad;
    $_SESSION['carrito'][$producte_id]['total'] = (int)$_SESSION['carrito'][$producte_id]['quantitat'] * (float)$_SESSION['carrito'][$producte_id]['preu'];

}

if (!isset($_SESSION['items'])) {
    $_SESSION['items'] =(int)$cantidad;
} else {
    $_SESSION['items'] += (int)$cantidad;
}

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = (float)$_SESSION['carrito'][$producte_id]['total'];
} else {
    $_SESSION['total'] += (int)$cantidad * (float)$_SESSION['carrito'][$producte_id]['preu'];
}


echo $_SESSION['total'] . "," . $_SESSION['items'];
exit;

