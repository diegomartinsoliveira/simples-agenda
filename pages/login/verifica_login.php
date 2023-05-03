<?php
session_start();
if(!$_SESSION['email']) {
	header('Location: ../login/index.php');
	exit();
}