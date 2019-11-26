<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/InteresseControl.php';

if(!empty($_GET['idFilme']))
{
    $interesseControl = new InteresseControl();
    if($interesseControl->delete($_GET['idFilme']))
    	echo json_encode(array("message" => "Interesse deletado com sucesso!", "erro" => false));
    else
    	echo json_encode(array("message" => "Ocorreu um erro.", "erro" => true));
}
else
    echo json_encode(array("message" => "Nenhum dado recebido.", "erro" => true));

?>