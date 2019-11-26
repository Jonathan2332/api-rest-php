<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/InteresseControl.php';

$data = file_get_contents('php://input');
$json = json_decode($data, true);

$dados = empty($json) ? $_POST : $json;

if(!empty($dados['idFilme']) && !empty($dados['idUsuario']))
{
    $interesseControl = new InteresseControl();
    if($interesseControl->insert($dados))
    	echo json_encode(array("message" => "Interesse inserido com sucesso!", "erro" => false));
    else
    	echo json_encode(array("message" => "Ocorreu um erro.", "erro" => true));
}
else
    echo json_encode(array("message" => "Nenhum dado recebido.", "erro" => true));

?>