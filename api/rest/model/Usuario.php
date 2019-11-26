<?php

include_once '../../conexao/conexao.php';

class Usuario{
	
	protected $idUsuario;
	protected $idEndereco;
	protected $idPerfil;
	protected $nome;
	protected $sobrenome;
	protected $email;
	protected $senha;
	protected $data_nasc;
	protected $telefone;
	protected $preferencias;
	protected $sexo;
	protected $celular;
	protected $cont_adulto;
	protected $age;
	protected $foto;
	
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getIdEndereco(){
		return $this->idEndereco;
	}
	
	public function setIdEndereco($idEndereco){
		$this->idEndereco = $idEndereco;
	}

	public function getPreferencias(){
		return $this->preferencias;
	}
	
	public function setPreferencias($preferencias){
		$this->preferencias = $preferencias;
	}

	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getSobrenome(){
		return $this->sobrenome;
	}
	
	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}

	public function getDataNascimento(){
		return $this->data_nasc;
	}
	
	public function setDataNascimento($data_nasc){
		$this->data_nasc = $data_nasc;
	}

	public function getCelular(){
		return $this->celular;
	}
	
	public function setCelular($celular){
		$this->celular = $celular;
	}

	public function getTelefone(){
		return $this->telefone;
	}
	
	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getGenero(){
		return $this->sexo;
	}
	
	public function setGenero($sexo){
		$this->sexo = $sexo;
	}

	public function getSenha(){
		return $this->senha;
	}
	
	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getIdPerfil(){
		return $this->idPerfil;
	}
	public function setIdPerfil($idPerfil){
		$this->idPerfil = $idPerfil;
	}

	public function getConteudoAdulto(){
		return $this->cont_adulto;
	}
	public function setConteudoAdulto($cont_adulto){
		$this->cont_adulto = $cont_adulto;
	}

	public function setAge($age){
		$this->age = $age;
	}

	public function getAge(){
		return $this->age;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		return $this->foto;
	}
	
	public function inserir()
	{
		$sql = "insert into usuario (idPerfil,nome,sobrenome,email,senha,data_nasc,telefone,sexo,celular,cont_adulto,idEndereco) 
				values ({$this->getIdPerfil()},'{$this->getNome()}','{$this->getSobrenome()}',
				'{$this->getEmail()}','{$this->getSenha()}','{$this->getDataNascimento()}',
				'{$this->getTelefone()}','{$this->getGenero()}','{$this->getCelular()}',{$this->getConteudoAdulto()}, {$this->getIdEndereco()});";
				
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function alterar(){

		$sql = "update usuario set
					nome = '{$this->getNome()}', sobrenome = '{$this->getSobrenome()}',
					email = '{$this->getEmail()}', senha = '{$this->getSenha()}', 
					data_nasc = '{$this->getDataNascimento()}', telefone = '{$this->getTelefone()}', 
					sexo = '{$this->getGenero()}', celular = '{$this->getCelular()}', 
					idEndereco = {$this->getIdEndereco()}, idPerfil = {$this->getIdPerfil()},
					cont_adulto = {$this->getConteudoAdulto()}
				where idUsuario = {$this->getIdUsuario()}";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function excluir($idUsuario)
	{
		$sql = "delete from usuario where idUsuario = $idUsuario;";
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function recuperarTodos(){
		
		$sql = "select * from usuario";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function logar()
	{

		$sql = "select idUsuario, idEndereco, sexo, nome, idPerfil, email, cont_adulto from usuario 
				where(email like '{$this->getEmail()}' and senha like '{$this->getSenha()}')";

		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function recuperarPorId($idUsuario){
	
		$sql = "select usuario.*, foto.caminho, endereco.* from usuario 
				LEFT OUTER JOIN endereco
				on usuario.idEndereco = endereco.idEndereco
				LEFT OUTER JOIN foto
				on usuario.idUsuario = foto.idUsuario
                where usuario.idUsuario = $idUsuario";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function carregarPorId($idUsuario){
	
		$sql = "select * from usuario where idUsuario = $idUsuario";
		
		$oConexao = new Conexao();
		$usuarios = $oConexao->recuperarDados($sql);

		$this->setIdUsuario($usuarios[0]['idUsuario']);
		$this->setIdEndereco($usuarios[0]['idEndereco']);
		$this->setIdPerfil($usuarios[0]['idPerfil']);
		$this->setNome($usuarios[0]['nome']);
		$this->setSobrenome($usuarios[0]['sobrenome']);
		$this->setTelefone($usuarios[0]['telefone']);
		$this->setCelular($usuarios[0]['celular']);
		$this->setDataNascimento($usuarios[0]['data_nasc']);
		$this->setEmail($usuarios[0]['email']);
		$this->setGenero($usuarios[0]['sexo']);
		$this->setSenha($usuarios[0]['senha']);
		$this->setConteudoAdulto(empty($usuarios[0]['cont_adulto']) ? 0 : $usuarios[0]['cont_adulto']);
		$this->setAge(date_diff(date_create($usuarios[0]['data_nasc']), date_create('now'))->y);

	}
	public function verificarEmail($email)
	{

		$sql = "select email from usuario where email like '$email'";
		$oConexao = new Conexao();
		$result = $oConexao->recuperarDados($sql);
		if(!empty($result))
			return true;
		else
			return false;
	}
}
?>