<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $raca = $_POST['raca'];
    $pelo = $_POST['pelo'];
    $idutilizador = $_SESSION['id'];


    $alteraUtilizador = mysqli_query($conn, "INSERT INTO animais(nomeAnimal, tipo, raca, pelo, idDono) values
    ('$nome','$tipo', '$raca', '$pelo', '$idutilizador') ");
}

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Adicionar Animal </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 mb-5"><span class="text-primary">Adicionar Animal</span> </h1>
            </div>

                    <div class="contact-form">
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">
                            <input type="text" class="invisible" name="id" class="form-control p-4 text-capitalize" placeholder="id" />

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
                                        <label> Tipo: </label>
                                    </div>
                                    <div class="col-11">
                                        <select name="tipo" class="form-control form-control-md">
                                            <option value="" disabled="disabled" selected>Tipo de Animal</option>
                                            <option value="cão"> Cão </option>
                                            <option value="gato"> Gato </option>
                                        </select>
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Raça: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="text" name="raca" class="form-control p-4" placeholder="Raça" required="required" data-validation-required-message="Telemóvel" />
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Pelo: </label>
                                    </div>
                                    <div class="col-11">
                                        <select name="pelo" class="form-control form-control-md">
                                            <option value="" disabled="disabled" selected>Tipo de Pelo</option>
                                            <option value="curto"> Curto </option>
                                            <option value="longo"> Longo </option>
                                            <option value="sem pelo"> Sem pelo </option>
                                        </select>
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='adicionar'>Guardar</button>
                                <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="dadospessoais.php">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
    </div>

    <?php require 'footer.php'; ?>
</body>

</html>