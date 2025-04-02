<?php
$omitirInici = true; 
include __DIR__ . '/../../controlador/categories.php';
?>

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
    <div class="container" id="containerProdctes">
        <h1>Comandes</h1> 
        <?php if (!isset($comandesAmbLinies) || empty($comandesAmbLinies)) { ?>
            <p>No has fet cap comanda</p>
        <?php }  else {?>
            <?php foreach ($comandesAmbLinies as $item): ?>
                <h4>Comanda realitzada el: <?php echo $item['comanda']['data_creacio'] ?></h4>
                <ul>
                    <?php foreach ($item['linies'] as $linia): ?>
                        <p><?php echo $linia['nom_producte'] ?></p>
                        <p>Items: <?php echo $linia['quantitat'] ?></p>
                        <p><?php echo $linia['preu_total'] ?> €</p>
                        <hr>
                    <?php endforeach; ?>
                    <p> Total: <?php echo $item['comanda']['import_total'] ?> €</p>
                </ul>
            <?php endforeach; ?>
        <?php } ?>
    </div>

</body>

<script src="js/funcions.js"></script>

</html>
