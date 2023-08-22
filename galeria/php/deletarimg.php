<?php
     $cb = $_POST['img']; 

     $connect = new mysqli('localhost', 'root', '', 'heroku_8d2ca47a17d393c');
 
     $sql = "DELETE FROM imagens WHERE urlimg = '$cb'";
      
     if(mysqli_query($connect, $sql)) {
         echo "
             <script type ='text/javascript'>
                 alert('Imagem excluida com Sucesso!');
             </script>
         ";	
         chmod('deletarimg.php', 0777); //dar permissao de adm ao arquivo
         unlink('../img/'.$cb); //exlcuir imagem da pesta
         echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
     } else {
         echo "Erro: " . $sql . "<br>" . mysqli_error($connect);
     }
 
     mysqli_close($connect);
?>