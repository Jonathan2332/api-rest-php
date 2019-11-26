<?php include_once '../../conexao/conexao.php';

class Endereco
{
	protected $idEndereco;
	protected $cep;
	protected $complemento;
	protected $uf;
	protected $bairro;
	protected $localidade;

	public function getIdEndereco(){
		return $this->idEndereco;
	}
	
	public function setIdEndereco($idEndereco){
		$this->idEndereco = $idEndereco;
	}

	public function getCep(){
		return $this->cep;
	}
	
	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getComplemento(){
		return $this->complemento;
	}
	
	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}
	public function getUf(){
		return $this->uf;
	}
	
	public function setUf($uf){
		$this->uf = $uf;
	}
	public function getBairro(){
		return $this->bairro;
	}
	
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	public function getLocalidade(){
		return $this->localidade;
	}
	
	public function setLocalidade($localidade){
		$this->localidade = $localidade;
	}

	public function inserir()
	{
		$sql = "insert into endereco (cep, complemento, uf, bairro, localidade) 
				values('{$this->getCep()}','{$this->getComplemento()}','{$this->getUf()}','{$this->getBairro()}', '{$this->getLocalidade()}')";

		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	public function alterar()
	{
	
		$sql = "update endereco set
					cep = '{$this->getCep()}', complemento = '{$this->getComplemento()}', uf = '{$this->getUf()}',
					bairro = '{$this->getBairro()}', localidade = '{$this->getLocalidade()}'
				where idEndereco = {$this->getIdEndereco()}";
		
		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}

	public function excluir($idEndereco){
	
		$sql = "delete from endereco where idEndereco = $idEndereco";

		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function recuperarTodos(){
		
		$sql = "select * from endereco";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarTodos($sql);
	}

	public function carregarPorId($idEndereco){
	
		$sql = "select * from endereco where idEndereco = $idEndereco";
		
		$oConexao = new Conexao();
		$enderecos = $oConexao->recuperarTodos($sql);
		
		$this->setIdEndereco($enderecos[0]['idEndereco']);
		$this->setCep($enderecos[0]['cep']);
		$this->setComplemento($enderecos[0]['complemento']);
		$this->setUf($enderecos[0]['uf']);
		$this->setBairro($enderecos[0]['bairro']);
		$this->setLocalidade($enderecos[0]['localidade']);
	}

}

?>