<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/PerfilControl.php';

if(!empty($_GET['idPerfil']))
{
    $perfilControl = new PerfilControl();
    if($perfilControl->delete($_GET['idPerfil']))
    	echo json_encode(array("message" => "Perfil deletado com sucesso!", "erro" => false));
    else
    	echo json_encode(array("message" => "Ocorreu um erro.", "erro" => true));
}
else
    echo json_encode(array("message" => "Nenhum dado recebido.", "erro" => true));

?>