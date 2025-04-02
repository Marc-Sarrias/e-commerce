<?php
session_start();

$producte_id = $_GET['product'];
$_SESSION['items'] -= $_SESSION['carrito'][$producte_id]['quantitat'];

if ($_SESSION['items'] === 0){
    $_SESSION['total'] = 0;
} 
else{
    $_SESSION['total'] -= $_SESSION['carrito'][$producte_id]['total'];
}

unset($_SESSION['carrito'][$producte_id]);

exit;
?>

