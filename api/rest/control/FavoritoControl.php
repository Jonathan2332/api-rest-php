<?php

include '../../model/Favorito.php';

class FavoritoControl {

	function insert($dados){
		
		$oFavorito = new Favorito();
		$oFavorito->setIdFilme($dados['idFilme']);
		$oFavorito->setIdUsuario($dados['idUsuario']);
		return $oFavorito->inserir();
	}

	function update($dados){

		$oFavorito = new Favorito();
		$oFavorito->setIdFilme($dados['idFilme']);
		$oFavorito->setIdUsuario($dados['idUsuario']);
		return $oFavorito->alterar();
	}

	function delete($idFilme){
		$oFavorito = new Favorito();
		return $oFavorito->excluir($idFilme);
	}

	function deleteAll($idUsuario){
		$oFavorito = new Favorito();
		return $oFavorito->excluirTodos($idUsuario);
	}

	function find($idUsuario){
		$oFavorito = new Favorito();
		return $oFavorito->recuperarPorId($idUsuario);
	}

	function findAll(){
		$oFavorito = new Favorito();
		return $oFavorito->recuperarTodos();
	}

	function checkMovie($dados){

		$oFavorito = new Favorito();
		$oFavorito->setIdFilme($dados['idFilme']);
		$oFavorito->setIdUsuario($dados['idUsuario']);
		return $oFavorito->verificarFilme();
	}
}
?>