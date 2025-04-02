<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Categories</title>
</head>
<body>
    <div>
        <?php 
        $accio = isset($_GET['accio_carrito']) ? $_GET['accio_carrito'] : 'default';

        switch($accio){
            case 'add':
                require __DIR__.'/controlador/inserirProducteCarrito.php';
                break;
            case 'buidar':
                require __DIR__.'/controlador/esborrarCarrito.php';
                break;
            case 'eliminar':
                require __DIR__.'/controlador/eliminarProducteCarrito.php';
                break;
            case 'modificar':
                require __DIR__.'/controlador/modificarCantitatCarrito.php';
                break;
            case 'finalitzar':
                require __DIR__.'/controlador/finalitzarCompra.php';
                break;
            default: 
                require __DIR__.'/controlador/carrito.php';
                break;
        }
        ?>
    </div>
</body>
</html>