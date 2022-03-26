<!DOCTYPE html>
<html>

<head>
    <title>PERFIL</title>
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
        <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large w3-black">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>PERFIL</p>
        </a>
        <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>

    </nav>

    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
        <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
            <a href="perfil.php" class="w3-bar-item w3-button" style="width:25% !important">PERFIL</a>,
            <a href="home.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
        </div>
    </div>

    <!-- Page Content -->

    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
        <h2 class="w3-text-light-grey">LIVROS ALUGADOS</h2>
        <hr style="width:200px" class="w3-opacity"><br>
        <table class="table">

            <?php
  echo "<tr><td>Titulo</td></tr>";
  session_start();
  $idusuario =  $_SESSION['id'];
  //echo $idusuario;
  $conexao = mysqli_connect("localhost", "root", "", "trabalho") or print(mysqli_error());
  $results = mysqli_query($conexao,("SELECT livros.titulo, livros.id FROM livrosusuario JOIN livros WHERE livrosusuario.idlivro= livros.id and idusuario = ".$_SESSION['id'].""));
  
  while ($row = mysqli_fetch_array($results)) {
      echo "<tr>";
      echo "<td>" . $row["titulo"] . "</td>";
      
      echo "<td><a href=\"devolver.php?idlivro=".$row['id']."\"><button class=\"w3-button w3-grey\">Devolver</button></a></td>";
      
      echo "</tr>";
    }
    echo "<tr>";
    echo "<td><a href=\"home.php\"><button class=\"w3-button w3-grey\" >Voltar</button></a></td>";
    echo "</tr>";
    
    ?>
        </table>
        <!-- End Contact Section -->
    </div>
    </div>

</body>

</html>