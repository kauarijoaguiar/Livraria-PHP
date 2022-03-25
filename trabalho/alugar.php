<?php
session_start();

$idlivro = $_GET['idlivro'];
$idusuario =  $_SESSION['id'];

$conexao = mysqli_connect("localhost", "root", "", "trabalho") or print(mysqli_error());


$count="SELECT quantidade from livros where id= ".$_GET['idlivro']."";
$resultado = mysqli_query($conexao, $count);
$countfinal;
while($linha = mysqli_fetch_array($resultado)){
    $countfinal = $linha['quantidade'];
}
echo $countfinal;
if($countfinal > 0){

$query = "INSERT INTO livrosusuario (idlivro, idusuario) VALUES ($idlivro, $idusuario)";

$diminuir = "UPDATE LIVROS SET QUANTIDADE = LIVROS.QUANTIDADE-1 WHERE id= ".$_GET['idlivro']."";

$aumentar = "UPDATE LIVROS SET EMPRESTADO = LIVROS.EMPRESTADO+1 WHERE id= ".$_GET['idlivro']."";

if (mysqli_query($conexao, $query)){
    mysqli_query($conexao, $diminuir);
    mysqli_query($conexao, $aumentar);  
    header("Location: home.php");
} else{
    echo "livro ja adicionado";
}
}else{
    header("Location: home.php");
}
?>
<script>
setTimeout(function () { window.open(\"home.php\",\"_self\"); }, 1000);
</script>