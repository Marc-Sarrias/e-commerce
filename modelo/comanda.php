<?php

function inserirComanda($connexio, $data_creacio, $num_items, $total, $usuari_id, $Id){
    $query = 'INSERT INTO "Comanda" ("data_creacio", "num_elements", "import_total", "usuari_id", "Id") VALUES ($1, $2, $3, $4, $5)';
    $consulta = pg_query_params($connexio, $query, array($data_creacio, $num_items, $total, $usuari_id, $Id));
    pg_close();
    return $consulta;
}

?>