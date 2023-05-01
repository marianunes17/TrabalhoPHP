<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_POST['adicionar'])) {
    $nomeutilizador = $_POST['nome'];
    $password = md5($_POST['nome')];
    $emailutilizador = $_POST['email'];
    $telemovelutilizador = $_POST['telemovel'];
    $tipoutilizador = $_POST['tipo'];
    $idutilizador = $_POST['id'];

    $adicionarUtilizador = mysqli_query($conn, "INSERT INTO utilizadores(nomeUtilizador, password, email, telemovel, tipo) values
    ('$nomeutilizador','$password', '$emailutilizador', $telemovelutilizador, '$tipoutilizador') ");

    if (!$adicionarUtilizador) {
        echo ("Erro: " . $adicionarUtilizador($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
    }
}

if (!isset($_SESSION["nomeUtilizador"])  || ($_SESSION['tipo'] != 'admin')) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Adicionar Utilizador </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light pt-5">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 mb-5"><span class="text-primary">Adicionar Utilizador</span> </h1>
            </div>

            <div class="contact-form">
                <form method="POST">
                    <input type="text" class="invisible" name="id" class="form-control p-4 text-capitalize" placeholder="id" />

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Nome: </label>
                            </div>
                            <div class="col-11">
                                <input type="text" name="nome" class="form-control p-4 text-capitalize" placeholder="Nome" required="required" data-validation-required-message="Nome" />
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Email: </label>
                            </div>
                            <div class="col-11">
                                <input type="email" name="email" class="form-control p-4" placeholder="Email" required="required" data-validation-required-message="Email" />
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
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

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Tipo: </label>
                            </div>
                            <div class="col-11">
                                <select name="tipo" class="form-control form-control-md">
                                    <option value="" disabled="disabled" selected>Tipo de Cliente</option>
                                    <option value="cliente"> Cliente </option>
                                    <option value="funcionario"> Funcionario </option>
                                    <option value="admin"> Administrador </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='adicionar'>Guardar</button>
                        <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="gestao.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>