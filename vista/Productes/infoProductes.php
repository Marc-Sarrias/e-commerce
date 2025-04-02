<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla d'Inici</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/../vista/Productes/infoProductes.css" />
</head>

<body>
    <div class="grid">
        <img class="foto" style="grid-area:foto" src="../imagenes/<?php echo $producte_info['foto']; ?>" alt="<?php echo $producte_info['nom']; ?>">
        <p class="nom" style="grid-area:nom"><b><?php  echo $producte_info['nom'];?></b></p>
        <p class="descripcion" style="grid-area:descripcion"> <?php  echo $producte_info['descripcion'];?></p>
        <p class="precio" style="grid-area:precio"><?php  echo $producte_info['Precio']. "€";?></p>
        <div class='input-group'>
            <label for='quantitat'> Cantidad:</label>
            <input type='number' min="1" value="1" id='quantitat' name='quantitat'> 
        </div>
        <button class="boto" style="grid-area:boton" id="<?php echo $producte_info['Id']; ?>">Afegir a la Cesta</button>
        <div id="missatge"></div>
    </div>

    
</body>

<script src="js/funcions.js"></script>

</html>
