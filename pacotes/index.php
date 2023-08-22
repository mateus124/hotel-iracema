<?php
	session_start();

	if((!isset($_SESSION['email']) == true) AND (!isset($_SESSION['senha']) == true)) {
	  unset($_SESSION['email']);
	  unset($_SESSION['senha']);
	  $_SESSION['logado'] = false;
	  $_SESSION['admin'] = false;
	}

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Iracema - Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../source/style/pacotes.css">
    <script src="../source/js/script.js" defer></script>
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
    <?php
        $connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');

        $sql = "SELECT * FROM pacotes WHERE id = '$id'";
        $result = $connect->query($sql);
        while($resultados = $result->fetch_array()) {
	?>
    <div class="container d-flex mt-5 container1">
        <div class="img">
            <img src="img/<?php echo $resultados['imagem']?>" alt="imagem do pacote">
        </div>
        <div class="conteudo">
            <h1><?php echo utf8_encode($resultados['nome'])?></h1>
            <div class="line"></div>
            <p><?php echo utf8_encode($resultados['descricao'])?></p>
            <form action="" method="post">
                <input type="submit" value="Realizar agendamento">
            </form>
        </div>
    </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>