<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../../control/UsuarioControl.php';

$data = file_get_contents('php://input');
$json = json_decode($data, true);

$dados = empty($json) ? $_POST : $json;

if(!empty($dados))
{
    $usuarioControl = new UsuarioControl();
    if($data = $usuarioControl->logar($dados))
    	echo json_encode(array("result" => $data[0], "message" => "Usuário logado com sucesso!", "erro" => false));
    else
    	echo json_encode(array("message" => "Usuário ou senha inválidos.", "erro" => true));
}
else
    echo json_encode(array("message" => "Nenhum dado recebido.", "erro" => true));

?>