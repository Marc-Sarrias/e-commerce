<?php
session_start();

$producte_id = $_GET['product'];
$cantidad = $_GET['quant'];

if($cantidad > $_SESSION['carrito'][$producte_id]['quantitat']) {
    $diferencia = $cantidad-$_SESSION['carrito'][$producte_id]['quantitat'];
    $_SESSION['carrito'][$producte_id]['quantitat'] = (int)$cantidad;
    $_SESSION['carrito'][$producte_id]['total'] = (int)$_SESSION['carrito'][$producte_id]['quantitat'] * (float)$_SESSION['carrito'][$producte_id]['preu'];
    
    $_SESSION['items'] += (int)$diferencia;
    $_SESSION['total'] += ((float)$_SESSION['carrito'][$producte_id]['preu']*(int)$diferencia);

} else if($cantidad < $_SESSION['carrito'][$producte_id]['quantitat']){
    $diferencia2 = $_SESSION['carrito'][$producte_id]['quantitat']-$cantidad;
    $_SESSION['carrito'][$producte_id]['quantitat'] = (int)$cantidad;
    $_SESSION['carrito'][$producte_id]['total'] = (int)$_SESSION['carrito'][$producte_id]['quantitat'] * (float)$_SESSION['carrito'][$producte_id]['preu'];

    $_SESSION['items'] -= (int)$diferencia2;
    $_SESSION['total'] -= ((float)$_SESSION['carrito'][$producte_id]['preu']*(int)$diferencia2);
} 
?>



