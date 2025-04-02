<?php
    function iniciarSessio($connexio, $correu, $contrasenya) {
        $sql = 'SELECT "Email", "Contrasenya", "Id" FROM "Usuario" WHERE "Email" = $1';
        $consulta = pg_query_params($connexio, $sql, array($correu));

        $sessio = pg_fetch_row($consulta); //retorna un array amb les dades de la consulta
    
        pg_close();
        if(!$sessio)
            return 'noCompte';    
        else {
            if(password_verify($contrasenya, $sessio[1])){
                return array('loginCorrecte', $sessio[2]);
            }
            else{
                return 'contrasenyaIncorrecta';
            }
        }
    }

?>