<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/PerfilControl.php';
$perfilControl = new PerfilControl();

if(empty($_GET['idPerfil']))
{
	$perfis = $perfilControl->findAll();
    echo json_encode($perfis, \JSON_UNESCAPED_UNICODE);
}
else
{
	$perfis = $perfilControl->find($_GET['idPerfil']);
    echo json_encode($perfis[0], \JSON_UNESCAPED_UNICODE);
}

?>