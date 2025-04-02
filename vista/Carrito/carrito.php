<?php
$omitirInici = true; 
include __DIR__ . '/../../controlador/categories.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/../vista/Inici/inici.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" id="containerProdctes">
        <h1>Carrito</h1>
        <div id="cabas">
            <?php if (!empty($productes)) { ?>
                <?php foreach ($_SESSION['carrito'] as $id => $producte) { ?>
                    <div id="<?php echo $id; ?>">
                        <p><?php echo $producte['name']; ?> </p>
                        <img class="foto" src="../imagenes/<?php echo $producte['foto']; ?>" alt="<?php echo $producte['name']; ?>">
                        <p><?php echo $producte['total']; ?> €</p>
                        <div class='quant'>
                            <label for='quantitat'> Cantidad:</label>
                            <input type='number' min="1" value="<?php echo $producte['quantitat']; ?>" id='quantitat_<?php echo $id; ?>'>
                            <button type="submit" onclick="actualitzaCarrito('<?php echo $id; ?>');">Actualitza</button>
                        </div>
                        <button class="elim" onclick="eliminarProducte('<?php echo $id; ?>');">Eliminar</button>
                        <br>
                    </div>
                <?php } ?>
                <div id="eliminat"></div>
                <p>Preu total: </p> <p id="items_carrito"><?php echo $_SESSION['total']?> €</p>
                <button class="eliminar" onclick="buidarCabas();">Buidar Cabàs</button>
                <button onclick="finalitzarCompra();">Finalitzar compra</button>
                <br>
            <?php } else { ?>
                <p>Carrito Vacío</p>
            <?php } ?>
        </div>
        <a href="resource_categories.php"><button>Seguir Comprant</button></a>

    </div>
    
    <?php
        if (isset($_GET['alert'])) {
            echo "<script>alert('Has d'iniciar sessió, per realitzar la compra');</script>";
        }
    ?>

    <script src="js/funcions.js"></script>


</body>
</html>
