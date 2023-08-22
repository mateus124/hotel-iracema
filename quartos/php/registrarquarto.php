<?php
    $dir = "../img/"; 
    $file = $_FILES["arquivo"];
    $arquivo = $file["name"];
    move_uploaded_file($file["tmp_name"], "$dir/".$arquivo);
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST["desc"];

    $connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');
    $sql = "INSERT INTO quartos (nome, preco, descricao, imagem) VALUES ('$nome', '$preco', '$descricao', '$arquivo')";

    if(mysqli_query($connect, $sql)) {
		echo "
			<script type ='text/javascript'>
				alert('Quarto registrado com sucesso!');
			</script>
		";	

        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
	} else {
		echo "Erro: " . $sql . "<br>" . mysqli_error($connect);
	}

    mysqli_close($connect);
?>