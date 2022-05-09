<?php
include "../components/head.php";
$clients = new Utilisateur();

if (isset($_POST['action'])) {
    if (isset($_POST['action']) == 'delete') {
        $clients->delUtilisateur($_POST['id']);
        $_POST = array();
        header("Location: fournisseurs.php");
    }
}

?>

<!-- SIDEBAR -->
<?php
include_once("../components/sidebar.php")
?>

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php
        include_once("../components/topbar.php");
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Gestion fournisseurs</h1>
            <p class="mb-4">
                Vous pouvez creer un nouveau fournisseur en
                <a href="nouveauFournisseurs.php">
                    cliquant ici
                </a>.
                <br />
                Vous pouvez imprimer une liste des fournisseurs en
                <a href="imprimerfournisseur.php">
                    cliquant ici
                </a>.
            </p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Liste des fournisseurs
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-light table-bordered table-striped" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Nom</th>
                                    <th class="bg-primary text-white">Prenom</th>
                                    <th class="bg-primary text-white">Telephone</th>
                                    <th class="bg-primary text-white">Email</th>
                                    <th class="bg-primary text-white">Adresse</th>
                                    <th class="bg-primary text-white">Type</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($clients->getUtilisateurByType('fournisseur')) {
                                    foreach ($clients->getUtilisateurByType('fournisseur') as $client) {
                                        // var_dump($client);
                                ?>
                                <tr>
                                    <td><?= $client['nom'] ?></td>
                                    <td><?= $client['prenom'] ?></td>
                                    <td><?= $client['telephone'] ?></td>
                                    <td><?= $client['email'] ?></td>
                                    <td><?= $client['adresse'] ?></td>
                                    <td><?= $client['type'] ?></td>
                                    <td>
                                        <form method="post" action="./modifierFournisseur.php?edit"
                                            class='btn btn-warning p-0'>
                                            <input hidden type="text" value=<?= $client['id'] ?> name="id" id="id" />
                                            <button type="submit" name="action" value="edit" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                        <form method="post" class='btn btn-danger p-0'>
                                            <input hidden type="text" value=<?= $client['id'] ?> name="id" id="id" />
                                            <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p class='mt-5 mx-auto'>Il n'ya pas de fournisseur</p>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php
    include_once("../components/footer.php");
    ?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<?php
include_once("../components/modals/backToTop.php");
?>
<!-- Logout Modal-->
<?php
include_once("../components/modals/logout.php");
?>

<!-- JAVASCRIPT -->
<?php
include_once("../components/end.php");
?>

</body>

</html>