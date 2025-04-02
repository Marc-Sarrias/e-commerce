<?php

function cercador($connexio, $text){
    $sql = 'SELECT "Id", "nom", "descripcion", "Precio", "foto" FROM "Producto" WHERE nom  ILIKE $1';
    $cerca = '%' . $text . '%';
    
    $consulta = pg_query_params($connexio, $sql, array($cerca));

    $resultats = pg_fetch_all($consulta);
    pg_close();
    return $resultats;
}