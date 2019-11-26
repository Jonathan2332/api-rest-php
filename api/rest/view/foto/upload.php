<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/FotoControl.php';

$data = file_get_contents('php://input');
$json = json_decode($data, true);

$dados = empty($json) ? $_POST : $json;

if(!empty($dados))
{
    $fotoControl = new FotoControl();
    if($fotoControl->uploadImage($dados))
        echo json_encode(array("message" => "Foto salva com sucesso!", "erro" => false), \JSON_UNESCAPED_UNICODE);
    else
        echo json_encode(array("message" => "Ocorreu um erro.", "erro" => true), \JSON_UNESCAPED_UNICODE);
}
else
    echo json_encode(array("message" => "Nenhum dado recebido.", "erro" => true), \JSON_UNESCAPED_UNICODE);

?>