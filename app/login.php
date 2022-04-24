<!DOCTYPE html>
<html lang="en">
<?php
    include_once("../components/head.php");

?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="./img/logo-couleur.png" width="50%" alt="" srcset="">
                                        <hr>
                                        <h1 class="h4 text-gray-900 mb-4">Connexion</h1>
                                        <hr>

                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Votre Adresse Mail" name='email'>
                                        </div>
                                        <div class="form-group">
                                            <div class='row'>
                                                <div class='col-10'>
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" placeholder="Mot de passe"
                                                        name='password'>
                                                </div>
                                                <button class='btn btn-light col-2'> &#128065; </button>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se Rappeller de
                                                    moi ?</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block"
                                            value='Connexion'>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/stonks/password.php">Mot de passe oublié?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>