<?php

function consultaProductos($connexio, $producte_id){
    //hacemos la consulta para saber los nombres de los productes de esa categoria en concreto
    $comprovacio = 'SELECT "Id", "nom", "descripcion", "Precio", "foto" FROM "Producto" WHERE "Id"=$1';  
    $consulta = pg_query_params($connexio, $comprovacio, array($producte_id));
    
    if(!$consulta){
        throw new Exception("(pg_query) " . pg_last_error());
    }

    $resultat = pg_fetch_assoc($consulta);

    //pg_fetch_row retorna un array amb les dades de la consulta que s'accedeix amb un array indexat ($resultat[0]);
    //pg_fetch_assoc retorna un array associatiu ($resultat['nom']);

    pg_close();
    return $resultat;

}

?>
