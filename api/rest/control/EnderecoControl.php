<?php

include '../../model/Endereco.php';

class EnderecoControl{

	function insert($dados){
		
		$oEndereco = new Endereco();
		$this->setAll($oEndereco, $dados, false);
		return $oEndereco->inserir();
	}

	function update($dados){

		$oEndereco = new Endereco();
		$this->setAll($oEndereco, $dados, true);
		return $oEndereco->alterar();
	}

	function delete($idEndereco){
		$oEndereco = new Endereco();
		return $oEndereco->excluir($idEndereco);
	}

	function find($idEndereco){
		$oEndereco = new Endereco();
		return $oEndereco->carregarPorId($idEndereco);
	}

	function findAll(){
		$oEndereco = new Endereco();
		return $oEndereco->recuperarTodos();
	}

	private function setAll($oEndereco, $dados, $updating)
	{
		if($updating)
			$oEndereco->setIdEndereco($dados['idEndereco']);

		$oEndereco->setCep($dados['cep']);
		$oEndereco->setComplemento($this->cleanString($dados['complemento']));
		$oEndereco->setUf($this->cleanString($dados['uf']));
		$oEndereco->setBairro($this->cleanString($dados['bairro']));
		$oEndereco->setLocalidade($this->cleanString($dados['localidade']));
		return $oEndereco;
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