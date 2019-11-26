<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/CategoriaControl.php';
$categoriaControl = new CategoriaControl();

if(empty($_GET['idUsuario']))
{
	$categorias = $categoriaControl->findAll();
    echo json_encode($categorias, \JSON_UNESCAPED_UNICODE);
}
else
{
	$categorias = $categoriaControl->find($_GET['idUsuario']);
    echo json_encode($categorias, \JSON_UNESCAPED_UNICODE);
}

?>