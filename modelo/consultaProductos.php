<?php

function consultaProductos($connexio, $categoria_id){
    //hacemos la consulta para saber los nombres de los productes de esa categoria en concreto
    $comprovacio = 'SELECT "foto", "nom", "Precio", "Id" FROM "Producto" WHERE "categoria_id"=$1';  
    $consulta = pg_query_params($connexio, $comprovacio, array($categoria_id));
    
    if(!$consulta){
        throw new Exception("(pg_query) " . pg_last_error());
    }

    //obtenemos todos los valores (array associativo)
    $resultat = pg_fetch_all($consulta);
    pg_close();
    return $resultat;

}

?>