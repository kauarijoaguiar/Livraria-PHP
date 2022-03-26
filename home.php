<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }
        
        .w3-row-padding img {
            margin-bottom: 12px
        }
        /* Set the width of the sidebar to 120px */
        
        .w3-sidebar {
            width: 120px;
            background: #222;
        }
        /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
        
        #main {
            margin-left: 120px
        }
        /* Remove margins from "page content" on small screens */
        
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0
            }
        }
    </style>
</head>

<body class="w3-black">

    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
        <!-- Avatar image in top left corner -->
        <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>PERFIL</p>
        </a>
        <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-sign-out w3-xxlarge"></i>
            <p>SAIR</p>
        </a>
    </nav>

    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
        <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
            <a href="home.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
            <a href="perfil.php" class="w3-bar-item w3-button" style="width:25% !important">PERFIL</a>
            <a href="logout.php" class="w3-bar-item w3-button" style="width:25% !important">SAIR</a>
        </div>
    </div>

    <!-- Page Content -->
    <div class="w3-padding-large" id="main">
        <!-- Header/Home -->
        <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
            <h1 class="w3-jumbo"><span class="w3-hide-small"></span>
                <?php 
         session_start();
         $conexao = mysqli_connect("localhost", "root", "", "trabalho");
         $nomeUsuario =  mysqli_fetch_array(mysqli_query($conexao, "SELECT nome FROM usuario WHERE email='" . $_SESSION['email'] . "'"))['nome'];
         //echo "<a class=\"nav-link\" href=\"perfil.php\">Seja bem vinda/o <span class=\"sr-only\">(current)</span></a> ";
         
         echo "<h1>Seja bem vindo/a <br>".$nomeUsuario."</h1>";
         
         ?>
            </h1>
        </header>

        <!-- About Section -->
        <div class="w3-content w3-justify w3-text-grey w3-padding-64 w3-center" id="about">
            <h2 class="w3-text-light-grey">Livros da biblioteca online</h2>
            <hr style="width:200px" class="w3-opacity">
            <p>
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
                
                echo "<tr><td>Livros</td></tr>";
                echo "<tr><td>ID</td><td>Autores</td><td>Titulo</td><td>Ano</td><td>Editora</td><td>Emprestado</td><td>Quantidade</td></tr>";
                while($linha = mysqli_fetch_array($resultado)){
                  echo "<tr> <td>".$linha['id']."</td>
                  <td>".$linha['autores']."</td>
                  <td>".$linha['titulo']."</td>
                  <td>".$linha['ano']."</td>
                  <td>".$linha['editora']."</td>
                  <td>".$linha['emprestado']."</td>
                  <td>".$linha['quantidade']."</td>
                  <td><a href=\"alugar.php?idlivro=".$linha['id']."\"><button class=\"w3-button w3-grey\">Alugar</button></a></td>";
                  //  <td><button class=\"btn btn-danger btn-xs\"  ><a href=\"alugar.php?idlivro=".$linha['id']."\">Alugar</a></button></td>";
                  
                  ?>
                            <td>
                            </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                    <?php
                mysqli_close($conexao);
                ?>
            </p>
        </div>
    </div>

    <div class="w3-half">
        <img src="/w3images/underwater.jpg" style="width:100%">
        <img src="/w3images/chef.jpg" style="width:100%">
        <img src="/w3images/wedding.jpg" style="width:100%">
        <img src="/w3images/p6.jpg" style="width:100%">
    </div>
    </div>
    </div>

</body>

</html>