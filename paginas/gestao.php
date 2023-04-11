<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$utilizadores = mysqli_query($conn, "SELECT * FROM utilizadores");
$utilizadoresInfo = mysqli_fetch_array($utilizadores);

?>
<title> PetShop | Gerir </title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light pt-5">
        <div class="container">

            <!--Navbar-->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="utilizadores-tab" data-bs-toggle="tab" href="#utilizadores"
                        type="button" role="tab" aria-controls="utilizadores" aria-selected="true"> Gerir Utilizadores
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reservas-tab" data-bs-toggle="tab" data-bs-target="#reservas"
                        type="button" role="tab" aria-controls="reservas-tab" aria-selected="false">Gerir
                        Reservas</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active opacity-100 py-4" id="utilizadores" role="tabpanel"
                    aria-labelledby="utilizadores-tab">

                </div>
            </div>

            <!-- -------------------------- UTILIZADORES -------------------------- -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active opacity-100 py-4" id="utilizadores" role="tabpanel"
                    aria-labelledby="utilizadores-tab">
                    <a type="button" class="btn btn-primary float-right" href="adicionarutilizador.php">Adicionar</a>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telemovel</th>
                                <th scope="col">Tipo</th>

                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($utilizadoresInfo = mysqli_fetch_array($utilizadores)) {
                                ?>

                                <tr>
                                    <td scope="row">
                                        <?php echo $utilizadoresInfo['id'] ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $utilizadoresInfo['nome'] ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $utilizadoresInfo['email'] ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $utilizadoresInfo['telemovel'] ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo $utilizadoresInfo['tipo'] ?>
                                    </td>
                                    <td scope="row"> <a type="button" class="btn btn-primary"
                                            href="editarutilizador.php?id=<?php echo $utilizadoresInfo['id']; ?>">Editar</a>
                                    </td>
                                    <td scope="row"> <a type="button" class="btn btn-primary"
                                            href="eliminarutilizador.php?id=<?php echo $utilizadoresInfo['id']; ?>">Eliminar</a>
                                    </td>

                                </tr>

                            <?php } ?>
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