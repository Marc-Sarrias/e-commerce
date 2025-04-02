<?php

require_once __DIR__ . '/../resource_registre.php';
require_once __DIR__ . '/../modelo/connectaBD.php';
require_once __DIR__ . '/../modelo/registre.php';
session_start();


$connexio = connectBD();

//al ser formulari i ens han enviat les dades que ha posat l'usuari, s'ha de fer amb POST!!!
if ($_SERVER["REQUEST_METHOD"] == "POST") {   
    //para comprovar que no estan vacias con el issemtpy(variable) ejemplo: !empty($_POST["nom"])
    if(isset($_POST["nom"])) { $nom = $_POST["nom"]; }
    if(isset($_POST["user"])) { $user = $_POST["user"]; }
    if(isset($_POST["correu"])) { $correu = $_POST["correu"];  }
    if(isset($_POST["contrasenya"])) {  $contrasenya = $_POST["contrasenya"]; }
    if(isset($_POST["confirmació_contrasenya"])) {$confirma_contrasenya = $_POST["confirmació_contrasenya"]; }
    if(isset($_POST["adreça"])) { $adreça = $_POST["adreça"]; }
    if(isset($_POST["població"])) { $població = $_POST["població"];}
    if (isset($_POST["codi_postal"])) {
        $codi_postal = $_POST["codi_postal"];
    }
    
    #fem un hash de la contrasenya per a tenir-la segura (privacitat de dades)
    $contrasenya_hash = password_hash($contrasenya, PASSWORD_DEFAULT);

    $segur = false;
    if (filter_var($correu, FILTER_VALIDATE_EMAIL)) {
        $segur = true; 
    }

    $valid = false;
    if (preg_match('/^\d{5}$/', $codi_postal)) {
        $valid = true; 
    }


    if($segur && $valid){
        $resultat = insertarUsuari($connexio, $nom, $user, $correu, $contrasenya_hash, $adreça, $població, $codi_postal);
            
        switch($resultat){
            //usuario existe correo no
            case 'nomUsuariExistent': 
                header('Location: ../vista/Registre/registre.php?alert=nomUsuariExistent');
                exit;
            case 'registreExistent':
                header('Location: ../resource_login.php?alert=registreExistent');
                exit;
            case 'registro':
                $_SESSION["loggeado"] = "True";
                $_SESSION['id_user']=$user;
                header('Location: ../resource_categories.php?alert=registro');
                exit;
        }
    }
    else{
        if(!$segur){
            header('Location: ../vista/Registre/registre.php?alert=noValid');
        } else if(!$valid){
            header('Location: ../vista/Registre/registre.php?alert=noDigits');
        }
    }
} else {
    header('Location: ../vista/Registre/registre.php');
}



