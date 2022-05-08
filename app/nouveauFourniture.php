<!DOCTYPE html>
<html lang="en">

<?php
include "../components/head.php";
$stocks = new Stock();
$fourniture = new Fourniture();
// var_dump($stocks->getStocks());

//if fourniture isset
if (isset($_POST['fourniture'])) {
    $stock = $stocks->getStockByID($_POST['produit']);
    // check if fourniture is already in the database
    $fourniture_today = $fourniture->checkFournitureToday($stock['id']);
    // var_dump($fourniture_today);
    // if fourniture is already in the database
    if ($fourniture_today) {
        // update the quantity
        // add the quantity to the existing quantity
        $qt_fournie = $fourniture_today[0]['quantite_fournie'] + $_POST['quantiteF'];
        $fourniture->updateFourniture($qt_fournie, $_POST['produit'], $fourniture_today[0]['id']);
    } else {
        $fourniture->addFourniture($stock['quantite'], $_POST['quantiteF'], $_POST['produit']);
    }

    // update the stock quantity
    $stocks->updateStockQuantite($stock['quantite'] + $_POST['quantiteF'], $_POST['produit']);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

if (isset($_POST['delete'])) {
    $fourniture_to_delete = $fourniture->getFournitureByID($_POST['id']);
    var_dump($fourniture_to_delete);
    $stock = $stocks->getStockByID($fourniture_to_delete[0]['produit_id']);
    var_dump($stock);

    // update the stock quantity
    $stocks->updateStockQuantite($stock['quantite'] - $fourniture_to_delete[0]['quantite_fournie'], $fourniture_to_delete[0]['produit_id']);


    $fourniture->deleteFourniture($_POST['id']);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}
$fournitures = $fourniture->getFournituresToday();


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
        <div class="container-fluid">
            <div class='row'>
                <h1 class="col-12 h3 mb-2 text-gray-800">Ajouter Un fourniture</h1>
            </div>
            <div class='row'>

                <p class="mb-4 col-12">
                    Veuillez remplir les champs pour ajouter une nouvelle fourniture ou consulter la liste des
                    fournitures en
                    <a href="fournitures.php">
                        cliquant ici
                    </a>.
                </p>
            </div>

            <div class='row'>
                <div class='col-5'>

                    <!-- Page Heading -->

                    <div class='card shadow mb-4 sticky-top'>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary">
                                Choisir un produit
                            </h6>
                        </div>

                        <div class='card-body'>
                            <form class="form-group row">
                                <div class='col-8'>
                                    <input type="search" class="form-control" placeholder="Rechercher le nom du produit"
                                        name='produit' required />

                                </div>
                                <div class='col-4'>
                                    <button type="submit" class="btn btn-light">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                            </form>
                            <form method="POST" class="form-group row">
                                <div class='col-12 mb-3'>
                                    <select name='produit' class='form-control'>
                                        <option value=""> Choisir le produit</option>
                                        <?php
                                        // for each stock
                                        foreach ($stocks->getStocks() as $stock) { ?>
                                        <option value=<?= $stock['id'] ?>>
                                            <?= $stock['designation'] ?> |
                                            Qte Dispo = <?= $stock['quantite'] ?> |
                                            P.U. = <?= $stock['prix'] ?>
                                        </option>
                                        ";
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class='col-12 mb-3'>
                                    <input name='quantiteF' placeholder='Quantite' class='form-control' type='number'
                                        required min=1 />
                                </div>
                                <div class='col-12'>
                                    <a href=<?= $_SERVER['REQUEST_URI'] ?> type="submit" name='fourniture'
                                        class="w-auto btn btn-outline-secondary mr-2" value='Reinitialiser'>
                                        Reinitialiser
                                    </a>
                                    <button type="submit" class="w-auto btn btn-success" name='fourniture'>
                                        Ajouter
                                        <i class="fa fa-plus-circle ml-2" aria-hidden="true"></i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class='col-7 mb-3'>
                    <div class='row card shadow mb-3 '>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
                                <span>
                                    Panier de la fourniture en cours
                                </span>
                                <span class="badge badge-primary badge-counter">
                                    <i class="fas fa-shopping-cart"></i>
                                    <?php
                                    if (isset($fournitures)) {
                                        echo count($fournitures);
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </span>



                            </h6>
                        </div>
                        <div class='card-body'>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Date Fourniture</th>
                                        <th>Designation</th>
                                        <th>Qte avant Fourniture</th>
                                        <th>Qte Fournie</th>
                                        <th>Montant de la Qte Fournie</th>
                                        <th>Annuler</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sum = [0];
                                    // if fourniture getFournituresToday is not empty
                                    if (!empty($fourniture->getFournituresToday())) {
                                        foreach ($fourniture->getFournituresToday() as $fourniture) {
                                    ?>
                                    <tr>
                                        <td><?= $fourniture['date'] ?> </td>
                                        <td>
                                            <?=
                                                    $stocks->getStockByID($fourniture['produit_id'])['designation']
                                                    ?>
                                        </td>
                                        <td><?= $fourniture['quantite_avant'] ?> </td>
                                        <td><?= $fourniture['quantite_fournie'] ?></td>
                                        <td><?=
                                                    number_format($fourniture['quantite_fournie'] * $stocks->getStockByID($fourniture['produit_id'])['prix'], 0);
                                                    $montant = $fourniture['quantite_fournie'] * $stocks->getStockByID($fourniture['produit_id'])['prix'];
                                                    array_push($sum, $montant);
                                                    ?>
                                            <small>
                                                FCFA
                                            </small>
                                        </td>
                                        <td>
                                            <form method="POST" href="#">
                                                <input type="hidden" name="id" value=<?= $fourniture['id'] ?> />
                                                <input type="hidden" name="quantite"
                                                    value=<?= $fourniture['quantite_fournie'] ?> />


                                                <!-- Submit button  -->
                                                <button type="submit" name='delete' class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>

                                                <!-- &#8634; -->
                                            </form>
                                        </td>
                                    </tr>

                                    <?php }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>

                                        <td class='bg-light' colspan="4 "> Total de la fourniture </td>
                                        <th colspan="2">
                                            <?= number_format(array_sum($sum), 0) ?>
                                            FCFA
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
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