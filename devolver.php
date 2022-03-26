<?php
session_start();

$idlivro = $_GET['idlivro'];
$idusuario =  $_SESSION['id'];
//$id = $_GET['id'];

$conexao = mysqli_connect("localhost", "root", "", "trabalho") or print(mysqli_error());
//$select="SELECT COUNT(*) AS QUANTIDADE FROM livrosusuario"
$select = "SELECT id FROM livrosusuario WHERE idusuario = '".$_SESSION['id']."' and idlivro = '".$_GET['idlivro']."'";

$diminuir = "UPDATE LIVROS SET EMPRESTADO = LIVROS.EMPRESTADO-1 WHERE id= ".$_GET['idlivro']."";

$aumentar = "UPDATE LIVROS SET QUANTIDADE = LIVROS.QUANTIDADE+1 WHERE id= ".$_GET['idlivro']."";
$resultado = mysqli_query($conexao, $select);
//if ((mysqli_query($conexao, $query))&&(mysqli_query($conexao, $diminuir))&&(mysqli_query($conexao, $aumentar))()){
 if((mysqli_query($conexao, $diminuir))&&(mysqli_query($conexao, $aumentar))&&(mysqli_query($conexao,$select))){
    while($linha = mysqli_fetch_array($resultado)){
        $ids = $linha['id'];
        //echo substr($ids,0,3);
        header("Location: home.php");

    } 
    //
} 

$idFinal = substr($ids,0,4);
$query = "delete from livrosusuario where id=". $idFinal.";";
(mysqli_query($conexao, $query));

?>
