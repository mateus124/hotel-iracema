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
	<link rel="shortcut icon" href="source/img/icon.png" type="image/x-icon">
	<title>Hotel Iracema</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
	<link rel="stylesheet" href="source/style/style.css">
</head>
<body>
	<section class="section1">
		<main>
			<nav class="navegacao nav-menu">
				<h1 class="title" style="user-select: none;"> <a href="#" style="text-decoration: none; color: #fff;"><img src="source/img/logo-white.png" alt="logo" width="100"> <span>Iracema Hotel</span></a></h1>
				<ul class="itens navigation">
					<li><a href="galeria/">Galeria</a></li>
					<li><a href="#sobre">Sobre</a></li>
					<li><a href="quartos/">Quartos</a></li>
					<?php
						if ($_SESSION['logado'] == true) {
							echo '<li><a href="reservas/"><i class="bi bi-person-fill"></i>'. $_SESSION['nome'] .'</a></li>';
							echo '<li><a href="sair.php">Sair</a></li>';
						} else {
							echo '<li class="login"><a href="login/index.html#paralogin">Login</a></li>';
						}
					?>
				</ul>
				<div class="hamburguer">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</nav>
			
			<div class="main2">
				<div class="apresentacao">
					<h1>BEM-VINDO AO HOTEL IRACEMA</h1>
					<p>É  um prazer receber você em nosso hotel, saiba que nos sempre
						priorizamos o bem estar, a privacidade e o lazer de nossos
						hospedes. Nós, funcionarios do Hotel Iracema, buscamos
						proporcionar experiências e momentos únicos aos nosssos clientes,
						com muita diversão e conforto.</p>
					<a href="#">SABER MAIS</a>
				</div>
				<div class="carr">
					<div class="img active" id="btn1" onclick="trocarimg0()"></div>
					<div class="img" id="btn2" onclick="trocarimg1()"></div>
					<div class="img" id="btn3" onclick="trocarimg2()"></div>
				</div>
			</div>
		</main>
	</section>
	<section class="section2" id="sobre">
		<div class="conteudo">
			<div class="img">
				<img src="source/img/section2.jpg" alt="representação">
			</div>
			<div class="text">
				<h2>TENHA A MELHOR EXPERIÊNCIA DE LAZER DE TODA SUA VIDA!</h2>
				<div class="line"></div>
				<p>Desfrute de momentos de tranquilidade. Temos muitas opções para todos: experiências gastronômicas, experiências de aventura, experiências a dois e mais.
					</p>
				<p>E para quem prefere algo mais tranquilo, temos áreas privativas com redes e tendas.
					Temos de tudo para agradar à todos os gostos.</p>
			</div>		
		</div>		
		<div class="apiclima">
			<div class="line"></div>
			<p>DISPONHA DO SEU DIA COM</p>
			<h2>HOTEL IRACEMA, FORTALEZA</h2>
			<div class="api">
				<div class="elemento">
					<span class="principal">23 mai</span>
					<span class="info">2023</span>
				</div>
				<div class="line"></div>
				<div class="elemento">
					<span class="principal">17:30</span>
					<span class="info">LOCAL</span>
				</div>
				<div class="line"></div>
				<div class="elemento">
					<span class="principal">28°C</span>
					<span class="info">TEMP</span>
				</div>
			</div>
			<a href="#">QUARTOS</a>
		</div>
	</section>
	<section class="section3">
		<div class="container-fluid">
			<h2 style="text-align: center; margin-top: 20px;">PRIVACIDADE E <br>REQUINTE À BEIRA MAR</h2>
			<p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Lorem ipsum dolor <br>sit amet consectetur adipisicing elit.</p>
			<div class="container pacotes">
				<h3>Veja mais sobre nossos pacotes</h3>
				<div class="pacoteslista">
				<?php
					$connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');

					$sql = "SELECT * FROM pacotes";
					$result = $connect->query($sql);
					$ocultos = 1;
					$outros = 1;
					while($resultados = $result->fetch_array()) {
				?>
					<div class="pacote <?php if($ocultos > 3) {
						echo "escondido";
					}?>" <?php if($ocultos > 3) {
							echo "id='outros$outros'";
							$outros++;
						}
						?>>
						<a href="pacotes/index.php?id=<?php echo $resultados['id']?>">
							<img src="pacotes/img/<?php echo $resultados['imagem']?>" alt="<?php echo $resultados['nome']?>">
							<p><?php echo utf8_encode($resultados['nome'])?></p>
						</a>
					</div>
				<?php $ocultos++; } ?>

				</div>
				
				<button onclick="mostrar()" id="botaover">VER MAIS</button>
			</div>
		</div>
	</section>
	<footer class="container-fluid footer pb-4">
		<div class="row">
			<div class="col-12 col-md-4">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d340.85518127785514!2d-38.48451457396442!3d-3.7235434572906736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c747df5c6423a1%3A0x50d2c51d1955e655!2sIracema%20Residence%20Flat%20Service%20%7C%20Flat%20Em%20Fortaleza!5e1!3m2!1spt-BR!2sbr!4v1684171325727!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-12 col-md-4">
				<span class="titlesocial">REDES SOCIAIS</span>
				<ul class="social">
					<li><i class="bi bi-facebook"></i> <p>Facebook</p></li>
					<li><i class="bi bi-twitter"></i> <p>Twitter</p></li>
					<li><i class="bi bi-instagram"></i> <p>Instagram</p></li>
				</ul>
			</div>
			<div class="col-12 col-md-4"></div>
		</div>
	  </footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="source/js/script.js"></script>
</body>
</html>