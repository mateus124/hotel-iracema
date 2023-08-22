<?php
	session_start();

	$nome = $_POST["nome"];
	$pessoas = $_POST["pessoas"];
	$entrada = $_POST["entrada"];
	$saida = $_POST["saida"];
	$quarto = $_POST["quarto"];
	$email = $_SESSION["email"];

    $connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');
    $sql = "INSERT INTO reservas (nome, datainicio, datafim, quarto, pessoas, email) VALUES ('$nome', '$entrada', '$saida', $quarto, $pessoas, '$email')";

    if(mysqli_query($connect, $sql)) {
		echo "
			<script type ='text/javascript'>
				alert('Quarto reservado com sucesso!');
			</script>
		";	

        echo "<meta http-equiv='refresh' content='0; url=../../index.php'>";
	} else {
		echo "Erro: " . $sql . "<br>" . mysqli_error($connect);
	}

    mysqli_close($connect);
?>