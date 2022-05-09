<?php include "../components/head.php";
$client = new Utilisateur();
?>


<?php
if (isset($_POST['token-client'])) {
    $client->updateUtilisateurClient($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['telephone'], $_POST['id']);
    header("Location: clients.php");
}
?>
<?php
if (isset($_GET['edit'])) {
    $utilisateur = $client->getUtilisateurByID($_POST['id']);
    var_dump($utilisateur);
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
                    <h1 class="h3 mb-2 text-gray-800">Modifier Un Client </h1>
                    <p class="mb-4">
                        Veuillez remplir les champs pour modifier un nouveau client ou consulter la liste des clients en
                        <a href="clients.php">
                            cliquant ici
                        </a>.
                    </p>
                    <div class='card shadow mb-4'>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary">
                                Formulaire de modification des clients
                            </h6>
                        </div>

                        <div class='card-body'>

                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input hidden type="text" class="form-control" id="token-client" name="token-client"
                                        placeholder="token-client">
                                </div>
                                <div class="form-group">
                                    <input hidden type="text" value=<?= $utilisateur['id'] ?> class="form-control"
                                        id="id" name="id" placeholder="token-client">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small class="text-muted ml-2">Nom du client</small>
                                        <input value=<?= $utilisateur['nom'] ?> type="text"
                                            class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Le nom du client" name='nom' required />
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted ml-2">Prenom du client</small>
                                        <input type="text" value=<?= $utilisateur['prenom'] ?>
                                            class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Le prenom du client" name='prenom' required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <small class="text-muted ml-2">Email du client</small>
                                    <input value=<?= $utilisateur['email'] ?> type="email"
                                        class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Adresse Mail" name='email' required />


                                </div>
                                <div class="form-group">
                                    <small class="text-muted ml-2">Adresse du client</small>
                                    <input type="text" value=<?= $utilisateur['adresse'] ?>
                                        class="form-control form-control-user" id="adresse"
                                        placeholder="Adresse du client" name='adresse' required />
                                </div>

                                <div class="form-group">
                                    <small class="text-muted ml-2">Telephone du client</small>
                                    <input type="tel" pattern="[7]{1}[0-9]{8}" value=<?= $utilisateur['telephone'] ?>
                                        class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Numero de Telephone" name='telephone' required />
                                </div>

                                <hr>

                                <input type="submit" class="btn btn-primary btn-user btn-block"
                                    value='Modifier client' />

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