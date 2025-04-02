<?php
function getPerfil($connexio, $id_user){
    // Preparar la consulta SQL usando un parámetro
    $sql = 'SELECT "Email", "Contrasenya", "Adreça", "Nom", "Id", "Població", "Codi_Postal", "Foto"
        FROM "Usuario" WHERE "Id" = $1';
    
    $smtm_name = "get_user_" . uniqid();
    $consulta = pg_prepare($connexio, $smtm_name, $sql);
    $result = pg_execute($connexio, $smtm_name, array($id_user));
    return pg_fetch_assoc($result);
}

function modificarPerfil($connexio, $id_user, $email, $contrasenya, $nom, $adreca, $poblacio, $codi_postal, $foto) {
    $sql = 'UPDATE "Usuario" 
            SET "Email" = $1, "Contrasenya" = $2, "Nom" = $3, "Adreça" = $4, "Població" = $5, "Codi_Postal" = $6, "Foto" = $7
            WHERE "Id" = $8';
    
    $consulta = pg_prepare($connexio, "update_user", $sql);
    $result = pg_execute($connexio, "update_user", array($email, $contrasenya, $nom, $adreca, $poblacio, $codi_postal, $foto, $id_user));
    return $result !== false;
}




?>