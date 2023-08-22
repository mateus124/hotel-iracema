<?php
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');
    $sql = "INSERT INTO conta (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if(mysqli_query($connect, $sql)) {
		echo "
			<script type ='text/javascript'>
				alert('Conta registrada com sucesso!');
			</script>
		";	

        echo "<meta http-equiv='refresh' content='0; url=../index.html'>";
	} else {
		echo "Erro: " . $sql . "<br>" . mysqli_error($connect);
	}

    mysqli_close($connect);
?>