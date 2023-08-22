<?php
     $cb = $_POST['quarto']; 

     $connect = new mysqli('us-cdbr-east-06.cleardb.net', 'b4d502d525b1b4', '78a3a124', 'heroku_8d2ca47a17d393c');
 
     $sql = "DELETE FROM quartos WHERE numquarto = '$cb'";
      
     if(mysqli_query($connect, $sql)) {
         echo "
             <script type ='text/javascript'>
                 alert('Quarto excluido com Sucesso!');
             </script>
         ";	
         echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
     } else {
         echo "Erro: " . $sql . "<br>" . mysqli_error($connect);
     }
 
     mysqli_close($connect);
?>