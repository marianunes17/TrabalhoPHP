<!DOCTYPE html>
<html>

<?php
require 'head.php';

require_once('basedados.php');
require_once('../basedados/basedados.h');


$sqlServico = "SELECT * FROM servicos";
$sqlServico1 = mysqli_query($conn, $sqlServico);

$sqlFuncionarios = "SELECT * FROM utilizadores WHERE tipo='funcionario'";
$sqlFuncionarios1 = mysqli_query($conn, $sqlFuncionarios);

if (!$sqlServico1 || !$sqlFuncionarios1) {
    die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
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
                while ($row = mysqli_fetch_array($sqlServico1)) {
                    echo '  <div class="col-md-12 col-lg-6 mb-4">
                            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                                <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
                                <h3 class="mb-3 text-capitalize"> ' . $row['nome'] . ' </h3>
                                <p class="text-capitalize">' . $row['descricao'] . '</p>   
                            </div>
                        </div>';
                }
                ?>


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
            while ($row = mysqli_fetch_array($sqlFuncionarios1)) {
                echo '
            <div class="col-lg-4 col-md-6">
                <div class="team card position-relative overflow-hidden border-0 mb-4">
                    <img class="card-img-top" src="img/team-1.jpg" alt="">
                    <div class="card-body text-center p-0">
                        <div class="team-text d-flex flex-column justify-content-center bg-light">
                            <h5 class="text-capitalize"> ' . $row['nome'] . ' </h5>
                            <i>Founder & CEO</i>
                        </div>
                        <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
            }
            ?>

        </div>
    </div>
    <!-- Team End -->



    <!-- Testimonial Start -->
    <div class="container-fluid p-0 py-5">
        <div class="container p-0 pt-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Testimonial</h4>
                <h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <?php require 'footer.php'; ?>
</body>

</html>