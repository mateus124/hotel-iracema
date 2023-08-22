<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	unset($_SESSION['nome']);
	unset($_SESSION['admin']);
	$_SESSION['logado'] = false;

	session_destroy();

	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
?>