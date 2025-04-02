<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla d'Inici</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/../vista/Productes/productes.css" />
    <link rel="stylesheet" type="text/css" href="/../vista/Productes/infoProductes.css" />
</head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

<body>  
    <div class="grid-container" id="contenedor">
        <?php foreach($productes as $producte) { ?>
            <li class="grid-item">
                <a id="<?php echo $producte['Id'];?>" href="/index.php?action=productes&producte_id=<?php echo $producte['Id'];?>" class="product">
                    <img src="../../imagenes/<?php echo $producte['foto']; ?>" class="foto-producto" alt="<?php echo $producte['nom']; ?>">
                </a>
                <p class="nombre-producto"><?php echo $producte['nom']; ?></p>
                <p class="precio-producto"><?php echo $producte['Precio']. "€"; ?></p>
            </li>
        <?php } ?>
    </div>

    <script src="js/funcions.js"></script>
</body>

</html>