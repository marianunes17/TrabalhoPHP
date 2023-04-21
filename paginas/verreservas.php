<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$reservas = mysqli_query($conn, "SELECT * FROM reservas");
$reservasInfo = mysqli_fetch_array($reservas);

?>
<title> PetShop | Reservas </title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light pt-5">
        <div class="container">

            <!--Navbar-->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="reservas-tab" data-bs-toggle="tab" href="#revervas"
                        type="button" role="tab" aria-controls="revervas" aria-selected="true"> Minhas reservas
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active opacity-100 py-4" id="revervas" role="tabpanel"
                    aria-labelledby="reservas-tab">

                </div>
            </div>

            <!-- -------------------------- RESERVAS -------------------------- -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active opacity-100 py-4" id="reservas" role="tabpanel"
                    aria-labelledby="reservas-tab">
                    <a type="button" class="btn btn-primary float-right" href="adicionarutilizador.php">Adicionar</a>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Animal</th>
                                <th scope="col">Inicio</th>
                                <th scope="col">Fim</th>
                                <th scope="col">Serviço</th>

                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($reservasInfo = mysqli_fetch_array($reservas)) {
                                if ($_SESSION['id'] == $reservasInfo['dono']) {
                                    ?>

                                    <tr>
                                        <td scope="row">
                                            <?php echo $reservasInfo['id'] ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo $reservasInfo['animal'] ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo $reservasInfo['dataInicio'] ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo $reservasInfo['dataFim'] ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo $reservasInfo['servico'] ?>
                                        </td>
                                        <td scope="row"> <a type="button" class="btn btn-primary"
                                                href="editarutilizador.php?id=<?php echo $reservasInfo['id']; ?>">Editar</a>
                                        </td>
                                        <td scope="row"> <a type="button" class="btn btn-primary"
                                                href="eliminarutilizador.php?id=<?php echo $reservasInfo['id']; ?>">Eliminar</a>
                                        </td>

                                    </tr>

                                <?php }
                            } ?>
                        </tbody>
                    </table>

                </div>
            </div>


            <!-- -------------------------- RESERVAS -------------------------- -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active opacity-100 py-4" id="reservas" role="tabpanel"
                    aria-labelledby="reservas-tab">

                </div>
            </div>

        </div>
    </div>

    <?php require "footer.php"; ?>

</body>

</html>