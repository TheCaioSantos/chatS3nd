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

		if (isset($inicio)) {
			$sql .= " ORDER BY id_usuario DESC LIMIT $inicio, $quantidade_por_pagina";
			$sql = $this->conexao->prepare($sql);
		} else {
			$sql .= " ORDER BY id_usuario DESC LIMIT $quantidade_por_pagina";
			$sql = $this->conexao->prepare($sql);
		}
		
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return array(5);
		}	
	}
}