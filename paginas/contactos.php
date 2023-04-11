<!DOCTYPE html>
<html>

<?php 
require 'head.php'; 


?>
<title> PetShop </title>

<body>
    <?php require 'header.php'; ?>


    <div class="row py-3 px-lg-5">
            <div class="col-lg-12 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-4 border-right">
                        <h6>Horario</h6>
                        <p class="m-0">8.00 - 21.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-4 border-right">
                        <h6>Email</h6>
                        <p class="m-0">petshop@email.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-4">
                        <h6>Telefone</h6>
                        <p class="m-0">961245666</p>
                        <p class="m-0">271245666</p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h1 class="display-4 m-0">Contacta-nos</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">
                        <div class="control-group">
                            <input type="text" class="form-control p-4 text-capitalize" placeholder="Nome" required="required" data-validation-required-message="Insira o nome" <?php
                                                                                                                                                                                if (isset($_SESSION['nome'])) {
                                                                                                                                                                                    echo "value='" . $_SESSION['nome'] . "'";
                                                                                                                                                                                }
                                                                                                                                                                                ?> />
                            <p class="help-block text-danger"> </p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control p-4" placeholder="Email" required="required" data-validation-required-message="Insira o email" <?php
                                                                                                                                                                    if (isset($_SESSION['nome'])) {
                                                                                                                                                                        echo "value='" . $_SESSION['email'] . "'";
                                                                                                                                                                    }
                                                                                                                                                                    ?> />
                            <p class="help-block text-danger"> </p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" placeholder="Assunto" required="required" data-validation-required-message="Insira o assunto" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" id="mensagem" placeholder="Mensagem" required="required" data-validation-required-message="Insira a mensagem"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Enviar Mensagem</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 mb-n2 p-0">
                <iframe style="width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <!-- Contact End -->



    <?php require 'footer.php'; ?>
</body>

</html>