<?php

include '../../model/Categoria.php';

class CategoriaControl extends Categoria{

	function insert($dados, $idUsuario){
		$oUsuarioCategoria = new Categoria();

		$oUsuarioCategoria->setIdUsuario($idUsuario);
		$oUsuarioCategoria->setIdCategoria($dados);

		return $oUsuarioCategoria->inserir();
	}

	function update($dados, $idUsuario){

		$oUsuarioCategoria = new Categoria();

		$oUsuarioCategoria->setIdUsuario($idUsuario);
		$oUsuarioCategoria->setIdCategoria($dados);

		return $oUsuarioCategoria->alterar();
	}

	function delete($idUsuario){
		$oUsuarioCategoria = new Categoria();
		return $oUsuarioCategoria->excluir($idUsuario);
	}

	function find($idUsuario){
		$oUsuarioCategoria = new Categoria();
		return $oUsuarioCategoria->recuperarPorId($idUsuario);
	}

	function findAll(){
		$oUsuarioCategoria = new Categoria();
		return $oUsuarioCategoria->recuperarTodos();
	}

	private function cleanString($string)
	{
		if(is_array($string))
			return array_map('addslashes', $string);
		else
			return addslashes($string);
	}
}
?>