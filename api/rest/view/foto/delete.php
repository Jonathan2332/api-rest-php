<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/FotoControl.php';

if(!empty($_GET['idFoto']))
{
    $fotoControl = new FotoControl();
    if($fotoControl->delete($_GET['idFoto']))
    	echo json_encode(array("message" => "Foto deletada com sucesso!", "erro" => false), \JSON_UNESCAPED_UNICODE);
    else
    	echo json_encode(array("message" => "Ocorreu um erro.", "erro" => true), \JSON_UNESCAPED_UNICODE);
}
else
    echo json_encode(array("message" => "Nenhum dado recebido.", "erro" => true), \JSON_UNESCAPED_UNICODE);

?>