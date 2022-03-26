<?php
session_start();

$email = $_POST['email'];
$senha  =md5($_POST['senha']);

$conexao = mysqli_connect("localhost","root","","trabalho") or print (mysqli_error());

$query = "SELECT * FROM usuario WHERE email='$email' and senha= '$senha'";

if ($result=mysqli_query($conexao, $query)) {

  $linha = mysqli_fetch_array($result);
  if(!empty($linha)){
    $_SESSION['nome'] = $linha['nome'];
    $_SESSION['email'] = $linha['email'];
    $_SESSION['id'] = $linha['id'];
    header("Location: home.php");
  }else{
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    header("Location: login.php?msg=LOGIN_ERROR");
  }
    //header("Location: login.php?msg=OK");
} else {
    header("Location: login.php?msg=ERRO");
}
?>