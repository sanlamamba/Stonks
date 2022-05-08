<?php
include("../components/head.php")
?>
<?php

$fournitures = new Fourniture();
$stocks = new Stock();
$fourniture = $fournitures->getFournitures();

if (isset($_GET['filtrer'])) {
    // if date and ordre are empty then head to the index page
    // if (empty($_GET['date']) && empty($_GET['ordre'])) {
    //     header("Location: fournitures.php");
    // }
    // if date is not empty and produit is empty then get the fournitures of that date
    if (!empty($_GET['date']) && empty($_GET['produit'])) {
        $date = date("d/m/Y", strtotime($_GET['date']));
        $fourniture = $fournitures->getFournituresByDate($date);
    }
    // if date is empty and produit is not empty then get the fournitures of that produit
    elseif (empty($_GET['date']) && !empty($_GET['produit'])) {
        $fourniture = $fournitures->getFournitureByProduitID($_GET['produit']);
    }
    // if date and produit are not empty then get the fournitures of that date and produit
    elseif (!empty($_GET['date']) && !empty($_GET['produit'])) {
        // reformat the date to be compatible with the database
        $date = date("d/m/Y", strtotime($_GET['date']));
        $fourniture = $fournitures->getFournituresByDateAndProduit($_GET['produit'], $date);
    }


    // if ordre is set then get the fournitures in that order

}
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
            <h1 class="h3 mb-2 text-gray-800">Gestion fournitures</h1>
            <p class="mb-4">
                Vous pouvez creer un nouveau fourniture en
                <a href="nouveaufourniture.php">
                    cliquant ici
                </a>.

            </p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Les Fournitures Effectués
                    </h6>
                </div>
                <div class="card-body">
                    <div class='row mb-3 d-flex'>
                        <form class='col-12'>
                            <div class='form-group row d-flex align-items-end justify-content-center'>
                                <!-- one input and one dropdown and one button -->
                                <div class='col-3'>
                                    <label for='fourniture'>
                                        <small>
                                            Filtrer par date
                                        </small>
                                    </label>
                                    <!-- if get date is not empty then input with value -->
                                    <?php if (!empty($_GET['date'])) { ?>
                                    <input type='date' class='form-control' id='fourniture'
                                        value='<?php echo $_GET['date'] ?>' name='date'>
                                    <?php } else { ?>
                                    <input type='date' class='form-control' id='fourniture' name='date'>
                                    <?php } ?>
                                </div>
                                <div class='col-3'>
                                    <label for='fourniture'>
                                        <small>
                                            Trier par produit
                                        </small>
                                    </label>
                                    <select name="produit" class='form-control w-100' id='searchBy'>
                                        <option value=''>Trier par produit</option>
                                        <?php
                                        $produits = $stocks->getStocks();
                                        foreach ($produits as $produit) {
                                            if (isset($_GET['produit'])) {
                                                if ($_GET['produit'] == $produit['id']) {
                                                    echo "<option selected value='" . $produit['id'] . "'>" . $produit['designation'] . "</option>";
                                                } else {
                                                    echo "<option value='" . $produit['id'] . "'>" . $produit['designation'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value='" . $produit['id'] . "'>" . $produit['designation'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class='col-3'>
                                    <button type="submit" value='true' name="filtrer" class='btn btn-primary w-100'
                                        id='searchButton'>Appliquer les filtres</button>
                                </div>
                                <div class="col-3">
                                    <a href="fournitures.php" class='btn btn-outline-warning w-100'> Effacer les
                                        filtres</a>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class='bg-primary text-white'>Date de la fourniture</th>
                                    <th class='bg-primary text-white'>Designation</th>
                                    <th class='bg-primary text-white'>Qte avant Fourniture</th>
                                    <th class='bg-primary text-white'>Qte Fournie</th>
                                    <th class='bg-primary text-white'>P.U</th>
                                    <th class='bg-primary text-white'>Montant de la Qte Fournie</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $sum = [0];
                                if (!empty($fourniture)) {

                                    foreach ($fourniture as $fourniture) {
                                ?>
                                <tr>
                                    <td><?= $fourniture['date'] ?> </td>
                                    <td><?=
                                                $stocks->getStockById($fourniture['produit_id'])['designation']
                                                ?>
                                    </td>
                                    <td>
                                        <?= $fourniture['quantite_avant'] ?>
                                    </td>
                                    <td>
                                        <?= $fourniture['quantite_fournie'] ?>
                                    </td>
                                    <td>
                                        <!-- prix from stock table by using fourniture produit id -->
                                        <?= number_format($stocks->getStockById($fourniture['produit_id'])['prix']) . " FCFA" ?>
                                    </td>
                                    <td>
                                        <?=
                                                number_format($fourniture['quantite_fournie'] * $stocks->getStockById($fourniture['produit_id'])['prix']) . " FCFA";
                                                array_push($sum, $fourniture['quantite_fournie'] * $stocks->getStockById($fourniture['produit_id'])['prix']);
                                                ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>Aucune fourniture effectuée</td></tr>";
                                }
                                ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td class='bg-light' colspan='5'>Montant total des fournitures </td>
                                    <th colspan='1'>
                                        <?= number_format(array_sum($sum)) . " FCFA" ?>
                                    </th>
                                </tr>
                            </tfoot>
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
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
</body>

</html>