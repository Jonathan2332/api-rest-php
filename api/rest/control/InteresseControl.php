<?php

include '../../model/Interesse.php';

class InteresseControl {

	function insert($dados){
		
		$oInteresse = new Interesse();
		$oInteresse->setIdFilme($dados['idFilme']);
		$oInteresse->setIdUsuario($dados['idUsuario']);
		return $oInteresse->inserir();
	}

	function update($dados){

		$oInteresse = new Interesse();
		$oInteresse->setIdFilme($dados['idFilme']);
		$oInteresse->setIdUsuario($dados['idUsuario']);
		return $oInteresse->alterar();
	}

	function delete($idFilme){
		$oInteresse = new Interesse();
		return $oInteresse->excluir($idFilme);
	}

	function deleteAll($idUsuario){
		$oInteresse = new Interesse();
		return $oInteresse->excluirTodos($idUsuario);
	}

	function find($idUsuario){
		$oInteresse = new Interesse();
		return $oInteresse->recuperarPorId($idUsuario);
	}

	function findAll(){
		$oInteresse = new Interesse();
		return $oInteresse->recuperarTodos();
	}
}
?>