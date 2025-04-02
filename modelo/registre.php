<?php

function insertarUsuari($connexio, $nom, $user, $correu, $contrasenya_hash, $adreça, $poblacio, $codi_postal){
    //comprovem si ja existeix l'usuari, farem una cerca amb la seva clau primària per veure si existeix
    $comprovació1 = 'SELECT "Id" FROM "Usuario" WHERE "Id" = $1';
    $consultaNomUsuari= pg_query_params($connexio, $comprovació1, array($user));

    $comprovació2 = 'SELECT "Email" FROM "Usuario" WHERE "Email" = $1';
    $consultaEmail = pg_query_params($connexio, $comprovació2, array($correu));

    // correu existent, compte ja registrat
    //en cas que si s'hagin trobat resultats, vol dir que ja existeix un usuari amb aquest correu
    if (pg_num_rows($consultaEmail) > 0) {
        pg_close();
        return 'registreExistent';
    }

    //nom de usuari existent, ha d'escollir un altre
    if (pg_num_rows($consultaNomUsuari) > 0) 
    {
        pg_close();
        return 'nomUsuariExistent';
    }
    
    //si no existeix l'usuari i el username no esta agafat, podem inserir
    $query = 'INSERT INTO "Usuario" ("Email", "Contrasenya", "Adreça", "Nom", "Id", "Població", "Codi_Postal") VALUES ($1, $2, $3, $4, $5, $6, $7)';
    $consulta = pg_query_params($connexio, $query, array($correu, $contrasenya_hash, $adreça, $nom, $user, $poblacio, $codi_postal));
    pg_close();
    if ($consulta) 
        return 'registro';
    
}
?>
