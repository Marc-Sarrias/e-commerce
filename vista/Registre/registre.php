<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./../Registre/registre.css" />
    

</head>
<body>
    <section>
        <header>
            <div class="header-content">
                    <a href="./../../resource_categories.php">
                        <img id="Logo" src="../../imagenes/logo.png" class="logo-image">
                    </a>
                    <h1 class="title"><a href="./../../resource_categories.php">TINTA & TENTACIÓN</a></h1>
            </div>
            <h3>Registra't com a nou usuari: </h3>
        </header>
        <p>Omple el següent formulari per a completar el registre</p>
        
        <?php 
            //Mostramos mensajes de acuerdo al valor de 'alert' en la URL
            if (isset($_GET['alert'])) {
                switch($_GET['alert']) {
                    case 'nomUsuariExistent':
                        echo "<script>alert('Nom usuari existent, escull un altre');</script>";
                        break;
                    case 'error':
                        echo "<script>alert('Error en el registre, torna a intentar-ho.');</script>";
                        break;
                    case 'noValid':
                        echo "<script>alert('Error. Revisa que el correu estigui en el format vàlid.');</script>";
                        break;
                    case 'noDigits':
                        echo "<script>alert('El codi postal han de ser 5 dígits numèrics');</script>";
                        break;
                }

            }

            $nom = $user = $correu = $contrasenya = $confirma_contrasenya = $adreça = $població = $codi_postal = $contrasenya_hash="";
        ?>
        <!--Enviem el formulari al controlador-->
        <!--com es un formulari i enviem, hem de fer servir POST-->
        <form action="../../controlador/registre.php" method="POST" onsubmit="return validar();">
            <label>Nom i Cognom:</label> <input class="info" type="text" name="nom" id="nom" value="<?php echo $nom; ?>" required> <br> <br>
            <label>Nom Usuari: </label> <input class="info" type="text" name="user" id="user" value="<?php echo $user; ?>"  required> <br> <br>
            <label>Correu Electrònic: </label><input class="info" type="mail" name="correu" id="correu" value="<?php echo $correu; ?>" required> <br> <br>
            <label>Constraenya: </label><input class="info" type="password" name="contrasenya" id="contrasenya" value="<?php echo $contrasenya; ?>" required> <br> <br>
            <label>Confirma Contrasenya: </label><input class="info" type="password" name="confirmació_contrasenya" id="confirmació_contrasenya" value="<?php echo $confirma_contrasenya; ?>" required> <br> <br>
            <label>Adreça: </label><input class="info" type="text" name="adreça" id="adreça" value="<?php echo $adreça; ?>"  required> <br> <br>
            <label>Població: </label><input class="info" type="text" name="població" id="població" value="<?php echo $població; ?>" required> <br> <br>
            <label>Codi Postal: </label><input class="info" type="number" name="codi_postal" id="codi_postal" value="<?php echo $codi_postal; ?>" required> <br> <br>
            <input class="info" type="submit" value="Registrar-se">
        </form>
    </section>
    
    <script src="../../js/funcions.js"></script>

</body>
</html>