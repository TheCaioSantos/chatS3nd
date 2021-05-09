<?php 

class Conexao
{
	public function conectar()
	{
		try {
			return new PDO('mysql:host=localhost;dbname=chats3nd;charset=utf8', 'root', '');
		} catch (PDO_Exception $e) {
			echo "Falhou: " . $e->getMessage();
		}
	}
}