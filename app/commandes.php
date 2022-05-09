<?php
include("../components/head.php");
$commandes = new Commande();
$paniers = new Panier();
$clients = new Utilisateur();
$stock = new Stock();
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
            <h1 class="h3 mb-2 text-gray-800">Gestion commandes</h1>
            <p class="mb-4">
                Vous pouvez creer une nouvelle commande en
                <a href="nouveauCommande.php">
                    cliquant ici
                </a>.
                <br />
                Vous pouvez imprimer une liste des commandes en
                <a href="imprimerCommande.php">
                    cliquant ici
                </a>.
            </p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Liste des commandes
                    </h6>
                </div>
                <div class="card-body">
                    <div>
                        <h6 class="m-0 font-weight-bold text-muted">
                            Filtre
                        </h6>
                    </div>
                    <div>
                        <form class='row'>
                            <div class='col-4'>
                                <div class="form-group">
                                    <select name="client" class="custom-select" id="inputGroupSelect01">
                                        <option value="" selected>Choisir un client</option>
                                        <?php
                                        $clients = $clients->getUtilisateurByType('client');
                                        foreach ($clients as $client) {
                                            echo "<option value='" . $client['id'] . "'>" . $client['nom'] . " " . $client['prenom'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class='col-4'>
                                <select name="order" class='form-control'>
                                    <option value="">Trier par :</option>
                                    <option value="desc">Date de commande le plus recent</option>
                                    <option value="asc">Date de commande le plus ancien</option>
                                </select>

                            </div>
                            <div class="col-3">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    Filtrer <i class="fa fa-search ml-2" aria-hidden="true"></i> </button>
                            </div>


                        </form>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-light table-bordered table-striped" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="head">
                                <tr>
                                    <th class="bg-primary text-white">Id</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Code Client</th>
                                    <th class="bg-primary text-white">Nom et Prenom</th>
                                    <th class="bg-primary text-white">Produit</th>
                                    <th class="bg-primary text-white">P.U</th>
                                    <th class="bg-primary text-white">Qte</th>
                                    <th class="bg-primary text-white">PTTC</th>
                                    <th class="bg-primary text-white">Date de livraison</th>
                                    <th class="bg-primary text-white">Livrée</th>
                                    <th class="bg-primary text-white">Reste</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php

                                if (!empty($commandes->getCommandes())) {
                                    $sum = [0];
                                    $commande = $commandes->getCommandes();
                                    if (isset($_GET['order']) || isset($_GET['client'])) {
                                        if (isset($_GET['client']) && $_GET['client'] != "") {
                                            $commande = $commandes->getCommandesByClient($_GET['client']);
                                        }
                                        if ($_GET['order'] == 'desc' && $commande != null) {
                                            // arry_sort the commandes by date_commande
                                            usort($commande, function ($a, $b) {
                                                return $a['date_commande'] <=> $b['date_commande'];
                                            });
                                        } else {
                                            // arry_sort the commandes by date_commande
                                            usort($commande, function ($a, $b) {
                                                return $b['date_commande'] <=> $a['date_commande'];
                                            });
                                        }
                                    }

                                    foreach ($commande as $commande) {
                                        $panier = $paniers->getPanierByPanierID($commande['panier_id']);
                                        foreach ($panier as $p) {
                                ?>

                                <tr>
                                    <td><?= $commande['id'] ?></td>
                                    <td><?= $commande['date_commande'] ?></td>
                                    <td><?= $commande['client_id'] ?></td>
                                    <td><?= $client['nom'] . " " . $client['prenom'] ?></td>
                                    <td>
                                        <?=
                                                    //  get stock designation by id from p produit_id
                                                    $stock->getStockByID($p['produit_id'])['designation'];
                                                    ?>
                                    </td>
                                    <td>
                                        <?=
                                                    number_format($stock->getStockByID($p['produit_id'])['prix']) . " F";
                                                    ?>
                                    </td>
                                    <td>
                                        <?= $p['quantite'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($p['quantite'] * $stock->getStockByID($p['produit_id'])['prix']) . " F";
                                                    array_push($sum, $p['quantite'] * $stock->getStockByID($p['produit_id'])['prix']);
                                                    ?>
                                    </td>
                                    <td>
                                        <?= $commande['date_livraison'] ?>
                                    </td>
                                    <td>
                                        <?= $p['livrer'] ?>
                                    </td>
                                    <td>
                                        <?= $p['quantite'] - $p['livrer'] ?>
                                    </td>
                                    <!-- <td><a href="nouveauCom" class='btn btn-warning'><i class="fas fa-fw fa-pen"></i> </a> </td> -->
                                </tr>
                                <?php }
                                    }
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="bg-primary text-white " colspan="7"> Total des commandes </th>
                                    <td colspan="4" class="bg-primary-500">
                                        <strong>
                                            <?= number_format(array_sum($sum)) . " F"; ?>
                                        </strong>
                                    </td>
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