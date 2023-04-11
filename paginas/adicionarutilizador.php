<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_POST['adicionar'])) {
    $nomeutilizador = $_POST['nome'];
    $emailutilizador = $_POST['email'];
    $telemovelutilizador = $_POST['telemovel'];
    $tipoutilizador = $_POST['tipo'];
    $idutilizador = $_POST['id'];


    $alteraUtilizador = ("INSERT INTO utilizadores(nome, email, telemovel, tipo) values
    ('$nomeutilizador', '$emailutilizador', '$telemovelutilizador', '$tipoutilizador') ");

    $result = $conn->query($alteraUtilizador);
}
?>



<title> PetShop | Editar utilizador <?php echo $nomeutilizador ?></title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 mb-5">
                    <div class="contact-form">
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">
                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Nome: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="text" name="nome" class="form-control p-4 text-capitalize" placeholder="Nome" required="required" data-validation-required-message="Nome" />
                                    </div>
                                    <p class="help-block text-danger"> </p>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Email: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="email" name="email" class="form-control p-4" placeholder="Email" required="required" data-validation-required-message="Email" />
                                    </div>
                                    <p class="help-block text-danger"> </p>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Telemovel: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="telemovel" name="telemovel" class="form-control p-4" placeholder="Telemovel" required="required" data-validation-required-message="Telemóvel" />
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Tipo: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="tipo" name="tipo" class="form-control p-4" placeholder="Tipo" required="required" data-validation-required-message="Tipo" />
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='adicionar'>Guardar</button>
                                <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="gestao.php">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

</body>

</html>