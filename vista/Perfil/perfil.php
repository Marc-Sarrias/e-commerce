<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla d'Inici</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/../vista/Inici/inici.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/../vista/Productes/productes.css" />
    <link rel="stylesheet" type="text/css" href="/../vista/Productes/infoProductes.css" />

</head>
<body>
    <h1>Modificar el meu Perfil</h1>
    <h2>Informació del compte</h2>
    <img src="../../uploadedFiles/<?php echo $user['Foto']; ?>" class="foto" >
    <form method="POST" action="../../controlador/perfil.php" enctype="multipart/form-data">
        <label>Foto de perfil </label> <input class="info" type="file" name="profile_image" id="profile_image" value="<?php echo $user['Foto'];?>"> <br> <br>
        <label>Nom Usuari: </label> <input class="info" type="text" name="user" id="user"  value="<?php echo $user['Id'];?>" required> <br> <br>
        <label>Correu Electrònic: </label><input class="info" type="mail" name="correu" id="correu" value="<?php echo $user['Email'];?>" required> <br> <br>
        <label>Constraenya: </label><input class="info" type="password" name="contrasenya" id="contrasenya" required> <br> <br>
        <label>Confirma Contrasenya: </label><input class="info" type="password" name="confirmació_contrasenya" id="confirmació_contrasenya" required> <br> <br>
        <h2>Informació personal</h2>
        <label>Nom i Cognom:</label> <input class="info" type="text" name="nom" id="nom" value="<?php echo $user['Nom'];?>" required> <br> <br>
        <label>Adreça: </label><input class="info" type="text" name="adreça" id="adreça"  value="<?php echo $user['Adreça'];?>" required> <br> <br>
        <label>Població: </label><input class="info" type="text" name="població" id="població" value="<?php echo $user['Població'];?>" required> <br> <br>
        <label>Codi Postal: </label><input class="info" type="number" name="codi_postal" id="codi_postal" value="<?php echo $user['Codi_Postal'];?>" required> <br> <br>
        <input class="info" type="submit" value="Modificar">
    </form>

    <a href="../../resource_categories.php"><button>Tornar a l'inici</button></a>
</body>
</html>