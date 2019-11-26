<?php include_once '../../conexao/conexao.php';

class Categoria
{
	protected $idUsuario;
	protected $idCategoria = array();

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getIdCategoria(){
		return $this->idCategoria;
	}
	
	public function setIdCategoria(array $idCategoria){
		$this->idCategoria = $idCategoria;
	}

	public function inserir()
	{
		$oConexao = new Conexao();
		foreach ($this->getIdCategoria() as $categoria) 
		{
			$sql = "insert into usuario_categoria(idUsuario, idCategoria) values({$this->getIdUsuario()},$categoria);";
			if(!$oConexao->executar($sql))
				return false;
		}
		return true;
	}
	public function alterar()
	{
		$this->excluir($this->getIdUsuario());
		return $this->inserir();
	}

	public function excluir($idUsuario){
	
		$sql = "delete from usuario_categoria where idUsuario = $idUsuario";

		$oConexao = new Conexao();
		return $oConexao->executar($sql);
	}
	
	public function recuperarTodos(){
		
		$sql = "select * from usuario_categoria";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function recuperarPorId($idUsuario){
	
		$sql = "select idCategoria from usuario_categoria where idUsuario = $idUsuario";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

}

?>