<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$sqlServico = "SELECT * FROM servicos";
$sqlServico1 = mysqli_query($conn, $sqlServico);

$sqlFuncionarios = "SELECT * FROM utilizadores WHERE tipo='funcionario'";
$sqlFuncionarios1 = mysqli_query($conn, $sqlFuncionarios);

if (!$sqlServico1 || !$sqlFuncionarios1) {
    die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
}

?>
<title> PetShop </title>

<body>
    <?php require 'header.php'; ?>

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block">Melhor Serviço para Animais</h3>
                            <h1 class="display-3 text-white mb-3">Mantenha o seu Animal Feliz</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block">Melhor Serviço para Animais</h3>
                            <h1 class="display-3 text-white mb-3">Spa de Animais</h1>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
    <div class="container-fluid bg-light pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 py-5 py-lg-0 px-3 px-lg-5">
                    <h1 class="display-4 mb-4">Reserve já <span class="text-primary">para o seu animal</span></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- About Start -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h1 class="display-4 mb-4"><span class="text-primary">Lavagem</span> & <span class="text-secondary">Tosquia</span></h1>
                <h5 class="text-muted mb-3">Tratamos da lavagem e tosquia do seu animal de estimação.</h5>
                <p class="mb-4"> Preservamos os animais de estimação e o seu bem estar, focamo-nos no amor e dedicação para com eles. </p>
                <p class="mb-4"> Temos em conta o tipo de animal, pelo, raça.</p>

                <ul class="list-inline">
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Melhor Serviço</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Emergências</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Suporte 24 horas por dia</h5>
                    </li>
                </ul>
                <a href="sobre.php" class="btn btn-lg btn-primary mt-3 px-4">Saber mais</a>
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="about-1.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="about-2.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="about-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



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
                                <img class="img-fluid w-50 align-self-center" src="' . $row['imagem'] . ' ">
                                <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
                                <h3 class="mb-3 text-capitalize"> ' . $row['nome'] . ' </h3>
                                <p>' . $row['descricao'] . '</p>   
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Services End -->





    <!-- Testimonial Start -->
    <div class="container-fluid my-5 p-0 py-5">
        <div class="container p-0 py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Testemunhos</h4>
                <h1 class="display-4 m-0">O que os nossos clientes <span class="text-primary">dizem</span></h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Afonso</h5>
                            <i>Professor</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Ana</h5>
                            <i>Médica</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Luís</h5>
                            <i>Mecanico</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="testimonial-4.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Raquel</h5>
                            <i>Relojoeira</i>
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