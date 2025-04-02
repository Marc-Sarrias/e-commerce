<?php
session_start();
require_once __DIR__.'/../modelo/connectaBD.php';
require_once __DIR__.'/../modelo/perfil.php';

$connexio = connectBD();
$id_user = $_SESSION['id_user'];

// Mostrar el perfil del usuario
$user = getPerfil($connexio, $id_user);

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $email = $_POST['correu'];
    $nom = $_POST['nom'];
    $adreça = $_POST['adreça'];
    $poblacio = $_POST['població'];
    $codi_postal = $_POST['codi_postal'];

    $segur = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $segur = true;
    }

    $filesAbsolutePath = '/home/TDIW/tdiw-i5/public_html/uploadedFiles/'; // Ruta donde se guardan los archivos

    if (isset($_FILES['profile_image']['tmp_name']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $foto = uniqid('img_') . '_' . basename($_FILES['profile_image']['name']); // Nombre único para el archivo
        $destinationPath = $filesAbsolutePath . $foto; // Ruta completa del destino
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $destinationPath);
    } 
    else{
        $foto = null;
    }

    if($segur){
        if ($_POST['contrasenya'] == $_POST['confirmació_contrasenya']) {
            $contrasenya_hash = password_hash($_POST['contrasenya'], PASSWORD_DEFAULT);
            
            // Actualizar el perfil en la base de datos
            $actualizado = modificarPerfil($connexio, $id_user, $email, $contrasenya_hash, $nom, $adreça, $poblacio, $codi_postal, $foto);
            
            // Si la actualización fue exitosa, obtener los datos actualizados
            if ($actualizado) {
                $user = getPerfil($connexio, $id_user); // Obtener los datos más recientes
            }
        } 
    }
}

require_once __DIR__.'/../vista/Perfil/perfil.php';
?>
