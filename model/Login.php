<?php 

class Login extends Conexao
{
	private $conexao;

	public function __construct()
	{	
		$this->conexao = parent::conectar();
	}

	public function validarDados($dados)
	{
		$nick_usuario = isset($dados['nick-usuario']) && trim($dados['nick-usuario']) ? trim($dados['nick-usuario']) : null;
		$email_usuario = isset($dados['email-usuario']) && trim($dados['email-usuario']) ? trim($dados['email-usuario']) : null;

		if (!filter_var($email_usuario, FILTER_VALIDATE_EMAIL)) {
			header('Location: ../login.php?msg-login=3');
			exit;
	}

		if (isset($nick_usuario) && isset($email_usuario)) {
			return $this->validarLogin($nick_usuario, $email_usuario);
		} else {
			return '1';
		}
	}

	private function validarLogin($nick_usuario, $email_usuario)
	{
		$sql = $this->consultarLogin($nick_usuario, $email_usuario);

		if ($sql->rowCount() == 1) {
			return $sql->fetch();
		} else {
			$this->inserirUsuario($nick_usuario, $email_usuario);
		}
	}
	//Verificando se o usuario que está logando já existe
	private function consultarLogin($nick_usuario, $email_usuario)
	{
		$sql = "SELECT * FROM usuario WHERE nome_usuario = :nick and email_usuario = :email";
		$sql = $this->conexao->prepare($sql);
		$sql->bindValue(':nick', $nick_usuario);
		$sql->bindValue(':email', $email_usuario);
		$sql->execute();

		return $sql;
	}

	//Caso usuario que está logando não exista, está função insere um novo usuario como visitante
	private function inserirUsuario($nick_usuario, $email_usuario)
	{
		$sql = "INSERT INTO usuario VALUES (default, :usuario, :email, 'imagens/visitante.png', '1')";
		$sql = $this->conexao->prepare($sql);
		$sql->bindValue(':usuario', $nick_usuario);
		$sql->bindValue(':email', $email_usuario);
		
		$sql->execute();

		header('Location: ../login.php?msg-login=2');
		exit;
	}
}