<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$sqlServicos = mysqli_query($conn, "SELECT * FROM servicos");

$sqlAnimais = mysqli_query($conn, "SELECT * FROM animais WHERE idDono =" . $_SESSION['id']);

if (isset($_POST['reservar'])) {
    $dataInicio = $_POST['dataInicio'];
    $idAnimal = $_POST['idAnimal'];
    $idServico = $_POST['idServico'];


    if ($idServico == 1 ||  $idServico == 3) {
        $alteraUtilizador = mysqli_query($conn, "INSERT INTO reservas(dataInicio, dataFim, idAnimal, idServico) values
    ('$dataInicio', date_add(dataInicio, INTERVAL 30 MINUTE), '$idAnimal', '$idServico') ");
    } else {
        $alteraUtilizador = mysqli_query($conn, "INSERT INTO reservas(dataInicio, dataFim, idAnimal, idServico) values
    ('$dataInicio', date_add(dataInicio, INTERVAL 1 HOUR), '$idAnimal', '$idServico') ");
    }


    echo '<meta http-equiv="refresh" content="0; url=reservas.php">';
}

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Reserva </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 mb-5"><span class="text-primary">Reserva</span> </h1>
            </div>

            <div class="contact-form">
                <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">
                    <div class="control-group">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Data: </label>
                            </div>
                            <div class="col-11">
                                <input type="datetime-local" name="dataInicio" class="form-control border-0 p-4 text-capitalize" placeholder="Data" required="required" />
                            </div>
                            <p class="help-block text-danger"> </p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Serviço: </label>
                            </div>
                            <div class="col-11">
                                <select name='idServico' class="form-control form-control-md">
                                    <option value="" disabled="disabled" selected>Selecione um Serviço</option>
                                    <?php
                                    while ($sqlServicosInfo = mysqli_fetch_array($sqlServicos)) {
                                        echo '<option value="' . $sqlServicosInfo['id'] . '"> ' . $sqlServicosInfo['nomeServico'] . '</option> ';
                                    }
                                    ?>
                                </select>
                            </div>
                            <p class="help-block text-danger"> </p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Animal: </label>
                            </div>
                            <div class="col-11">
                                <select class="form-control form-control-md" name='idAnimal'>
                                    <option disabled="disabled" selected>Selecione um Animal</option>
                                    <?php
                                    while ($sqlAnimaisInfo = mysqli_fetch_array($sqlAnimais)) {
                                        echo '<option value="' . $sqlAnimaisInfo['id'] . '"> ' . $sqlAnimaisInfo['nomeAnimal'] . '</option> ';
                                    }
                                    ?>
                                </select>
                            </div>
                            <p class="help-block text-danger"> </p>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='reservar'>Reservar</button>
                        <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="reservas.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>