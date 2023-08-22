<?php
	session_start();

	if((!isset($_SESSION['email']) == true) AND (!isset($_SESSION['senha']) == true)) {
	  unset($_SESSION['email']);
	  unset($_SESSION['senha']);
	  $_SESSION['logado'] = false;
	  $_SESSION['admin'] = false;
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel Iracema - Quartos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
	<link rel="stylesheet" href="../source/style/quartos.css">
	<script src="../source/script.js" defer></script>
</head>
<body>
	<main>
		<nav class="navegacao nav-menu">
		<h1 class="title" style="user-select: none;"> <a href="../index.php" style="text-decoration: none; color: #fff;"><img src="../source/img/logo-white.png" alt="logo" width="100"> <span>Iracema Hotel</span></a></h1>
			<ul class="itens navigation">
				<li><a href="../galeria/">Galeria</a></li>
				<li><a href="">Sobre</a></li>
				<li><a href="#">Quartos</a></li>
				<?php
						if ($_SESSION['logado'] == true) {
							echo '<li><a href="../reservas/"><i class="bi bi-person-fill"></i>'. $_SESSION['nome'] .'</a></li>';
							echo '<li><a href="../sair.php">Sair</a></li>';
						} else {
							echo '<li class="login"><a href="../login/index.html#paralogin">Login</a></li>';
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

	<div class="container">
		<?php
			if ($_SESSION['admin'] == true) {
				echo '
					<div class="d-flex justify-content-end mt-3">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 1.2em; background-color: #7A4D38; border: none; font-weight: bold;">
							Adicionar quarto
						</button>
					</div>
				';
			}
		?>
		<?php
			$connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');

			$sql = "SELECT * FROM quartos";
			$result = $connect->query($sql);
			while($resultados = $result->fetch_array()) {
		?>
		<div class="container quarto mt-5 mb-5 d-flex">
			<div class="img" style="max-width: 22vw;">
				<img src="img/<?php echo $resultados["imagem"]?>" alt="imagem do quarto" style="max-width: 100%; border-radius: 10px;">
			</div>
			<div class="conteudo d-flex flex-column">
				<span class="titulo"><?php echo $resultados["nome"]?></span>
				<span class="desc"><?php echo $resultados["descricao"]?></span>
				<span class="preco">R$ <?php echo $resultados["preco"]?></span>
				<form action="agendamento/" method="post">
					<input type="hidden" name="quarto" value="<?php echo $resultados["numquarto"]?>">
					<input type="submit" value="Verificar Disponibilidade" class="verificar">
				</form>
				<?php
					if ($_SESSION['admin'] == true) {
						echo '
							<form action="php/deletarquarto.php" method="post" class="mt-2">
								<input type="hidden" name="quarto" value="<?php echo $resultados["numquarto"]?>
								<input type="submit" value="Deletar quarto" class="deletar">
							</form>
							';
					}
				?>
			</div>
		</div>
		<?php } ?>
	</div>
	
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div>
					<h1 class="modal-title fs-5" id="exampleModalLabel">Registrar quarto do hotel</h1>
					<p>O quarto será verificado posteriormente.</p>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="php/registrarquarto.php" method="post" enctype="multipart/form-data" class="d-flex flex-column">
					<label for="nome"><strong>Nome:</strong></label>
					<input type="text" name="nome" id="nome">
					<label for="nome"><strong>Descrição:</strong></label>
					<textarea name="desc" id="desc" cols="30" rows="4"></textarea>
					<label for="preco"><strong>Preço:</strong></label>
					<input type="number" name="preco" id="preco">
					<label for="imagem"><strong>Imagem:</strong></label>
					<input type="file" name="arquivo" id="arquivo">
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" value="Enviar">
				</form>
			</div>
		</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>