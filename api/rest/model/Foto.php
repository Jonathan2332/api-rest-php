<?php include_once '../../conexao/conexao.php';

class Foto
{
	protected $idFoto;
	protected $idUsuario;
	protected $caminho;

	public function getIdFoto(){
		return $this->idFoto;
	}
	
	public function setIdFoto($idFoto){
		$this->idFoto = $idFoto;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getCaminho(){
		return $this->caminho;
	}
	
	public function setCaminho($caminho){
		$this->caminho = $caminho;
	}

	public function fazerUpload($idUsuario){

		if(empty($_FILES['foto']) || $_FILES['foto']['error'] == 4)//Não alterou a foto
			return true;
		else
		{
	        if(!$_FILES['foto']['error'])
	        {
	            $nomeArquivo = date('YmdHis'). '_' . $idUsuario . '_' . $_FILES['foto']['name'];
	            
	            $origem = $_FILES['foto']['tmp_name'];
	            
	            $destino = '../../../../98movies/res/imgs/usuario/upload/' . $nomeArquivo;
	            if(move_uploaded_file($origem , $destino))
	            {
	            	$oldFile = $this->checkExist($idUsuario);

	            	if(!empty($oldFile))
	            		$sql = "update foto set caminho = '$nomeArquivo' where idUsuario = $idUsuario";
	            	else
	            		$sql = "insert into foto (idUsuario , caminho) values ('$idUsuario','$nomeArquivo')";
	            
	            	$oConexao = new Conexao();
	            	if($oConexao->executar($sql))
	            	{
	            		if(!empty($oldFile))
	            			if (file_exists($destino)) 
	    						unlink('../../../../98movies/res/imgs/usuario/upload/' . $oldFile[0]['caminho']);

	            		return true;
	            	}
	            	else
	            	{
	            		if (file_exists($destino)) 
	            			unlink($destino);
	            	}
	            }
	        }
        }
        return false;
	}
	
	public function checkExist($idUsuario){
        $sql = "select * from foto where idUsuario = $idUsuario";

		$oConexao = new Conexao();
		$oldFile = $oConexao->recuperarDados($sql);
		if(empty($oldFile))
			return '';
		else
			return $oldFile;
	}

	public function excluir($idUsuario){
	
		$sql = "delete from foto where idUsuario = $idUsuario;";
		$oConexao = new Conexao();
		$resultado = $oConexao->executar($sql);

		$file = empty($resultado) ? '' : '../../../../98movies/res/imgs/usuario/upload/' . $resultado[0]['caminho'];

		return file_exists($file) ? unlink($file) : $resultado;
	}
	
	public function recuperarTodos(){
		
		$sql = "select * from foto";
		
		$oConexao = new Conexao();
		return $oConexao->recuperarDados($sql);
	}

	public function carregarPorId($idUsuario){
	
		$sql = "select * from foto where idUsuario = $idUsuario";
		
		$oConexao = new Conexao();
		$fotos = $oConexao->recuperarTodos($sql);
		
		$this->setIdUsuario($fotos[0]['idUsuario']);
		$this->setIdFoto($fotos[0]['idFoto']);
		$this->setCaminho($fotos[0]['caminho']);
	}

}

?>