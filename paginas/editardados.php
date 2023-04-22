<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

?>



<title> PetShop </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light pt-5">
        <?php
        if (!isset($_SESSION["nomeUtilizador"])) {
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
        } else { ?>


            <div class="d-flex flex-column text-center mb-5 pt-5">
                <h1 class="display-4 m-0">Editar Dados Pessoais</h1>
            </div>
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
                                        <input type="text" class="form-control p-4 text-capitalize" placeholder="Nome" required="required" data-validation-required-message="Nome" <?php
                                                                                                                                                                                    if (isset($_SESSION['nomeUtilizador'])) {
                                                                                                                                                                                        echo "value='" . $_SESSION['nomeUtilizador'] . "'";
                                                                                                                                                                                    }
                                                                                                                                                                                    ?> />
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
                                        <input type="email" class="form-control p-4" placeholder="Email" required="required" data-validation-required-message="Email" <?php
                                                                                                                                                                        if (isset($_SESSION['nomeUtilizador'])) {
                                                                                                                                                                            echo "value='" . $_SESSION['email'] . "'";
                                                                                                                                                                        }
                                                                                                                                                                        ?> />
                                    </div>
                                    <p class="help-block text-danger"> </p>
                                </div>
                            </div>

                                <div class="control-group">
                                    <div class="row justify-content-center  ">
                                        <div class="col-1 align-self-center">
                                            <label> Password: </label>
                                        </div>
                                        <div class="col-11">
                                            <input type="password" class="form-control p-4" placeholder="Password" required="required" data-validation-required-message="Password" <?php
                                                                                                                                                                                    if (isset($_SESSION['nomeUtilizador'])) {
                                                                                                                                                                                        echo "value='" . $_SESSION['password'] . "'";
                                                                                                                                                                                    }
                                                                                                                                                                                    ?> />
                                            <p class="help-block text-danger"> </p>
                                        </div>
                                    </div>
                                </div>

                                    <div class="control-group">
                                        <div class="row justify-content-center  ">
                                            <div class="col-1 align-self-center">
                                                <label> Telemovel: </label>
                                            </div>
                                            <div class="col-11">
                                                <input type="telemovel" class="form-control p-4" placeholder="Telemovel" required="required" data-validation-required-message="Telemóvel" <?php
                                                                                                                                                                                            if (isset($_SESSION['nomeUtilizador'])) {
                                                                                                                                                                                                echo "value='" . $_SESSION['telemovel'] . "'";
                                                                                                                                                                                            }
                                                                                                                                                                                            ?> />
                                                <p class="help-block text-danger"> </p>
                                            </div>
                                        </div>
                                    </div>

                                        <div>
                                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Guardar</button>
                                            <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="dadospessoais.php">Cancelar</a>
                                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <?php require 'footer.php'; ?>

</body>

</html>