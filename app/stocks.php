<?php
include "../components/head.php";
$stocks = new Stock();
$fournisseur = new Utilisateur();
$categories = new Categorie();
$list_fournisseur = $fournisseur->getUtilisateurByType('fournisseur');

?>

<!-- SIDEBAR -->
<?php
include_once("../components/sidebar.php")
?>
<!-- End of Sidebar -->

<!-- Content -->
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
            <h1 class="h3 mb-2 text-gray-800">Gestion stocks</h1>
            <p class="mb-4">
                Vous pouvez creer un nouveau produit en
                <a href="nouveaustocks.php">
                    cliquant ici
                </a>.

            </p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Liste des produits.
                    </h6>
                </div>
                <div class="card-body">
                    <div class='row'>
                        <div class='col-4'>
                            <p class='small m-0'>Filtrer par produit</p>
                            <form class="form-group row">
                                <div class='col-8'>
                                    <input type="search" class="form-control" placeholder="Rechercher le nom du produit"
                                        name='produit' required />

                                </div>
                                <div class='col-4'>
                                    <input type='submit' class='btn btn-light' value='rechercher' name='rechercheP' />
                                </div>

                            </form>
                        </div>
                        <div class='col-4'>
                            <p class='small m-0'>Filtrer par Fournisseurs</p>
                            <form class="form-group row">
                                <div class='col-8'>
                                    <input type="search" class="form-control" placeholder="Rechercher le nom du produit"
                                        name='produit' required />

                                </div>
                                <div class='col-4'>
                                    <input type='submit' class='btn btn-light' value='rechercher' name='rechercheP' />
                                </div>

                            </form>
                        </div>
                        <div class='col-4'>
                            <p class='small m-0'>&nbsp;</p>
                            <form class="form-group row">
                                <div class='col-8'>
                                    <select class='form-control'>
                                        <option>Filtrer par</option>
                                        <option>Filtrer par</option>
                                    </select>

                                </div>
                                <div class='col-4'>
                                    <input type='submit' class='btn btn-light' value='rechercher' name='rechercheP' />
                                </div>

                            </form>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-light table-bordered table-striped" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="bg-primary">Designation</th>
                                    <th class="bg-primary">En Stock</th>
                                    <th class="bg-primary">P.U.</th>
                                    <th class="bg-primary">Type</th>
                                    <th class="bg-primary">Categorie</th>
                                    <th class="bg-primary">Fournisseur</th>
                                    <th class="bg-primary">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($stocks->getStocks()) {
                                    foreach ($stocks->getStocks() as $stock) {
                                        // var_dump($client);
                                ?>
                                <tr>
                                    <td><?= $stock['designation'] ?></td>
                                    <td><?= $stock['quantite'] ?></td>
                                    <td><?= $stock['prix'] ?></td>
                                    <td><?= $stock['type'] ?></td>
                                    <td><?= $stock['categorie_id'] ?></td>
                                    <td>

                                        <?php $curr_id = $stock['fournisseurs_id'];
                                                $curr_fournisseur = array_filter(
                                                    $list_fournisseur,
                                                    function ($e) use (&$curr_id) {
                                                        return $e["id"] == $curr_id;
                                                    }
                                                );
                                                foreach ($curr_fournisseur as $fournisseur) {
                                                    echo $fournisseur['nom'] . " " . $fournisseur['prenom'];
                                                }
                                                ?>
                                    </td>
                                    <td>
                                        <form method="post" action="./modifierStock.php?edit"
                                            class='btn btn-warning p-0'>
                                            <input hidden type="text" value=<?= $stock['id'] ?> name="id" id="id" />
                                            <button type="submit" name="action" value="edit" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                        <form method="post" class='btn btn-danger p-0'>
                                            <input hidden type="text" value=<?= $stock['id'] ?> name="id" id="id" />
                                            <button type="submit" name="action" value="delete" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p class='mt-5 mx-auto'>Il n'ya pas de Stock</p>";
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