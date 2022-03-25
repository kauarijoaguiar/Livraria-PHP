<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Main page - Home</title>
  </head>
  <body>

    
    <?php session_start(); ?>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Livraria</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
             <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="logout.php">Sair -></a>
           </li>
      
         </ul>
    
        </div>
  
      <div  class="collapse navbar-collapse" id="navbarNav">  
    
      <span class="navbar-text">
        
      
         <?php 

       $conexao = mysqli_connect("localhost", "root", "", "trabalho");
       $nomeUsuario =  mysqli_fetch_array(mysqli_query($conexao, "SELECT nome FROM usuario WHERE email='" . $_SESSION['email'] . "'"))['nome'];
       echo "<a class=\"nav-link\" href=\"perfil.php\">Seja bem vinda/o <span class=\"sr-only\">(current)</span></a> ";
       echo $nomeUsuario;
      
       
       
       
         ?>
        </span>
    
      </div>
  
    </nav>






<?php
$conexao = mysqli_connect("localhost","root","","trabalho") or print (mysqli_error());
// test if admin or normal customer to redirect a suitable page.


if (!empty($_POST["dataForRemoving"])){
  
  $removingRow = $_POST["dataForRemoving"];
  $query_for_removing = "DELETE FROM orders WHERE id=$removingRow";
  mysqli_query($conexao,$query_for_removing);
  
}

$id = $_SESSION['id'];
$query = "SELECT id,autores,titulo, ano, editora, emprestado, quantidade FROM livros";
$resultado = mysqli_query($conexao,$query);
?>

<table class="table">
  <?php

echo "<tr
><td>ID</td>
<td>Autores</td>
<td>Titulo</td>
<td>Ano</td>
<td>Editora</td>
<td>Emprestado</td>
<td>Quantidade</td>
</tr>";
while($linha = mysqli_fetch_array($resultado)){
  echo "<tr> <td>".$linha['id']."</td>
  <td>".$linha['autores']."</td>
  <td>".$linha['titulo']."</td>
  <td>".$linha['ano']."</td>
  <td>".$linha['editora']."</td>
  <td>".$linha['emprestado']."</td>
  <td>".$linha['quantidade']."</td>
  <td><a href=\"alugar.php?idlivro=".$linha['id']."\"><button class=\"btn btn-info\">Alugar</button></a></td>";
  //  <td><button class=\"btn btn-danger btn-xs\"  ><a href=\"alugar.php?idlivro=".$linha['id']."\">Alugar</a></button></td>";

  ?>
  

<td>
  
  </td></tr>
  
   <?php
}
?>
</tbody>
</table>
<?php
mysqli_close($conexao);
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>