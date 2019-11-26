<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/InteresseControl.php';
$interesseControl = new InteresseControl();

if(empty($_GET['idUsuario']))
{
	$interesses = $interesseControl->findAll();
    echo json_encode($interesses, \JSON_UNESCAPED_UNICODE);
}
else
{
	$interesses = $interesseControl->find($_GET['idUsuario']);
    echo json_encode($interesses, \JSON_UNESCAPED_UNICODE);
}

?>