<?php include "../components/head.php";
$fournisseur = new Utilisateur();
?>


<?php
if (isset($_POST['token-fournisseur'])) {
    $fournisseur->updateUtilisateurFournisseur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['telephone'], $_POST['id']);
    header("Location: fournisseurs.php");
}
?>
<?php
if (isset($_GET['edit'])) {
    $utilisateur = $fournisseur->getUtilisateurByID($_POST['id']);
    // var_dump($utilisateur);
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
                    <h1 class="h3 mb-2 text-gray-800">Modifier Un fournisseur </h1>
                    <p class="mb-4">
                        Veuillez remplir les champs pour modifier un nouveau fournisseur ou consulter la liste des
                        fournisseurs en
                        <a href="fournisseurs.php">
                            cliquant ici
                        </a>.
                    </p>
                    <div class='card shadow mb-4'>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary">
                                Formulaire de modification des fournisseurs
                            </h6>
                        </div>

                        <div class='card-body'>

                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input hidden type="text" class="form-control" id="token-fournisseur"
                                        name="token-fournisseur" placeholder="token-fournisseur">
                                </div>
                                <div class="form-group">
                                    <input hidden type="text" value=<?= $utilisateur['id'] ?> class="form-control"
                                        id="id" name="id" placeholder="token-fournisseur">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small class="text-muted ml-2">Nom du fournisseur</small>
                                        <input value=<?= $utilisateur['nom'] ?> type="text"
                                            class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Le nom du fournisseur" name='nom' required />
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted ml-2">Prenom du fournisseur</small>
                                        <input type="text" value=<?= $utilisateur['prenom'] ?>
                                            class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Le prenom du fournisseur" name='prenom' required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <small class="text-muted ml-2">Email du fournisseur</small>
                                    <input value=<?= $utilisateur['email'] ?> type="email"
                                        class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Adresse Mail" name='email' required />


                                </div>
                                <div class="form-group">
                                    <small class="text-muted ml-2">Adresse du fournisseur</small>
                                    <input type="text" value=<?= $utilisateur['adresse'] ?>
                                        class="form-control form-control-user" id="adresse"
                                        placeholder="Adresse du fournisseur" name='adresse' required />
                                </div>

                                <div class="form-group">
                                    <small class="text-muted ml-2">Telephone du fournisseur</small>
                                    <input type="tel" pattern="[7]{1}[0-9]{8}" value=<?= $utilisateur['telephone'] ?>
                                        class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Numero de Telephone" name='telephone' required />
                                </div>

                                <hr>

                                <input type="submit" class="btn btn-primary btn-user btn-block"
                                    value='Modifier fournisseur' />

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