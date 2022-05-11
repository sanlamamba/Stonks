<?php include "../components/head.php"; ?>
<?php
$admin = new Admin();

if (isset($_POST['token-client'])) {
    var_dump($_POST);
    if ($_POST['token-client'] == "") {
        // head to login page
        header("Location: login.php");
    }
    $admin->addAdmin($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password']);
    // $client->addUtilisateurClient($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['telephone']);
    header("Location: admin.php");
    exit();
}
?>
<!-- SIDEBAR -->
<?php include_once "../components/sidebar.php"; ?>
<!-- End of Sidebar -->

<!-- Content -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include_once "../components/topbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">
            <div class='row'>
                <div class='col-6'>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ajouter Un Admin </h1>
                    <p class="mb-4">
                        Veuillez remplir les champs pour ajouter un nouveau Admin ou consulter la liste des admin en
                        <a href="admin.php">
                            cliquant ici
                        </a>.
                    </p>
                    <div class='card shadow mb-4'>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary">
                                Formulaire d'ajout des Admin
                            </h6>
                        </div>

                        <div class='card-body'>

                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input hidden type="text" value="<?= $_SESSION['token'] ?>" class="form-control" id="token-client" name="token-client" placeholder="token-client">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Le nom de l'admin" name='nom' required />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Le prenom de l'admin" name='prenom' required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Adresse Mail" name='email' required />


                                </div>
                                <div class='form-group'>
                                    <div class="row d-flex justify-content-center align-items-center">

                                        <div class='col-10'>
                                            <input required type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe" name='password'>
                                        </div>
                                        <div class="col-2">
                                            <button id="viewPassword" type="button" class='btn btn-light'> &#128065;
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value='Creer un nouveau client' />
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <?php include_once "../components/footer.php"; ?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<?php include_once "../components/modals/backToTop.php"; ?>
<!-- Logout Modal-->
<?php include_once "../components/modals/logout.php"; ?>

<!-- JAVASCRIPT -->
<?php include_once "../components/end.php"; ?>

</body>

</html>