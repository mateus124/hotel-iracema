<?php
	session_start();

	if((!isset($_SESSION['email']) == true) AND (!isset($_SESSION['senha']) == true)) {
		echo "
		<script type ='text/javascript'>
			alert('Você precisa fazer login para reservar.');
		</script>
	";	
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
	}

	$quarto = $_POST["quarto"]
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Iracema - Agendamento</title>
	<link rel="stylesheet" href="../../source/style/quartos.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
	<script src="../../source/script.js" defer></script>
</head>
<body>
    <main>
		<nav class="navegacao nav-menu">
		<h1 class="title" style="user-select: none;"> <a href="../../index.php" style="text-decoration: none; color: #fff;"><img src="../../source/img/logo-white.png" alt="logo" width="100"> <span>Iracema Hotel</span></a></h1>
			<ul class="itens navigation">
				<li><a href="../../galeria/">Galeria</a></li>
				<li><a href="">Sobre</a></li>
				<li><a href="../index.php">Quartos</a></li>
				<?php
						if ($_SESSION['logado'] == true) {
							echo '<li><a href="../../reservas/"><i class="bi bi-person-fill"></i>'. $_SESSION['nome'] .'</a></li>';
							echo '<li><a href="../../sair.php">Sair</a></li>';
						} else {
							echo '<li class="login"><a href="../../login/index.html#paralogin">Login</a></li>';
						}
					?>
			</ul>
			<div class="hamburguer">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</nav>
	</main>
	<div class="container-fluid main-container d-flex">
		<div class="container form d-flex justify-content-center p-2 align-items-center w-100 left">
			<form action="php/efetuar.php" method="post">
				<input type="hidden" name="quarto" value="<?php echo $quarto ?>">
				<h1>Faça sua reserva!</h1>
				<div class="form-box">
					<label for="nome">Nome de posse:</label>
					<input type="text" name="nome" id="nome">
				</div>
				<div class="form-box">
					<label for="pessoas">Quantidade de pessoas:</label>
					<input type="number" name="pessoas" id="pessoas">
				</div>
				<div class="form-box">
					<label for="entrada">Data de entrada:</label>
					<input type="date" name="entrada" id="entrada">
				</div>
				<div class="form-box">
					<label for="saida">Data de saida:</label>
					<input type="date" name="saida" id="saida">
				</div>
				<input type="submit" value="Fazer reserva" class="enviar-btn">
			</form>
		</div>
		<div class="bg-img">
			<img src="../../source/img/hotel.png" alt="hotel">
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>