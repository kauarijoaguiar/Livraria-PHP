<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha  = $_POST['senha'];
 
$conexao = mysqli_connect("localhost","root","","trabalho") or print (mysqli_error());

$query = "INSERT INTO usuario (nome,email,senha) VALUES ('$nome','$email', '$senha')";

if (mysqli_query($conexao, $query)) {  
    header("Location: login.php?msg=OK");
}

//echo "<script>setTimeout(function () { window.open(\"login.php\",\"_self\"); }, 3000);</script>";

?>
