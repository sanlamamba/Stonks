<?php
include("../components/head.php");

$clients = new Utilisateur();
$stock = new Stock();
$commandes = new Commande();
$paniers = new Panier();


$client_filter = null;
$date_filter = null;
$date_array = [];
$commande_filter = null;
$commande = $commandes->getCommandes();


if (isset($_POST['editPanier'])) {
    $panier_id = $_POST['id'];
    $panier = $paniers->getPanierByID($panier_id);
    $paniers->updatePanierLivrer($_POST['quantite'] + $panier['livrer'], $_POST['id']);
    // substract from quantity in stock
    $stock->updateStockQuantite($panier['quantite'] - $_POST['quantite'], $panier['produit_id']);

    // head to self and exit
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}


$client = $clients->getUtilisateurByType("client");
if (isset($_GET['recherche'])) {
    $client_filter = $clients->searchUser($_GET['recherche']);
}
if (isset($_GET['client'])) {
    $client_filter = $clients->getUtilisateurByID($_GET['client']);
    $commande = $commandes->getCommandesByClient($client_filter['id']);

    // send commande dates to a variable and return it
    foreach ($commande as $key => $value) {
        array_push($date_array, $value['date_commande']);
    };
    $date_array = array_unique($date_array);
}
if (isset($_GET['date'])) {
    $date_filter = $_GET['date'];
}
if (isset($_GET['commande'])) {
    $commande_filter = $_GET['commande'];
    $commande = $commandes->getCommandeByID($commande_filter);
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
            <h1 class="h3 mb-2 text-gray-800">
                Gestion des livraisons
                <?= $client_filter !== null ? "de " . $client_filter['nom'] . " " . $client_filter['prenom'] : "? " ?>
            </h1>
            <?php
            if ($client_filter !== null) {
                // get adresse from utilisateur table using client_flter['id']
                $adresse = $clients->getUtilisateurByID($client_filter['id'])['adresse'];
            ?>
            <p class="mb-1 text-muted">
                Addresse du client : <strong> <?= $adresse ?></strong>
            </p>
            <?php } ?>

            <p class="mb-4">
                Vous pouvez creer un nouveau livraison en
                <a href="nouveaulivraison.php">
                    cliquant ici
                </a>.
                <br />
                Vous pouvez imprimer une liste des livraisons en
                <a href="imprimerlivraison.php">
                    cliquant ici
                </a>.
            </p>
            <!-- DataTales Example -->
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Commande #1 ? Veuillez renseigner les informations
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form class="col-5 mb-4">
                            <!-- SEARCH BY CLIENT INPUT -->
                            <label for="searchByClient">
                                Rechercher par client
                            </label>
                            <div class="row d-flex">
                                <div class="col-10">
                                    <input required name="recherche" type="text" class="form-control"
                                        id="searchByClient" placeholder="Entrer le nom, prenom ou id du client">
                                </div>
                                <!-- SUBMIT input only icon -->
                                <form class="col-2">
                                    <button type="submit" class="btn btn-primary " type="submit">
                                        <span class="icon text-white-60 ">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </button>
                                </form>

                            </div>

                        </form>
                    </div>
                    <form class="row d-flex align-items-end">

                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    <small>
                                        Filtrer par client
                                    </small>
                                </label>
                                <?php if ($client_filter !== null) { ?>
                                <input readonly hidden name="client" class="form-control"
                                    value="<?= $client_filter['id'] ?>" />
                                <span class="form-control">
                                    <?= $client_filter['nom'] . " " . $client_filter['prenom'] ?>
                                </span>
                                <?php } else { ?>
                                <select required name="client" class="form-control" id="exampleFormControlSelect1">
                                    <?php if (!isset($_GET['recherche'])) { ?>
                                    <option value="">Tous</option>
                                    <?php } ?>
                                    <?php
                                        foreach ($client as $cl) {
                                            echo "<option value='" . $cl['id'] . "'>" . $cl['nom'] . " " . $cl['prenom'] . "</option>";
                                        }
                                        ?>
                                </select>
                                <?php } ?>
                            </div>

                        </div>
                        <?php
                        if ($client_filter !== null) { ?>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    <small>
                                        Filtrer par date
                                    </small>
                                </label>
                                <?php if ($date_filter !== null) { ?>
                                <input readonly hidden name="date" class="form-control" value="<?= $date_filter ?>" />
                                <span class="form-control">
                                    <?= $date_filter ?>
                                </span>
                                <?php } else { ?>

                                <select required name="date" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">Selectionner une date</option>
                                    <?php

                                            foreach ($date_array as $date) {
                                                echo "<option value='" . $date . "'>" . $date . "</option>";
                                            }
                                            ?>
                                </select>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if ($date_filter !== null) { ?>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    N Commande
                                </label>
                                <select name="commande" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">Selectionner une commande</option>
                                    <?php
                                        foreach ($commande as $cmd) {
                                            echo "<option value='" . $cmd['id'] . "'>" . "Commande N " . $cmd['id'] . "</option>";
                                        }
                                        ?>

                                </select>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-3">
                            <!-- apply filter button  -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary " type="submit">
                                    Filtrer

                                    <span class="icon text-white-60 ">
                                        <i class="fas fa-search"></i>
                                    </span>
                            </div>
                        </div>

                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>N Comande</th>
                                    <th>Date</th>
                                    <th>Date livraison</th>
                                    <th>Details</th>
                                    <th>Modifier</th>
                                    <th>Livraison</th>
                                    <th>Supprimer</th>
                                    <th>Imprimer Facture</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($commande !== null) {
                                    foreach ($commande as $c) {
                                ?>

                                <tr>
                                    <td>N <?= $c['id'] ?></td>
                                    <td><?= $c['date_commande'] ?></td>
                                    <td><?= $c['date_livraison'] ?></td>
                                    <td>
                                        <?php
                                                if (!isset($_GET['view'])) { ?>
                                        <a href='<?= $_SERVER['REQUEST_URI'] . '&view' ?>' class='btn btn-success'>
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <?php } else { ?>
                                        <!-- link without the view in the url -->
                                        <a href='<?= str_replace('&view', '', $_SERVER['REQUEST_URI']) ?>'
                                            class='btn btn-danger'>
                                            <i class="fas fa-fw fa-eye-slash"></i>
                                        </a>
                                        <?php } ?>


                                    </td>
                                    <td class='text-danger'>Indisponible</td>
                                    <td class='text-success'><?= $c['status'] ?></td>
                                    <td class='text-danger'>Indisponible</td>
                                    <td class='d-flex justify-content-center'>
                                        <a href="#" class='btn btn-warning'>
                                            <i class="fas fa-fw fa-print"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>Aucune commande</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_GET['view'])) { ?>
            <div class='card shadow'>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Details de la commande
                    </h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>P.U.</th>
                                    <th>Qte Commandée</th>
                                    <th>PTTC</th>
                                    <th>Qte Livrée</th>
                                    <th>Qte a livrée</th>
                                    <th>Qte&nbsp;non&nbsp;livrée</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    if ($commande !== null) {
                                        $panier_id = $c['panier_id'];
                                        foreach ($paniers->getPanierByPanierID($panier_id) as $panier) {
                                        } ?>
                                <tr>
                                    <td>
                                        <?= $stock->getStockByID($panier['produit_id'])['designation'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($stock->getStockByID($panier['produit_id'])['prix']) . "F" ?>
                                    </td>

                                    <td>
                                        <?= $panier['quantite'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($panier['quantite'] * $stock->getStockByID($panier['produit_id'])['prix']) . "F" ?>
                                    </td>
                                    <td>
                                        <?= $panier['livrer'] ?>
                                    </td>
                                    <td class='text-danger'>
                                        <?php
                                                if ($panier['quantite'] <= $panier['livrer']) { ?>
                                        <i class="fas fa-fw fa-ban "></i>
                                        <?php } else { ?>
                                        <form method="post" class="form-inline">
                                            <div class="input-group">
                                                <input required name="quantite" type="number" class="form-control"
                                                    placeholder="Qte livrée">
                                                <input type="hidden" name="id" value="<?= $panier['id'] ?>">
                                                <div class="input-group-append">
                                                    <button name="editPanier" class="btn btn-primary" type="submit">
                                                        <span class="icon text-white-60">
                                                            <i class="fas fa-fw fa-check"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
                                    </td>

                                    <td class='text-success'>
                                        <?php
                                                if ($panier['quantite'] <= $panier['livrer']) {
                                                    echo "livraison terminée";
                                                } else {
                                                    echo $panier['quantite'] - $panier['livrer'];
                                                }
                                                ?>
                                    </td>
                                    <td class='text-danger'>Indisponible</td>
                                    <td class='d-flex justify-content-center'>
                                        <a href="#" class='btn btn-warning'>
                                            <i class="fas fa-fw fa-print"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php
                                    } else {
                                        echo "<tr><td colspan='8'>Aucune commande</td></tr>";
                                    }
                                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

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