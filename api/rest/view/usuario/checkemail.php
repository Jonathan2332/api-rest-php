<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/UsuarioControl.php';

if(!empty($_GET['email']))
{
    $usuarioControl = new UsuarioControl();
    if($usuarioControl->checkEmail($_GET['email']))
    	echo json_encode(array("message" => "Este email já está sendo usado!"));
    else
    	echo json_encode(array("message" => null));
}
else
    echo json_encode(array("message" => "Nenhum dado recebido."));

?>