<?php
    require_once __DIR__ . '/../modelo/connectaBD.php';
    require_once __DIR__ . '/../modelo/login.php';
    require_once __DIR__ . '/../vista/Login/login.php';
    session_start();

    $_SESSION["loggeado"] = "False";


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $correu = $_POST["correu"];
        $contrasenya = $_POST["contrasenya"];

        $connexio = connectBD();
        $result = iniciarSessio($connexio, $correu, $contrasenya);

        if(is_array($result)){
            $id_user=$result[1];
            $result=$result[0];
        }

        switch($result){
            case 'noCompte':
                header('Location: ../vista/Login/login.php?alert=noCompte');
                exit;
            case 'loginCorrecte':
                header('Location: ../resource_categories.php?alert=loginCorrecte');
                $_SESSION["loggeado"] = "True";
                $_SESSION["id_user"] = $id_user;
                exit;
            case 'contrasenyaIncorrecta':
                header('Location: ../vista/Login/login.php?alert=contrasenyaIncorrecta');
                exit;
        }
    } else {
        //Si existe una alerta, redirigimos con esta alerta
        if (isset($_GET['alert'])) {
            header("Location: ../vista/Login/login.php?alert=" . $_GET['alert']);
        } else {
            header("Location: ../vista/Login/login.php");
        }
    exit;
    }

    



