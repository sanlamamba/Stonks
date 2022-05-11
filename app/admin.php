<?php
include "../components/head.php";
$admin = new Admin();

if (isset($_POST['action'])) {
    if (isset($_POST['action']) == 'delete') {
        $clients->delUtilisateur($_POST['id']);
        $_POST = array();
        header("Location: clients.php");
    }
}

?>

<!-- SIDEBAR -->
<?php
include_once "../components/sidebar.php"
?>
<!-- End of Sidebar -->

<!-- CONTENT -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php
        include_once "../components/topbar.php";
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Gestion Clients</h1>
            <p class="mb-4">
                Vous pouvez creer un nouveau admin en
                <a href="nouveauAdmin.php">
                    cliquant ici
                </a>.
            </p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Liste des Admin
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
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($admin->getAdmins()) {
                                    foreach ($admin->getAdmins() as $admin) {
                                        // var_dump($client);
                                ?>
                                <tr>
                                    <td><?= $admin['nom'] ?></td>
                                    <td><?= $admin['prenom'] ?></td>
                                    <td><?= $admin['email'] ?></td>
                                    <td>
                                        <form method="post" action="./modifierAdmin.php?edit"
                                            class='btn btn-warning p-0'>
                                            <input hidden type="text" value=<?= $admin['id'] ?> name="id" id="id" />
                                            <button type="submit" name="action" value="edit" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                        <form method="post" class='btn btn-danger p-0'>
                                            <input hidden type="text" value=<?= $admin['id'] ?> name="id" id="id" />
                                            <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p class='mt-5 mx-auto'>Il n'ya pas d'admin</p>";
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
    include_once "../components/footer.php";
    ?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>