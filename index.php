<?php	
	$filesAbsolutePath = '/home/TDIW/tdiw-i5/public_html/uploadedFiles/';
	$action = $_GET['action']??null;

	//recuperem la acció amb un GET i segons aquesta anirem a un fitxer o un altre, com hem de respectar el MVC anirém a un resource
	//per a que aquest cridi el controlador corresponent

	switch($action) {
		case 'categories':
			require __DIR__.'/resource_categories.php';
			break;
		case 'productes':
			require __DIR__.'/resource_productes.php';
			break;
		case 'infoProducte':
			require __DIR__. '/resource_infoProducte.php';
			break;
		case 'login':
			require __DIR__. '/resource_login.php';
			break;
		case 'registre':
			require __DIR__. '/resource_registre.php';
			break;
		case 'logout':
			require __DIR__. '/resource_logout.php';
			break;
		case 'carrito':
			require __DIR__. '/resource_carrito.php';
			break;
		case 'perfil':
			require __DIR__. '/resource_perfil.php';
			break;
		case 'cercar':
			require __DIR__. '/resource_cercador.php';
			break;
		case 'comandes':
			require __DIR__. '/resource_comandes.php';
			break;
		default:
			require __DIR__.'/resource_categories.php';
			break;

	}

	