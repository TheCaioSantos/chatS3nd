<?php 

class Usuario extends Conexao
{
	private $conexao;

	public function __construct()
	{
		$this->conexao = parent::conectar();
	}

	public function consultarUsuario($inicio, $quantidade_por_pagina)
	{
		$sql = "SELECT * FROM usuario";
		$sql = $this->conexao->query($sql);
		
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return array();
		}	
	}
}
