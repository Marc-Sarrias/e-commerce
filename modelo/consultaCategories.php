<?php

function consultaCategorias($connexio){
    //SQL: seleccionamos todos los nombres de los productos
    $sql = 'SELECT "Nom", "Id" FROM "Categoria"';  

    //hacemos la consulta SQL a la base datos (y comprobamos que se haya realizado bien)
    $consulta = pg_query($connexio, $sql);
    if(!$consulta){
        throw new Exception("(pg_query) " . pg_last_error());
    }

    //obtenemos todos los valores (array associativo)
    //fem un pg_fetch_all quan la consulta té més d'un resultat (en aquest cas varies categories)
    $resultat = pg_fetch_all($consulta);
    pg_close();
    return($resultat);

}
