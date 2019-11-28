<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/InteresseControl.php';

if(!empty($_GET['idUsuario']) && !empty($_GET['idFilme']))
{
    $interesseControl = new InteresseControl();
    if($interesseControl->checkMovie($_GET))
    	echo json_encode(array("message" => "Este filme já foi adicionado!"));
    else
    	echo json_encode(array("message" => null));
}
else
    echo json_encode(array("message" => "Nenhum dado recebido."));

?>