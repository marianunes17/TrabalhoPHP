<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$animais = mysqli_query($conn, "SELECT * FROM animais WHERE idDono='" . $_SESSION["id"] . "'");

$reservas = mysqli_query($conn, "SELECT * FROM reservas WHERE idAnimal='" . $_SESSION["id"] . "'");

$servicoFuncionario = mysqli_query($conn, "SELECT * FROM servicos s 
                                            JOIN servicosfuncionarios sf
                                            ON s.id = sf.idServico AND
                                            sf.idFuncionario='" . $_SESSION["id"] . "'");

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>
<title> PetShop | Dados Pessoais </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light pt-5">
        <div class="container">
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

                    <div class="row justify-content-center ">
                        <div class="col-6">
                            <h4 class="mb-3"><span class="text-primary">Dados Pessoais</span> </h4>
                        </div>
                        <div class="col-6">
                            <a type="button" class="btn btn-primary float-right" href="editarDadosPessoais.php?id=<?php echo $_SESSION['id']; ?>">Editar</a>

                        </div>
                    </div>

                    <div class="row justify-content-center ">
                        <div class="col-1">
                            <label class="font-weight-bold"> Nome: </label>
                        </div>
                        <div class="col-11 align-self-center">
                            <label class='text-capitalize font-weight-normal'> <?php echo $_SESSION['nomeUtilizador'] ?> </label>
                        </div>
                    </div>

                    <div class="row justify-content-center ">
                        <div class="col-1 align-self-center">
                            <label class="font-weight-bold"> Email: </label>
                        </div>
                        <div class="col-11">
                            <label class="font-weight-normal"> <?php echo $_SESSION['email'] ?> </label>
                        </div>
                    </div>

                    <div class="row justify-content-center ">
                        <div class="col-1 align-self-center">
                            <label class="font-weight-bold"> Telemovel: </label>
                        </div>
                        <div class="col-11">
                            <label class="font-weight-normal"> <?php echo $_SESSION['telemovel'] ?> </label>
                        </div>
                    </div>
                    <?php if ($_SESSION['tipo'] == 'funcionario') { ?>
                        <div class="row justify-content-center ">
                            <div class="col-1">
                                <label class="font-weight-bold"> Serviço: </label>
                            </div>
                            <div class="col-11">
                                <?php while ($servicoFuncionarioInfo = mysqli_fetch_array($servicoFuncionario)) { ?>
                                    <label class="text-capitalize font-weight-normal">
                                        <?php echo $servicoFuncionarioInfo['nomeServico'] ?>
                                    </label> <br>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- -------------------------- ANIMAIS -------------------------- -->
                <div class="tab-pane fade opacity-100  py-4" id="animais" role="tabpanel" aria-labelledby="animais-tab">
                    <div class="d-flex flex-column">
                        <div class="row justify-content-center mb-2 pt-4">
                            <div class="col-6 align-self-center">
                                <h4 class="mb-3"><span class="text-primary">Animais</span> </h4>
                            </div>
                            <div class="col-6 align-self-center">
                                <a type="button" class="btn btn-primary float-right" href="adicionarutilizador.php">Adicionar</a>
                            </div>
                        </div>

                        <?php
                        while ($animaisInfo = mysqli_fetch_array($animais)) {
                        ?>
                            <div class="row justify-content-center mb-2 pt-4">
                                <div class="col-6 align-self-center">
                                    <h5> <?php echo $animaisInfo['nomeAnimal'] ?> </h5>
                                </div>

                                <div class="col-6">
                                    <a type="button" class="btn btn-primary float-right" href="editarAnimal.php">Editar</a>

                                </div>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-1 align-self-center">
                                    <label class="font-weight-bold"> Tipo: </label>
                                </div>
                                <div class="col-11">
                                    <label class="font-weight-normal text-capitalize"> <?php echo $animaisInfo['tipo'] ?> </label>
                                </div>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-1 align-self-center">
                                    <label class="font-weight-bold"> Raça: </label>
                                </div>
                                <div class="col-11">
                                    <label class="font-weight-normal text-capitalize"> <?php echo $animaisInfo['raca'] ?> </label>
                                </div>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-1 align-self-center">
                                    <label class="font-weight-bold"> Pelo: </label>
                                </div>
                                <div class="col-11">
                                    <label class="font-weight-normal text-capitalize"> <?php echo $animaisInfo['pelo'] ?> </label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>
</html>