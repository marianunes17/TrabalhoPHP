<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_POST['registar'])) {
    $nomeutilizador = $_POST['nome'];
    $password = $_POST['password'];
    $emailutilizador = $_POST['email'];
    $telemovelutilizador = $_POST['telemovel'];


    $alteraUtilizador = ("INSERT INTO utilizadores(nomeUtilizador, password, email, telemovel, tipo) values
    ('$nomeutilizador','$password', '$emailutilizador', $telemovelutilizador, '') ");

    $result = $conn->query($alteraUtilizador);
}
?>

<title> PetShop | Registar </title>

<body>
    <?php require 'header.php'; ?>

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h1 class="display-4 m-0">Registo </h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="registo" id="registoFrom" action="" method="POST">

                        <div class="control-group">
                            <input type="text" class="form-control p-4" name="nome" id="nome" placeholder="Nome" required="required" data-validation-required-message="Por favor, introduza o nome" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <input type="email" class="form-control p-4" name="email" id="email" placeholder="Email" required="required" data-validation-required-message="Por favor, introduza o email" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <input type="passsword" class="form-control p-4" name="password" id="passsword" placeholder="Passsword" required="required" data-validation-required-message="Por favor, introduza a password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="phone" class="form-control p-4" name="telemovel" id="telemovel" placeholder="Telemovel" required="required" data-validation-required-message="Por favor, introduza o telemóvel" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" name="registar" id="sendMessageButton">Registar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-sm-8 mb-5 ">
                <a href="login.php">
                    <h6 class="text-secondary mb-3 text-right">Login</h6>
                </a>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php require 'footer.php'; ?>
</body>
</html>