<?php
session_start();
require_once __DIR__.'/../modelo/connectaBD.php';
require_once __DIR__.'/../modelo/comandes.php';

$connexio = connectBD();

$comandes = buscarComanda($connexio, $_SESSION['id_user']);

$comandesAmbLinies = array();

if($comandes){
    foreach($comandes as $comanda){
        $comandesAmbLinies[] = [
            'comanda' => $comanda,
            'linies' => buscarLiniaComanda($connexio, $comanda['Id'])
        ];
    }
}

require_once __DIR__.'/../vista/Comandes/comandes.php';
