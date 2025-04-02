<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./../Login/login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Log in</title>
</head>
<body>
    <header>
        <div class="header-content">
                <a href="./../../resource_categories.php">
                    <img id="Logo" src="../../imagenes/logo.png" class="logo-image">
                </a>
                <h1 class="title"><a href="./../../resource_categories.php">TINTA & TENTACIÓN</a></h1>
        </div>
    </header>
    <p>Omple el següent formulari per a iniciar sessió.</p>
        
    <?php
        if (isset($_GET['alert'])) {
            switch($_GET['alert']) {
                case 'registreExistent':
                    //Ha intentat registrar-se però ja té un compte (viene de registro)
                    echo "<script>alert('Compte ja existent, inicia sessió');</script>";
                    break;
                case 'noCompte':
                    //ha intentat iniciar sessió per no té compte (viene de login)
                    echo "<script>alert('No tens cap compte creat');</script>";
                    break;
                case 'contrasenyaIncorrecta':
                    //ha intentat iniciar sessió però ha posat malament la contrasenya (viene de login) 
                    echo "<script>alert('Contrasenya Incorrecte');</script>";
                    break;
            }
    
        }


        $correu = $contrasenya = "";
    ?>
    
    <form action="../../controlador/login.php" method = "POST">
        Correu: <input type="mail" name="correu" id="correu" value="<?php echo $correu; ?>" required> <br> <br>
        Contrasenya: <input type="password" name="contrasenya" id="contrasenya" value="<?php echo $contrasenya;?>" required> <br> <br>
        <input type="submit" value="Log in">
    </form>
    <p>Encara no tens un compte? <a href="./../../index.php?action=registre">Registra't!</a></p>
</body>
</html>