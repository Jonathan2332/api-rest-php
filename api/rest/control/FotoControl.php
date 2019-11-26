<?php

include '../../model/Foto.php';

class FotoControl{

	function upload($idUsuario){
		
		$oFoto = new Foto();
		return $oFoto->fazerUpload($idUsuario);
	}

	function delete($idUsuario){
		$oFoto = new Foto();
		return $oFoto->excluir($idUsuario);
	}

	function find($idUsuario){
		$oFoto = new Foto();
		return $oFoto->carregarPorId($idUsuario);
	}

	function findAll(){
		$oFoto = new Foto();
		return $oFoto->recuperarTodos();
	}
	function uploadImage($dados)
	{
		$oFoto = new Foto();
		return $oFoto->fazerUpload($dados['idUsuario']);
	}
}
?>