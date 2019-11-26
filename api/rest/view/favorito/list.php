<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/FavoritoControl.php';
$favoritoControl = new FavoritoControl();


if(empty($_GET['idUsuario']))
{
	$favoritos = $favoritoControl->findAll();
    echo json_encode($favoritos, \JSON_UNESCAPED_UNICODE);
}
else
{
	$favoritos = $favoritoControl->find($_GET['idUsuario']);
    echo json_encode($favoritos, \JSON_UNESCAPED_UNICODE);
}

?>