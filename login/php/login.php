<?php
	session_start();
	$connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');

	$email = $_POST['email_login'];
	$senha = $_POST['senha_login'];

	$sql = "SELECT * FROM conta WHERE email = '$email' AND senha = '$senha'";
	$result = $connect->query($sql);
	$resultados = $result->fetch_array();

	if(mysqli_num_rows($result) < 1) {
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		echo "
		<script type ='text/javascript'>
			alert('Seus dados estão incorretos!');
		</script>
	";

	echo "<meta http-equiv='refresh' content='0; url=../index.html'>";
	} else {
		$_SESSION['logado'] = true;
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		$_SESSION['nome'] = $resultados['nome'];

		$senha = strtolower($_SESSION['senha']);
		if ($senha == "admin") {
			$_SESSION['admin'] = true;
		} else {
			$_SESSION['admin'] = false;
		}

		echo "<meta http-equiv='refresh' content='0; url=../../index.php'>";
	}
?>