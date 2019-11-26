<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/FotoControl.php';
$fotoControl = new FotoControl();

if(empty($_GET['idFoto']))
{
	$fotos = $fotoControl->findAll();
    echo json_encode($fotos, \JSON_UNESCAPED_UNICODE);
}
else
{
	$fotos = $fotoControl->find($_GET['idFoto']);
    echo json_encode($fotos[0], \JSON_UNESCAPED_UNICODE);
}

?>