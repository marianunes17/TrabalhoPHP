<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$sqlServicos = mysqli_query($conn, "SELECT * FROM servicos");

$sqlAnimais = mysqli_query($conn, "SELECT * FROM animais WHERE idDono =" . $_SESSION['id']);

if ( !isset($_SESSION["nomeUtilizador"]) ) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Reservar Serviço </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 m-0"><span class="text-primary">Reservar Serviço</span> </h1>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-12 py-5">
                    <div class="control-group">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Data: </label>
                            </div>
                            <div class="col-11">
                                <input type="datetime-local" name="data" class="form-control border-0 p-4 text-capitalize" placeholder="Data" required="required" />
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
                                <select class="form-control form-control-lg">
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
                                <select class="form-control form-control-lg">
                                    <option value="" disabled="disabled" selected>Selecione um Animal</option>
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

                    <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Reservar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>