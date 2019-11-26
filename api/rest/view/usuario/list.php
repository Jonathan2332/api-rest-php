<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/UsuarioControl.php';
$usuarioControl = new UsuarioControl();

if(empty($_GET['idUsuario']))
{
	$usuarios = $usuarioControl->findAll();
    echo json_encode($usuarios, \JSON_UNESCAPED_UNICODE);
}
else
{
	$usuarios = $usuarioControl->find($_GET['idUsuario']);
    echo json_encode($usuarios[0], \JSON_UNESCAPED_UNICODE);
}

?>