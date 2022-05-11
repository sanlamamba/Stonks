<?php
include_once("../components/head.php");

$admin = new Admin();

include("securimage/securimage.php");
//on définit un nouvel objet de type securimage
$securimage = new Securimage();
// if (isset($_POST['submit'])) {
//     $admin->addAdmin("Lamamba", "San", "lamamba@gmail.com", "password123");
//     $auth = $admin->authenticateUser($_POST['email'], $_POST['password']);
//     var_dump($auth);
// }

if (isset($_POST['submit'])) {

    if ($securimage->check($_POST['captcha']) == false) {
        // alert with javascript error message
        echo '<script>alert("Captcha Failed");</script>';
    } else {
        // authentication goes here
        $auth = $admin->authenticateUser($_POST['email'], $_POST['password']);
        if ($auth != false) {

            // set token to session
            $_SESSION['token'] = $auth;
            // redirect to dashboard
            header("Location: clients.php");
        } else {
            echo '<script>alert("Mot de passe ou email incorrecte.");</script>';
        }
    }
}




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
                                    <form method="POST" class="user">
                                        <div class="form-group">
                                            <input required type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Votre Adresse Mail" name='email'>
                                        </div>
                                        <div class='form-group'>
                                            <div class="row d-flex justify-content-center align-items-center">

                                                <div class='col-10'>
                                                    <input required type="password"
                                                        class="form-control form-control-user" id="exampleInputPassword"
                                                        placeholder="Mot de passe" name='password'>
                                                </div>
                                                <div class="col-2">
                                                    <button id="viewPassword" type="button" class='btn btn-light'>
                                                        &#128065;
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se Rappeller de
                                                    moi ?</label>
                                            </div>
                                        </div>
                                        <!-- Captcha  -->
                                        <div class="form-group">
                                            <img src="securimage/securimage_show.php" alt="CAPTCHA Image"
                                                class="img-fluid" />
                                            <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-link">
                                                <img src="securimage/images/refresh.png" alt="Reload Image" /> </a>
                                        </div>
                                        <!-- Input for captcha -->
                                        <div class="form-group">
                                            <input type="text" name="captcha" class="form-control"
                                                placeholder="Entrez le code" required />
                                        </div>

                                        <input name="submit" type="submit" class="btn btn-primary btn-user btn-block"
                                            value='Connexion' />
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

    <?php
    include_once('../components/end.php');
    ?>