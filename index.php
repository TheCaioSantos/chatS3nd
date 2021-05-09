<?php 
session_start();

//Se o usuário não estiver logado, é redirecionado para 'login.php'
if (empty($_SESSION['id_usuario'])) {
	header("Location: login.php");
	exit();
}

require_once "view/head.php";
require_once "controller/router.php";
require_once "view/footer.php";