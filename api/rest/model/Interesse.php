<?php

include_once '../../conexao/conexao.php';

class Interesse{
	
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

		$sql = "insert into interesse (idFilme, idUsuario) values ({$this->getIdFilme()}, {$this->getIdUsuario()})";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function alterar(){
	
		$sql = "update interesse set
					idFilme = {$this->getIdFilme()}
				where idUsuario = {$this->getIdUsuario()}";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function excluir($idFilme){
	
		$sql = "delete from interesse where idFilme = $idFilme;";
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function excluirTodos($idUsuario){
	
		$sql = "delete from interesse where idUsuario = $idUsuario;";
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function recuperarTodos(){
		
		$sql = "select * from interesse";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function recuperarPorId($idUsuario){
	
		$sql = "select idFilme from interesse where idUsuario = $idUsuario";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function verificarFilme(){
	
		$sql = "select * from interesse where idFilme = {$this->getIdFilme()} and idUsuario = {$this->getIdUsuario()}";
		
		$oConexao = new Conexao();
		$interesses = $oConexao->recuperarDados($sql);
		
		if(!empty($interesses))
			return true;
		else
			return false;
	}
}
?>