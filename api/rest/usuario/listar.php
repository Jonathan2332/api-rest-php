<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../conexao/conexao.php';

include_once '../entidade/Usuario.php';

$oConexao = new Conexao();

$oUsuario = new Usuario($oConexao);

$usuarios = $oUsuario->findAll();
if(empty($usuarios))
{
    echo json_encode(array());
}
else
{
    foreach($oUsuario->findAll() as $valor){
        echo json_encode($valor);
    }
}


?>