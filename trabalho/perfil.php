<html>
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Lista de livros</title>
    </head>
    
    <body>
        <table class="table">
            
            <?php
  echo "<a href=\"home.php\"><button >Voltar</button></a>";
  echo "<tr><td>Titulo</td></tr>";
  session_start();
  $idusuario =  $_SESSION['id'];
  //echo $idusuario;
  $conexao = mysqli_connect("localhost", "root", "", "trabalho") or print(mysqli_error());
  $results = mysqli_query($conexao,("SELECT livros.titulo, livros.id FROM livrosusuario JOIN livros WHERE livrosusuario.idlivro= livros.id and idusuario = ".$_SESSION['id'].""));
  
        while ($row = mysqli_fetch_array($results)) {
            echo "<tr>";
            echo "<td>" . $row["titulo"] . "</td>";
            
            echo "<td><a href=\"devolver.php?idlivro=".$row['id']."\"><button class=\"btn btn-info\">Devolver</button></a></td>";
            
            echo "</tr>";
        }
        
        ?>
    </table>
</body>

</html>