<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
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


    <?php
    if(!empty($_GET['msg'])){
         
        if ($_GET['msg'] == "OK"){
    ?>
        <div class="alert alert-info" role="alert">
            <?php echo "<strong> Registrado com sucesso, você já pode fazer o login.</strong>"; ?>

            <?php

        }
        
        else if($_GET['msg'] == "LOGIN_ERROR"){
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "<strong>Usuário e/ou senha inválidos.</strong>"; ?>
                    <?php
        }
        else
        {
    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "<strong> Login feito com sucesso. <strong><br>";?>
                            <?php
        }
        unset($_GET['msg']);
    }
    ?>
                                <!-- Icon Bar (Sidebar - hidden on small screens) -->
                                <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
                                    <!-- Avatar image in top left corner -->
                                    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
                                        <i class="fa fa-sign-in w3-xxlarge"></i>
                                        <p>LOGIN</p>
                                    </a>
                                </nav>

                                <!-- Navbar on small screens (Hidden on medium and large screens) -->
                                <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
                                    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
                                        <a href="login.php" class="w3-bar-item w3-button" style="width:25% !important">LOGIN</a>
                                    </div>
                                </div>

                                <!-- Page Content -->

                                <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
                                    <h2 class="w3-text-light-grey">LOGIN</h2>
                                    <hr style="width:200px" class="w3-opacity"><br>

                                    <form action="customersession.php" method="post">
                                        <p><input class="w3-input w3-padding-16" type="email" placeholder="EMAIL" required name="email"></p>
                                        <p><input class="w3-input w3-padding-16" type="password" placeholder="SENHA" required name="senha"></p>
                                        <p><a href="cadastro-de-usuarios.html" class="text-info">Cadastre-se</a></p>
                                        <p>
                                            <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-sign-in"></i> ENTRAR
        </button>
                                        </p>
                                    </form>
                                    <!-- End Contact Section -->
                                </div>
                        </div>

</body>

</html>