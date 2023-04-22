<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$animais = mysqli_query($conn, "SELECT * FROM animais WHERE idDono='" . $_SESSION["id"] . "'");
$animaisInfo = mysqli_fetch_array($animais);

$reservas = mysqli_query($conn, "SELECT * FROM reservas WHERE idAnimal='" . $_SESSION["id"] . "'");
$reservasInfo = mysqli_fetch_array($reservas);


$servicoFuncionario = mysqli_query($conn, "SELECT * FROM servicos s 
                                            JOIN servicosfuncionarios sf
                                            ON s.id = sf.idServico AND
                                            sf.idFuncionario='" . $_SESSION["id"] . "'");
$servicoFuncionarioInfo = mysqli_fetch_assoc($servicoFuncionario);


?>



<title> PetShop | Dados pessais </title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light pt-5">
        <div class="container">
            <?php
            if (!isset($_SESSION["nomeUtilizador"])) {
                echo '<meta http-equiv="refresh" content="0; url=index.php">';

            } else { ?>
                <!--Navbar-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="dados-tab" data-bs-toggle="tab" href="#dados" type="button" role="tab" aria-controls="dados" aria-selected="true"> Dados Pessoais
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="animais-tab" data-bs-toggle="tab" data-bs-target="#animais" type="button" role="tab" aria-controls="animais-tab" aria-selected="false">Animais</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- -------------------------- DADOS PESSOAIS -------------------------- -->
                    <div class="tab-pane fade show active opacity-100 py-4" id="dados" role="tabpanel" aria-labelledby="dados-tab">

                        <a type="button" class="btn btn-primary float-right" href="editardados.php">Editar</a>


                        <div class="row justify-content-center ">
                            <div class="col-1">
                                <label class="font-weight-bold"> Nome: </label>
                            </div>
                            <div class="col-11 align-self-center">
                                <label class='text-capitalize font-weight-normal'> <?php echo $_SESSION['nomeUtilizador'] ?> </label>
                            </div>


                            <div class="col-1 align-self-center">
                                <label class="font-weight-bold"> Email: </label>
                            </div>
                            <div class="col-11">
                                <label class="font-weight-normal"> <?php echo $_SESSION['email'] ?> </label>
                            </div>


                            <div class="col-1 align-self-center">
                                <label class="font-weight-bold"> Telemovel: </label>
                            </div>
                            <div class="col-11">
                                <label class="font-weight-normal"> <?php echo $_SESSION['telemovel'] ?> </label>
                            </div>


                            <?php
                            if ($_SESSION['tipo'] == 'funcionario') {
                                echo '
                                    <div class="col-1">
                                        <label class="font-weight-bold"> Serviço: </label>
                                    </div>
                                    <div class="col-11">';
                                while ($servicoFuncionarioInfo = mysqli_fetch_array($servicoFuncionario)) {
                                    echo '<label class="text-capitalize font-weight-normal""> ' .  $servicoFuncionarioInfo['nomeServico'] . '</label> <br>';
                                }
                            }
                            echo '</div>';
                            ?>
                        </div>
                    </div>

                    <!-- -------------------------- ANIMAIS -------------------------- -->
                    <div class="tab-pane fade opacity-100  py-4" id="animais" role="tabpanel" aria-labelledby="animais-tab" tabindex="0">
                        <?php
                        while ($animaisInfo = mysqli_fetch_array($animais)) {
                        ?>

                            <div class="row justify-content-center pb-2">
                                <h4> <?php echo $animaisInfo['nomeAnimal'] ?> </h4>


                                <div class="col-1 align-self-center">
                                    <label class="font-weight-bold"> Tipo: </label>
                                </div>
                                <div class="col-11">
                                    <label class="font-weight-normal text-capitalize"> <?php echo $animaisInfo['tipo'] ?> </label>
                                </div>

                                <div class="col-1 align-self-center">
                                    <label class="font-weight-bold"> Raça: </label>
                                </div>
                                <div class="col-11">
                                    <label class="font-weight-normal text-capitalize"> <?php echo $animaisInfo['raca'] ?> </label>
                                </div>

                                <div class="col-1 align-self-center">
                                    <label class="font-weight-bold"> Pelo: </label>
                                </div>
                                <div class="col-11">
                                    <label class="font-weight-normal text-capitalize"> <?php echo $animaisInfo['pelo'] ?> </label>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>


                    <!-- -------------------------- RESERVAS -------------------------- -->
                    <div class="tab-pane fade py-4" id="reservas" role="tabpanel" aria-labelledby="reservas-tab" tabindex="0">
                        <?php
                        if ($reservasInfo['idDono'] == $SESSION['id']) {
                            while ($reservasInfo = mysqli_fetch_array($animais)) {
                        ?>

                                <div class="row justify-content-center pb-2">
                                    <h4> <?php echo $reservasInfo['nomeAnimal'] ?> </h4>


                                    <div class="col-1 align-self-center">
                                        <label class="font-weight-bold"> Tipo: </label>
                                    </div>
                                    <div class="col-11">
                                        <label class="font-weight-normal text-capitalize"> <?php echo $reservasInfo['tipo'] ?> </label>
                                    </div>

                                    <div class="col-1 align-self-center">
                                        <label class="font-weight-bold"> Raça: </label>
                                    </div>
                                    <div class="col-11">
                                        <label class="font-weight-normal text-capitalize"> <?php echo $reservasInfo['raca'] ?> </label>
                                    </div>

                                    <div class="col-1 align-self-center">
                                        <label class="font-weight-bold"> Pelo: </label>
                                    </div>
                                    <div class="col-11">
                                        <label class="font-weight-normal text-capitalize"> <?php echo $reservasInfo['pelo'] ?> </label>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>;
            <?php } ?>
        </div>
    </div>

    <?php require "footer.php"; ?>

</body>
</html>