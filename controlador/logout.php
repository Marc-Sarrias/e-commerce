<?php
session_start();
unset($_SESSION["loggeado"]);
unset($_SESSION['id_user']);

include __DIR__ .'/../resource_categories.php';