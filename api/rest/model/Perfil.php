<?php

include_once '../../conexao/conexao.php';

class Perfil{
	
	protected $idPerfil;
	protected $nome;
	
	public function getIdPerfil(){
		return $this->idPerfil;
	}
	
	public function setIdPerfil($idPerfil){
		$this->idPerfil = $idPerfil;
	}

	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function inserir(){
		
		$sql = "insert into perfil (nome) 
						   values ('{$this->getNome()}')";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function alterar(){
	
		$sql = "update perfil set
					nome = '{$this->getNome()}'
				where idPerfil = {$this->getIdPerfil()}";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function excluir($idPerfil){
	
		$sql = "delete from perfil where idPerfil = $idPerfil;";
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function recuperarTodos(){
		
		$sql = "select * from perfil";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function carregarPorId($idPerfil){
	
		$sql = "select * from perfil where idPerfil = $idPerfil";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}
}
?>