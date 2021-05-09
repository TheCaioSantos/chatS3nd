<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	require_once "../model/Conexao.php";
	require_once "../model/Mensagem.php";
	$mensagem = new Mensagem();

	$dados = $mensagem->consultaMensagem();

	foreach ($dados as $dado) {
		if ($dado['id_remetente_mensagem'] == $_SESSION['id_usuario']) {
			echo '<div class="d-flex justify-content-end"><p class="alert alert-primary">' . $dado['mensagem'] .'</p></div>';

		} elseif ($dado['id_remetente_mensagem'] != $_SESSION['id_usuario']) {
			echo '<div class="d-flex justify-content-start"><p class="alert alert-dark">' . $dado['mensagem'] .'</p></div>';
		}
	}
} else {
	header("Location: ../login.php");
	exit();
}
?>