<?php

include '../../model/Usuario.php';

class UsuarioControl
{
	function insert($dados){

		$oUsuario = new Usuario();

		$this->setAll($oUsuario, $dados, false);

		include 'EnderecoControl.php';
		$enderecoControl = new EnderecoControl();

		$oUsuario->setIdEndereco($enderecoControl->insert($dados));
		if($oUsuario->getIdEndereco() != 0)//retorna o ultimo id inserido
		{
			$oUsuario->setIdUsuario($oUsuario->inserir($dados));
			if($oUsuario->getIdUsuario() != 0)//retorna o ultimo id inserido
			{
				include 'CategoriaControl.php';
				$categoriaControl = new CategoriaControl();
				return $categoriaControl->insert($dados['categoria'], $oUsuario->getIdUsuario());
			}
			return false;	
		}
		return false;
	}

	function update($dados){

		$oUsuario = new Usuario();

		$this->setAll($oUsuario, $dados, true);

		include 'EnderecoControl.php';
		$enderecoControl = new EnderecoControl();
		if($enderecoControl->update($dados))
		{
			include 'CategoriaControl.php';
			$categoriaControl = new CategoriaControl();

			if($categoriaControl->update($dados['categoria'], $oUsuario->getIdUsuario()))
			{
				include 'FotoControl.php';
				$fotoControl = new FotoControl();

				if($fotoControl->upload($oUsuario->getIdUsuario()))
				{
					return $oUsuario->alterar();
				}
			}
		}
		return false;
	}
	function delete($idUsuario){

		$oUsuario = new Usuario();
		$oUsuario->carregarPorId($idUsuario);
		$idEndereco = $oUsuario->getIdEndereco();
		
		include 'CategoriaControl.php';
		$categoriaControl = new CategoriaControl();

		if($categoriaControl->delete($oUsuario->getIdUsuario()))
		{
			include 'FotoControl.php';
			$fotoControl = new FotoControl();

			if($fotoControl->delete($oUsuario->getIdUsuario()))
			{
				include 'FavoritoControl.php';
				$favoritoControl = new FavoritoControl();

				if($favoritoControl->deleteAll($oUsuario->getIdUsuario()))
				{
					include 'InteresseControl.php';
					$interesseControl = new InteresseControl();

					if($interesseControl->deleteAll($oUsuario->getIdUsuario()))
					{
						if($oUsuario->excluir($oUsuario->getIdUsuario()))
						{
							include 'EnderecoControl.php';
							$enderecoControl = new EnderecoControl();
							return $enderecoControl->delete($idEndereco);
						}
					}
				}
			}
		}
		return false;
	}
	function find($idUsuario){

		$oUsuario = new Usuario();
		return $oUsuario->recuperarPorId($idUsuario);
	}

	function findAll(){

		$oUsuario = new Usuario();
		return $oUsuario->recuperarTodos();
	}

	function findGenres(){

		$oUsuario = new Usuario();
		return $oUsuario->recuperarTodos();
	}

	function logar($dados){

		$oUsuario = new Usuario();
		$oUsuario->setEmail($dados['email']);
		$oUsuario->setSenha($dados['password']);
		if($dados = $oUsuario->logar())
		{
			include 'CategoriaControl.php';
			$categoriaControl = new CategoriaControl();
			$dados[0]['categoria'] = $categoriaControl->find($dados[0]['idUsuario']);
			return $dados;
		}
		return false;
	}
	
	function checkEmail($email)
	{
		$oUsuario = new Usuario();
		$this->cleanString($email);
		return $oUsuario->verificarEmail($email);
	}

	private function setAll($oUsuario, $dados, $updating)
	{
		$oUsuario->setIdPerfil($dados['idPerfil']);
		if($updating)
		{
			$oUsuario->setIdUsuario($dados['idUsuario']);
			$oUsuario->setIdEndereco($dados['idEndereco']);
		}

		$oUsuario->setNome($this->cleanString($dados['nome']));
		$oUsuario->setSobrenome($this->cleanString($dados['sobrenome']));
		$oUsuario->setEmail($this->cleanString($dados['email']));
		$oUsuario->setSenha($this->cleanString($dados['senha']));

		$oUsuario->setDataNascimento($this->convertDate($dados['data_nasc']));
		
		$oUsuario->setTelefone($dados['telefone']);
		$oUsuario->setCelular($dados['celular']);
		$oUsuario->setGenero($dados['sexo']);
		$oUsuario->setConteudoAdulto($dados['cont_adulto']);
		return $oUsuario;
	}

	private function convertDate($originalDate)
	{
		$date = str_replace('/', '-', $originalDate);
		return date('Y-m-d', strtotime($date));
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