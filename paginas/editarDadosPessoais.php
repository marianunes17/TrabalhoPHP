<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$utilizadores = mysqli_query($conn, "SELECT * FROM utilizadores");


if (isset($_POST['atualizar'])) {
    $nomeUtilizador = $_POST['nomeUtilizador'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telemovel = $_POST['telemovel'];
    $idutilizador = $_POST['id'];

    $alteraUtilizador = mysqli_query($conn, "UPDATE utilizadores SET nomeUtilizador = '$nomeUtilizador', password = '$password',
    email='$email', telemovel='$telemovel' WHERE id=$idutilizador");

    if (!$utilizadores) {
        echo ("Erro: " . $utilizadores($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=dadospessoais.php">';
    }
}

if (isset($_GET['id'])) {
    $idutilizador = $_GET['id'];

    $utilizador = mysqli_query($conn, "SELECT * FROM utilizadores WHERE id='$idutilizador'");

    if ($utilizador->num_rows > 0) {
        while ($row = $utilizador->fetch_assoc()) {
            $idutilizador = $row['id'];
            $nomeUtilizador = $row['nomeUtilizador'];
            $email = $row['email'];
            $password = $row['password'];
            $telemovel = $row['telemovel'];
        }
    }

    if (!$utilizador) {
        echo ("Erro: " . $utilizador($con));
    }
}


if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Editar dados pessoais </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light pt-5">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 m-0"><span class="text-primary">Editar Dados Pessoais</span> </h1>
            </div>

            <div class="contact-form">
                <form method="POST">
                    <input type="text" name="id" class="form-control p-4 text-capitalize invisible" placeholder="id" <?php echo "value='" . $idutilizador . "'"; ?> />

                    <div class="control-group pb-3">
                        <div class="row justify-content-center">
                            <div class="col-1 align-self-center">
                                <label> Nome: </label>
                            </div>
                            <div class="col-11">
                                <input type="text" name="nomeUtilizador" class="form-control border-0 p-4 text-capitalize" placeholder="Nome" <?php echo "value='" . $nomeUtilizador . "'"; ?> required />
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Email: </label>
                            </div>
                            <div class="col-11">
                                <input type="email" name="email" class="form-control p-4" placeholder="Email" <?php echo "value='" . $email . "'"; ?> required />
                            </div>
                        </div>
                    </div>


                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Password: </label>
                            </div>
                            <div class="col-11">
                                <input type="password" name="password" class="form-control p-4" placeholder="Password" <?php echo "value='" . $password . "'"; ?> required />
                            </div>
                        </div>
                    </div>

                    <div class="control-group pb-3">
                        <div class="row justify-content-center  ">
                            <div class="col-1 align-self-center">
                                <label> Telemovel: </label>
                            </div>
                            <div class="col-11">
                                <input type="tel" name="telemovel" class="form-control p-4" placeholder="Telemovel" <?php echo "value='" . $telemovel . "'"; ?> required />
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button class="btn btn-primary py-3 px-5" type="submit" name='atualizar'>Guardar</button>
                        <a class="btn btn-primary py-3 px-5" href="dadospessoais.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>

</html>