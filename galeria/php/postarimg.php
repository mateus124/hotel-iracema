<?php
    $dir = "../img"; 
    $file = $_FILES["arquivo"];
    $arquivo = $file["name"];
    move_uploaded_file($file["tmp_name"], "$dir/".$arquivo);

    $connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');
    $sql = "INSERT INTO imagens (urlimg) VALUES ('$arquivo')";

    if(mysqli_query($connect, $sql)) {
		echo "
			<script type ='text/javascript'>
				alert('Você fez upload da imagem com sucesso!');
			</script>
		";	

        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
	} else {
		echo "Erro: " . $sql . "<br>" . mysqli_error($connect);
	}

    mysqli_close($connect);
?>