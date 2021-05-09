<?php 

class Mensagem extends Conexao
{
	private $conexao;

	public function __construct()
	{
		$this->conexao = parent::conectar();
	}

	public function InserirMensagem($mensagem)
	{
		if (!isset($_SESSION)){
			session_start();
		}

		$id_remetente = $_SESSION['id_usuario'];
		$id_destinatario = $_SESSION['id_destinatario'];

		$sql = "INSERT INTO mensagem VALUES (default, :id_remetente, :id_destinatario, :mensagem)";
		$sql = $this->conexao->prepare($sql);
		$sql->bindValue(':id_remetente', $id_remetente);
		$sql->bindValue(':id_destinatario', $id_destinatario);
		$sql->bindValue(':mensagem', $mensagem);
		
		return $sql->execute();
	}

	public function consultaMensagem()
	{
		if (!isset($_SESSION)){
			session_start();
		}

		$id_remetente = $_SESSION['id_usuario'];
		$id_destinatario = $_SESSION['id_destinatario'];

		$sql = "SELECT * FROM (SELECT * FROM mensagem WHERE (id_remetente_mensagem = '$id_remetente' AND id_destinatario_mensagem = '$id_destinatario') OR (id_remetente_mensagem = '$id_destinatario' AND id_destinatario_mensagem = '$id_remetente') ORDER BY id_mensagem DESC) sub ORDER BY id_mensagem ASC";
		$sql = $this->conexao->query($sql);

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return array();
		}
	}
}