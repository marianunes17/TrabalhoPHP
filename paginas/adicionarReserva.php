<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$servicos = mysqli_query($conn, "SELECT * FROM servicos");

$animais = mysqli_query($conn, "SELECT * FROM animais WHERE idDono =" . $_SESSION['id']);

$funcionarios = mysqli_query($conn, "SELECT * FROM utilizadores WHERE tipo ='funcionario' ");

if (isset($_POST['reservar'])) {
    $idAnimal = $_POST['idAnimal'];
    $dataInicio = $_POST['dataInicio'];
    $idServico = $_POST['idServico'];

    $reservas = "SELECT TIMESTAMPDIFF(MINUTE, r.dataInicio, '1212-11-07 17:11:00')>=30, FROM reservas r";

    if ($reservas) {
        if ($idServico == 1 ||  $idServico == 3) {
            $adicionarReserva = mysqli_query($conn, "INSERT INTO reservas(dataInicio, dataFim, idAnimal, idServico) values
        ('$dataInicio', date_add(dataInicio, INTERVAL 30 MINUTE), '$idAnimal', '$idServico') ");
        } else {
            $adicionarReserva = mysqli_query($conn, "INSERT INTO reservas(dataInicio, dataFim, idAnimal, idServico) values
        ('$dataInicio', date_add(dataInicio, INTERVAL 1 HOUR), '$idAnimal', '$idServico') ");
        }
    }


    //Verifica se há erros na consulta
    if (!$servicos) {
        echo ("Erro: " . $servicos($con));
    } else if (!$animais) {
        echo ("Erro: " . $animais($con));
    } else if (!$funcionarios) {
        echo ("Erro: " . $funcionarios($con));
    } else if (!$reservas) {
        echo ("Erro: " . $reservas($con));
    } else if (!$adicionarReserva) {
        echo ("Erro: " . $reservas($adicionarReserva));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=reservas.php">';
    }
}



if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Adicionar Reserva </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 mb-5"><span class="text-primary">Adicionar Reserva</span> </h1>
            </div>

            <div class="contact-form">
                <form method="POST">
                    <div class="control-group pb-3">
                        <div class="row justify-content-center">
                            <div class="col-1 align-self-center">
                                <label> Data: </label>
                            </div>
                            <div class="col-11">
                                <input type="datetime-local" min="12:00" max="18:00" name="dataInicio" class="form-control border-0 p-4 text-capitalize" placeholder="Data" required />
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center">
                            <div class="col-1 align-self-center">
                                <label> Serviço: </label>
                            </div>
                            <div class="col-11">
                                <select name='idServico' class="form-control form-control-md" id="idServico" onchange="selecionarServico()">
                                    <option value="" disabled="disabled" selected>Selecione um Serviço</option>
                                    <?php
                                    while ($servicosInfo = mysqli_fetch_array($servicos)) {
                                        echo '<option class="text-capitalize"  value="' . $servicosInfo['id'] . '"> ' . $servicosInfo['nomeServico'] . '</option> ';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3" id="idFuncionario"> <!--  style="visibility:hidden" -->
                        <div class="row justify-content-center">
                            <div class="col-1 align-self-center">
                                <label> Funcionario: </label>
                            </div>
                            <div class="col-11">
                                <select name='idFuncionario' class="form-control form-control-md">
                                    <option value="" disabled="disabled" selected>Selecione um Funcionario</option>
                                    <?php
                                    while ($funcionariosInfo = mysqli_fetch_array($funcionarios)) {
                                        //if ($tagname = $dom->getElementById('idServico')->value) {
                                        echo '<option class="text-capitalize" value="' . $funcionariosInfo['id'] . '"> ' . $funcionariosInfo['nomeUtilizador'] . '</option> ';
                                        //}
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Animal: </label>
                            </div>
                            <div class="col-11">
                                <select class="form-control form-control-md" name='idAnimal'>
                                    <option disabled="disabled" selected>Selecione um Animal</option>
                                    <?php
                                    while ($animaisInfo = mysqli_fetch_array($animais)) {
                                        echo '<option class="text-capitalize" value="' . $animaisInfo['id'] . '"> ' . $animaisInfo['nomeAnimal'] . '</option> ';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='reservar'>Reservar</button>
                        <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="reservas.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
    <!--
    <script type="text/javascript">
        function selecionarServico() {
            var servico = document.getElementById("idServico").value;
            if (servico == 1 || servico == 2) {
                document.getElementById("idFuncionario").style.visibility = "visible";
            }
        }
    </script>
    -->
</body>

</html>