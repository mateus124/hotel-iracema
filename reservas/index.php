<?php
	session_start();

	if((!isset($_SESSION['email']) == true) AND (!isset($_SESSION['senha']) == true)) {
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel Iracema - Reservas</title>
	<style>
		table {
			border-collapse: collapse;
			text-align: center;
		}
		td {
			padding: 5px;
		}
		th {
			padding: 0 5px;
		}
	</style>
</head>
<body>
	<table border="1">
		<tr>
			<th>Nome</th>
			<th>Pessoas</th>
			<th>Email</th>
			<th>Quarto</th>
			<th>Data-Inicio</th>
			<th>Data-Fim</th>
		</tr>
		<?php
			$connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');
			$email = $_SESSION["email"];
			$sql = "SELECT * FROM reservas WHERE email = '$email'";
			$result = $connect->query($sql);
			while($resultados = $result->fetch_array()) {
		?>
		<tr>
			<td><?php echo $resultados["nome"]?></td>
			<td><?php echo $resultados["pessoas"]?></td>
			<td><?php echo $resultados["email"]?></td>
			<td><?php echo $resultados["quarto"]?></td>
			<td><?php echo $resultados["datainicio"]?></td>
			<td><?php echo $resultados["datafim"]?></td>
			<td>
				<form action="php/cancelar.php" method="post">
					<input type="hidden" name="reserva" value="<?php echo $resultados["id"] ?>">
					<input type="submit" value="Deletar">
				</form>
			</td>
		</tr>
		<?php } ?>
	</table>
	<br>
	<a href="../index.php">Voltar</a>
</body>
</html>