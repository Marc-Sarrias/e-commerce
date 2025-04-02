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

<header class="header"> 
    <div class="navbar">
        <!-- Título y logo -->
        <div class="header-content">
            <a href="./../../resource_categories.php">
                <img id="Logo" src="../../imagenes/logo.png" class="logo-image" alt="Logo">
            </a>
            <h1 class="title"><a href="./../../resource_categories.php">TINTA & TENTACIÓN</a></h1>
        </div>

        <form  method="GET">
            <label for="cercador">Cerca els teus productes: </label>
            <input type="text" id="cercador" name="cercador" placeholder="Busca aquí...">
            <button id="cerca" type="submit">Cercar</button>
        </form>

        <div class="user-cart">
            <!-- Icono del carrito -->
            <a href="../../resource_carrito.php">
                <img id="cartButton" src="../../imagenes/carrito.png" class="cart-image" alt="Carrito">
            </a>
            
            <!-- Información del carrito -->
            <p>Quantitat: </p><p id="items_carrito"><?php echo $_SESSION['items'] ?? '0'; ?></p>
            <p>Total: </p><p id="total_carrito"><?php echo $_SESSION['total'] ?? '0'; ?> €</p> 

            <!-- Menú desplegable del usuario -->
            <div class="menu">
                <img id="accountButton" src="../../imagenes/usuario.png" class="account-image" alt="Usuario">
                <div class="dropdown" id="accountDropdown">
                    <?php if (isset($_SESSION["loggeado"]) && ($_SESSION["loggeado"] === "True")): ?>
                        <a href="../../index.php?action=perfil">Perfil</a>
                        <a href="../../index.php?action=carrito">Carrito</a>
                        <a href="../../index.php?action=comandes">Comandes</a>
                        <a href="../../index.php?action=logout">Cerrar sesión</a>
                    <?php else: ?>
                        <a href="../../index.php?action=login">Iniciar Sesión</a>
                    <?php endif; ?>
                </div>
            </div> 
        </div>
    </div>

    <!-- Navegación de categorías -->
    <nav class="categories">
        <?php if (!empty($categories)): ?>
            <?php foreach($categories as $categoria): ?>
                <div class="category">
                    <a id="<?php echo $categoria['Id']; ?>" 
                       href="/index.php?action=productes&category_id=<?php echo $categoria['Id']; ?>" 
                       class="category-link">
                        <?php echo htmlentities($categoria['Nom'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-category-message">No se han encontrado categorías</p>
        <?php endif; ?>
    </nav>

    <?php
        if (isset($_GET['alert'])) {
            switch($_GET['alert']) {
                case 'registro':
                    //ha hecho el registro correcto (viene de registro)
                    echo "<script>alert('Registre correcte');</script>";
                    break;
                case 'loginCorrecte':
                    //ha hecho el login correcto (viene de login)
                    echo "<script>alert('Sessió iniciada correctament');</script>";
                    break;
            }

        }
    ?>

    <script>
        $('#accountButton').click(function(event) {
            event.preventDefault();
            $('#accountDropdown').toggle();
        });

        /* cerrar el menu si se va fuera
        $(document).click(function(event) {
            if (!$(event.target).closest('#accountButton, #accountDropdown').length) {
                $('#accountDropdown').hide();
            }
        });
        */
    </script>

    <script src="js/funcions.js"></script>

</header>



