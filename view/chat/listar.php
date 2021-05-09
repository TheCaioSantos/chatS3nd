<?php 
if (empty($_SESSION)) {
	session_start();
}

#Verifica se o usuário está logado
if (empty($_SESSION['id_usuario'])) {
	header("Location: ../../login.php");
	exit();
}
?>

<div class="row d-flex justify-content-center text-center">
	<div class="table-responsive col-md-4 col-12">
		<h4 class="card-title"></li> Lista de Usuários</h4>

		<?php 
		require_once "model/Conexao.php";
		require_once 'model/Usuario.php';
		$usuario = new Usuario();

		$quantidade_por_pagina = 5;
		$page = isset($_GET['page']) && trim($_GET['page']) ? (int)$_GET['page'] : 1;
		$inicio = $quantidade_por_pagina * $page - $quantidade_por_pagina;

		$dados = $usuario->consultarUsuario($inicio, $quantidade_por_pagina);
		?>

		<table class="table table-sm table-bordered table-condensed table-hover text-center">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($dados as $dado): ?>
					<tr>
						<?php if ($_SESSION['nivel_usuario'] == 1 && $dado['nivel_usuario'] != 1): ?>
							<td><img src="<?php echo $dado['foto_usuario']; ?>" class="img-fluid img-thumbnail imagem-avatar"><?php echo $dado['nome_usuario']; ?></td>
							<td>
								<?php if ($dado['id_usuario'] == $_SESSION['id_usuario']): ?>
									<button class="btn btn-success btn-sm btn-secondary" disabled>
										<i class="fa fa-unlock-alt"></i>
										Iniciar Chat
									</button>
								<?php elseif ($dado['id_usuario'] != $_SESSION['id_usuario']): ?>
									<div class="btn-group" role="group" aria-label="Basic example">
										<a href="index.php?pagina=chat/chat&id-destinatario=<?php echo $dado['id_usuario']; ?>" class="btn btn-success btn-sm btn-secondary">
											Iniciar Chat
										</a>
									</div>
								<?php endif; ?>
							</td>
								<?php elseif ($_SESSION['nivel_usuario'] == 2): ?>
									<td><img src="<?php echo $dado['foto_usuario']; ?>" class="img-fluid img-thumbnail imagem-avatar"><?php echo $dado['nome_usuario']; ?></td>
									<td>
										<?php if ($dado['id_usuario'] == $_SESSION['id_usuario']): ?>
											<button class="btn btn-success btn-sm btn-secondary" disabled>
												Iniciar Chat
											</button>
										<?php elseif ($dado['id_usuario'] != $_SESSION['id_usuario']): ?>
											<div class="btn-group" role="group" aria-label="Basic example">
												<a href="index.php?pagina=chat/chat&id-destinatario=<?php echo $dado['id_usuario']; ?>" class="btn btn-success btn-sm btn-secondary">
													Iniciar Chat
												</a>
											</div>
										<?php endif; ?>
									</td>						
						<?php endif ?>							
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>