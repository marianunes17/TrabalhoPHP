<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (!isset($_SESSION["nomeUtilizador"]) || ($_SESSION['tipo'] != 'admin')) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

if (isset($_POST['atualizar'])) {
    $nomeutilizador = $_POST['nomeutilizador'];
    $emailutilizador = $_POST['email'];
    $telemovelutilizador = $_POST['telemovel'];
    $tipoutilizador = $_POST['tipo'];
    $idutilizador = $_POST['id'];

    $alteraUtilizador = mysqli_query($conn, "UPDATE utilizadores SET nomeUtilizador = '$nomeutilizador',
        email='$emailutilizador', telemovel=$telemovelutilizador,
        tipo='$tipoutilizador' WHERE id=$idutilizador");

    if (!$alteraUtilizador) {
        echo ("Erro: " . $alteraUtilizador($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
    }
}

if (isset($_GET['id'])) {
    $idutilizador = $_GET['id'];

    $utilizador = mysqli_query($conn, "SELECT * FROM utilizadores WHERE id='$idutilizador'");

    if ($utilizador->num_rows > 0) {
        while ($row = $utilizador->fetch_assoc()) {
            $idutilizador = $row['id'];
            $nomeutilizador = $row['nomeUtilizador'];
            $emailutilizador = $row['email'];
            $telemovelutilizador = $row['telemovel'];
            $tipoutilizador = $row['tipo'];
        }
    }

    if (!$utilizador) {
        echo ("Erro: " . $utilizador($con));
    }
}

$utilizadores = mysqli_query($conn, "SELECT * FROM utilizadores");
?>

<title> PetShop | Editar utilizador
    <?php echo $nomeutilizador ?>
</title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="gestao.php">Gestão de Utilizadores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Utilizador</li>
                </ol>
            </nav>

            <div class="d-flex flex-column text-center">
                <h1 class="display-4 m-0"><span class="text-primary text-capitalize">Editar Utilizador <?php echo $nomeutilizador ?> </span> </h1>
            </div>


            <div class="contact-form">
                <form method="POST">
                    <input type="text" class="invisible" name="id" class="form-control p-4 text-capitalize" placeholder="id" <?php echo "value='" . $idutilizador . "'"; ?> />

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Nome: </label>
                            </div>
                            <div class="col-11">
                                <input type="text" name="nomeutilizador" class="form-control p-4 text-capitalize" placeholder="Nome" required="required" data-validation-required-message="Nome" <?php echo "value='" . $nomeutilizador . "'"; ?> />
                            </div>
                            <p class="help-block text-danger"> </p>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Email: </label>
                            </div>
                            <div class="col-11">
                                <input type="email" name="email" class="form-control p-4" placeholder="Email" required="required" data-validation-required-message="Email" <?php echo "value='" . $emailutilizador . "'"; ?> />
                            </div>
                            <p class="help-block text-danger"> </p>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Telemovel: </label>
                            </div>
                            <div class="col-11">
                                <input type="telemovel" name="telemovel" class="form-control p-4" placeholder="Telemovel" required="required" data-validation-required-message="Telemóvel" <?php echo "value='" . $telemovelutilizador . "'"; ?> />
                                <p class="help-block text-danger"> </p>
                            </div>
                        </div>
                    </div>


                    <?php if ($_SESSION['tipo'] == 'admin') { ?>
                        <div class="control-group pb-3">
                            <div class="row justify-content-center  ">
                                <div class="col-1 align-self-center">
                                    <label> Tipo: </label>
                                </div>
                                <div class="col-11 form-group">
                                    <select name="tipo" class="form-select">
                                        <option value="" disabled="disabled" selected> <?php echo $tipoutilizador ?> </option>
                                        <option value="cliente"> Cliente </option>
                                        <option value="funcionario"> Funcionario </option>
                                        <option value="admin"> Administrador </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div>
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