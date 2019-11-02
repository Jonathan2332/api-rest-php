<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../conexao/conexao.php';

include_once '../entidade/Usuario.php';

$oConexao = new Conexao();

$oUsuario = new Usuario($oConexao);

$oUsuario->email = $_POST['email'];
$oUsuario->senha = $_POST['password'];

if($oUsuario->logar()){
    echo '{';
        echo '"message": "Usuário logado com sucesso!"';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Usuário ou senha inválidos."';
    echo '}';
}
?>