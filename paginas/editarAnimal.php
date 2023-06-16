<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

//se a variavel nao foi iniciada vai para o index
if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

if (isset($_POST['atualizar'])) {
    $idAnimal = $_POST['idAnimal'];
    $nomeAnimal = $_POST['nomeAnimal'];
    $tipo = $_POST['tipo'];
    $raca = $_POST['raca'];
    $pelo = $_POST['pelo'];
    $idDono = $_POST['idDono'];

    $alteraAnimal = mysqli_query($conn, "UPDATE animais SET id = $idAnimal,
        nomeAnimal='$nomeAnimal', tipo='$tipo', raca='$raca',
        pelo='$pelo' WHERE id=$idAnimal");


    if (!$alteraAnimal) {
        echo ("Erro ao editar animal: " . $alteraAnimal($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=dadospessoais.php">';
    }
}

if (isset($_GET['id'])) {
    $idAnimal = $_GET['id'];

    $animais = mysqli_query($conn, "SELECT * FROM animais WHERE id='$idAnimal'");

    if ($animais->num_rows > 0) {
        while ($row = $animais->fetch_assoc()) {
            $idAnimal = $row['id'];
            $nomeAnimal = $row['nomeAnimal'];
            $tipo = $row['tipo'];
            $raca = $row['raca'];
            $pelo = $row['pelo'];
            $idDono = $row['idDono'];
        }
    }

    if ($_SESSION["id"] != $idDono) {
        echo '<meta http-equiv="refresh" content="0; url=dadospessoais.php">';
    }
}
?>

<title> PetShop | Editar Animal
    <?php echo $nomeAnimal ?>
</title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 m-0"><span class="text-primary text-capitalize">Editar Animal <?php echo $nomeAnimal ?> </span> </h1>
            </div>

            <div class="contact-form">
                <form method="POST">

                    <input type="text" class="invisible" name="idAnimal" class="form-control p-4 text-capitalize" placeholder="id" <?php echo "value='" . $idAnimal . "'"; ?> />

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Nome: </label>
                            </div>
                            <div class="col-11">
                                <input type="text" name="nomeAnimal" class="form-control p-4 text-capitalize" placeholder="Nome Animal" required="required" data-validation-required-message="Nome" <?php echo "value='" . $nomeAnimal . "'"; ?> />
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Tipo: </label>
                            </div>
                            <div class="col-11 form-group">
                                <select name="tipo" class="form-select">
                                    <option value="" disabled="disabled" selected> <?php echo $tipo ?> </option>
                                    <option value="cão"> Cão </option>
                                    <option value="gato"> Gato </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Raça: </label>
                            </div>
                            <div class="col-11">
                                <input type="text" name="raca" class="form-control p-4" placeholder="Raça" data-validation-required-message="Email" <?php echo "value='" . $raca . "'"; ?> />
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Tipo de pelo: </label>
                            </div>
                            <div class="col-11 form-group">
                                <select name="pelo" class="form-select">
                                    <option value="" disabled="disabled" selected> <?php echo $pelo ?> </option>
                                    <option value="curto"> Curto </option>
                                    <option value="longo"> Longo </option>
                                    <option value="sem pelo"> Sem pelo </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="text" class="invisible" name="idDono" class="form-control p-4 text-capitalize" placeholder="id" <?php echo "value='" . $idDono . "'"; ?> />


                    <div class="control-group">
                        <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='atualizar'>Guardar</button>
                        <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="gestao.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>