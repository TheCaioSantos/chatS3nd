<?php 
session_start();

//Se o usuario estiver logado, é redirecionado para 'index.php'
if (isset($_SESSION['id_usuario'])) {
	header("Location: index.php");
	exit();
}
?>

<?php require_once 'view/head.php'; ?>

<div class="row justify-content-center">
	<div class="card-body col-12 col-md-4 login-form">
		<form action="controller/login.php" method="POST">
			<h1 class="text-center display-4">Precisa de ajuda?</h1>

			<!-- Mensagens para o usuário -->
			<?php if (isset($_GET['msg-login']) && $_GET['msg-login'] == '1'): ?>
				<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center">
					O Usuário e a senha devem ser preenchidos.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>

			<?php if (isset($_GET['msg-login']) && $_GET['msg-login'] == '2'): ?>
				<div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center col-12 mensagem">
					Email cadastrado, por gentileza, logue novamente como mesmo usuário e email.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>

			<?php if (isset($_GET['msg-login']) && $_GET['msg-login'] == '3'): ?>
				<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center">
					Email inválido.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>
			<!-- Fim das mensagens -->

			<div class="form-group">
				<label for="nick-usuario">Usuário</label>
				<input type="text" name="nick-usuario" class="form-control" id="nick-usuario" placeholder="Ex.: Admin" required>
			</div>

			<div class="form-group">
				<label for="senha-usuario">Senha</label>
				<input type="email" name="email-usuario" class="form-control" id="email-usuario" placeholder="exemplo@email.com" required>
			</div>

			<p><input type="submit" name="Entrar" class="btn btn-primary btn-lg btn-block"></p>
			<input type="hidden" name="env" value="login">
		</form>
	</div>
</div>

<?php require_once 'view/footer.php'; ?>