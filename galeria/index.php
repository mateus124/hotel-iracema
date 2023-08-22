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
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
	<title>Hotel Iracema - Galeria</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../source/style/galeria.css">
	<script src="../source/js/script.js" defer></script>
</head>
<body>
	<nav class="navegacao nav-menu">
	<h1 class="title" style="user-select: none;"> <a href="../index.php" style="text-decoration: none; color: #fff;"><img src="../source/img/logo-white.png" alt="logo" width="100"> <span>Iracema Hotel</span></a></h1>
		<ul class="itens navigation">
			<li><a href="#">Galeria</a></li>
			<li><a href="">Sobre</a></li>
			<li><a href="../quartos/">Quartos</a></li>
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
	<div class="container">
		<!-- Button trigger modal -->
		<?php
			if ($_SESSION['admin'] == true) {
				echo '
				<div class="d-flex justify-content-end mt-3">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 1.2em; background-color: #7A4D38; border: none; font-weight: bold;">
						Adicionar imagem
					</button>
				</div>
				';
			}
		?>
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div>
						<h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar imagem a galeria</h1>
						<p>A imagem será avaliada pela equipe de suporte.</p>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="php/postarimg.php" method="post" enctype="multipart/form-data">
						<input type="file" name="arquivo" id="arquivo" required>
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Enviar">
					</form>
				</div>
			</div>
			</div>
		</div>

		<!-- IMAGENS -->
		<div class="container d-flex flex-wrap mt-4 align-items-center justify-content-center" style="gap:20px;">
			<?php
				$connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');

				$sql = "SELECT * FROM imagens";
				$result = $connect->query($sql);
				while($resultados = $result->fetch_array()) {
			?>
			<div class="d-flex flex-column align-items-center">
				<img src="img/<?php echo $resultados["urlimg"]?>" alt="imagem da galeria" class="imagem-galeria" style="max-width: 300px; max-height: 250px; border-radius: 5px;">
				<?php
					echo '
					<form action="php/deletarimg.php" method="post">
						<input type="hidden" name="img" value="'.$resultados['urlimg'].'">
						<input type="submit" style="color: red; background: none; border: none;" value="Excluir imagem"> 
					</form>
					';
				?>
			</div>
			<?php } ?>
		</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>