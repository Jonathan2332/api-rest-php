<?php

include '../../model/Perfil.php';

class PerfilControl{

	function insert($dados){
		
		$oPerfil = new Perfil();
		$oPerfil->setNome($dados['nome']);
		return $oPerfil->inserir();
	}

	function update($dados){
		$oPerfil = new Perfil();
		$oPerfil->setIdPerfil($dados['idPerfil']);
		$oPerfil->setNome($dados['nome']);
		return $oPerfil->alterar();
	}

	function delete($idPerfil){
		$oPerfil = new Perfil();
		return $oPerfil->excluir($idPerfil);
	}

	function find($idPerfil){
		$oPerfil = new Perfil();
		return $oPerfil->carregarPorId($idPerfil);
	}

	function findAll(){
		$oPerfil = new Perfil();
		return $oPerfil->recuperarTodos();
	}
}
?>