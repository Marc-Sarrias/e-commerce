<?php

function connectBD(){
    //establecemos la conexión con la base de datos
    $connexio = pg_connect("host='127.0.0.1' port='5432' dbname='tdiw-i5' user='tdiw-i5' password='xPiNHAQs'")
    or die("Error para conectarse a la base de datos");
    return $connexio;
}

?>