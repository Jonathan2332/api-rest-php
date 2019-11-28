<?php

include_once '../../conexao/conexao.php';

class Favorito{
	
	protected $idFilme;
	protected $idUsuario;
	
	public function getIdFilme(){
		return $this->idFilme;
	}
	
	public function setIdFilme($idFilme){
		$this->idFilme = $idFilme;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	
	public function inserir(){

		$sql = "insert into favorito (idFilme, idUsuario) 
						   values ({$this->getIdFilme()}, {$this->getIdUsuario()})";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function alterar(){
	
		$sql = "update favorito set
					idFilme = {$this->getIdFilme()}
				where idUsuario = {$this->getIdUsuario()}";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function excluir($idFilme){
	
		$sql = "delete from favorito where idFilme = $idFilme;";
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function excluirTodos($idUsuario){
	
		$sql = "delete from favorito where idUsuario = $idUsuario;";
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function recuperarTodos(){
		
		$sql = "select * from favorito";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function recuperarPorId($idUsuario){
	
		$sql = "select idFilme from favorito where idUsuario = $idUsuario";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function verificarFilme(){
	
		$sql = "select * from favorito where idFilme = {$this->getIdFilme()} and idUsuario = {$this->getIdUsuario()}";
		
		$oConexao = new Conexao();
		$favoritos = $oConexao->recuperarDados($sql);
		
		if(!empty($favoritos))
			return true;
		else
			return false;
	}
}
?>