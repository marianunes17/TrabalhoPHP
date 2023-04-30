<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');


$servicos = mysqli_query($conn, "SELECT * FROM servicos");

$funcionarios = mysqli_query($conn, "SELECT * FROM utilizadores WHERE tipo='funcionario'");

if (! $servicos) {
    echo ("Erro: " . $servicos($con));
} else if(! $funcionarios){
    echo ("Erro: " . $funcionarios($con));
}

?>

<title> PetShop | Serviços </title>

<body>
    <?php require 'header.php'; ?>

    <!-- Services Start -->
    <div class="container-fluid bg-light pt-5">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h1 class="display-4 m-0"><span class="text-primary">Serviços</span> </h1>
            </div>
            <div class="row pb-3">
                <?php
                while ($servicoInfo = mysqli_fetch_array($servicos)) {
                ?>
                    <div class="col-md-12 col-lg-6 mb-4">
                        <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                            <img class="img-fluid w-50 align-self-center" src="<?php echo $servicoInfo['imagem'] ?>">
                            <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
                            <h3 class="mb-3 text-capitalize"> <?php echo $servicoInfo['nomeServico'] ?> </h3>
                            <p> <?php echo $servicoInfo['descricao'] ?> </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Team Start -->
    <div class="container mt-5 pt-5 pb-3">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-secondary mb-3">Equipa</h4>
            <h1 class="display-4 m-0">Conheça a nossa <span class="text-primary">Equipa</span></h1>
        </div>
        <div class="row">
            <?php
            while ($funcionariosInfo = mysqli_fetch_array($funcionarios)) {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="team card position-relative overflow-hidden border-0 mb-4">
                        <img class="card-img-top" src="<?php echo $funcionariosInfo['imagem'] ?>" alt="">
                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-light">
                                <h5 class="text-capitalize"> <?php echo $funcionariosInfo['nomeUtilizador'] ?> </h5>
                            </div>
                            <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <!-- Team End -->

    <?php require 'footer.php'; ?>
</body>

</html>