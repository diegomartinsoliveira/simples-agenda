<?php
session_start();
if(!$_SESSION['email']) {
	header('Location: ../login/index.php');
	$_SESSION['nao_autenticado'] = true;
	exit();
}