<?php 
function buscarComanda($connexio, $user_id){
    $sql = 'SELECT "data_creacio", "import_total", "Id" FROM "Comanda" WHERE "usuari_id" =$1';

    $consulta = pg_query_params($connexio, $sql, array($user_id));

    $comandes = pg_fetch_all($consulta);
    return $comandes;
}

function buscarLiniaComanda($connexio, $id_comanda){
    $sql = 'SELECT "nom_producte", "quantitat", "preu_total" FROM "Linia_comanda" WHERE "comanda_id" = $1';

    $consulta = pg_query_params($connexio, $sql, array($id_comanda));

    $comandes = pg_fetch_all($consulta);
    return $comandes;
}