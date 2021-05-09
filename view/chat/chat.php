<?php $_SESSION['id_destinatario'] = $_GET['id-destinatario']; ?>

<div class="row d-flex justify-content-center text-center">
	<div class="card-body col-md-5 col-12 bloco-chat">
		<div class="btn-group" role="group" aria-label="Basic example">
			<a href="index.php?pagina=chat/listar" class="btn btn-warning">
				Voltar
			</a>
			<a href="model/logout.php" class="btn btn-danger">
				Sair
			</a>
		</div>
		<div class="corpo-mensagem">
		<div id="mensagens">

		</div>
		<form action="" method="POST" id="form-chat">
			<div class="form-group">
				<span class="btn-group col-12" role="group">
					<input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="form-control">
					<input type="submit" value="Enviar" class="btn btn-success">
					<input type="hidden" name="envio" value="true"/>
				</span>
			</div>
		</form>
		</div>
		<?php 
		require_once "model/Conexao.php";
		require_once "model/Mensagem.php";
		$mensagem = new Mensagem();
		if (isset($_POST['envio'])) {
			$mensagem->InserirMensagem($_POST['mensagem']);
		}
		?>
	</div>
</div>
