<!DOCTYPE html>
<html lang="en">

<?php include "../components/head.php";

$stocks = new Stock();
$paniers = new Panier();
$commandes = new Commande();
$utilisateurs = new Utilisateur();
$panier = null;
$produits = $stocks->getStocks();

if (isset($_POST['commander'])) {
    // check if panier exists in database
    $panier = $paniers->getPanierByPanierID($_GET['panier']);
    if ($panier) {
        // add commande to database
        $commandes->addCommande($_POST['client'], $_GET['panier'], $_POST['date']);
        // head to commande page
        header("Location: Commandes.php");
    } else {
        // head to 404 page
        header("Location: 404.php");
    }
}

if (isset($_GET['panier'])) {
    $panier = $_GET['panier'];
}
if (isset($_POST['add'])) {
    // if panier is null
    if ($panier == null) {
        $panier = generateID();
        $paniers->addPanier($_POST['produit'], $_POST['quantite'], $panier);
        header("Location: nouveauCommande.php?panier=$panier");
    } else {
        $paniers->addPanier($_POST['produit'], $_POST['quantite'], $panier);
    }

    // head to self and exit
    header("Location: nouveauCommande.php?panier=$panier");
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
        <div class="container-fluid">
            <div class='row'>
                <h1 class="col-12 h3 mb-2 text-gray-800">Ajouter Un Commande</h1>
            </div>
            <div class='row'>

                <p class="mb-4 col-12">
                    Veuillez remplir les champs pour ajouter un nouveau Commande ou consulter la liste des
                    Commandes en
                    <a href="Commandes.php">
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
                                    <input type='submit' class='btn btn-light' value='rechercher' name='rechercheP' />
                                </div>

                            </form>
                            <form method="POST" class="form-group row">
                                <div class='col-12 mb-3'>
                                    <select required name='produit' class='form-control'>
                                        <option value=""> Choisir le produit</option>
                                        <?php foreach ($produits as $produit) { ?>
                                        <option value='<?php echo $produit['id']; ?>'>
                                            <?php echo $produit['designation']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class='col-12 mb-3'>
                                    <input placeholder="Quantite de la commande" name='quantite' class='form-control'
                                        type='number' required min=0 />
                                </div>
                                <div class='col-6'>
                                    <input name="add" type="submit" class="btn btn-primary btn-block "
                                        value='Ajouter au panier' />

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class='col-7 mb-3'>
                    <?php
                    if ($panier != null) { ?>
                    <div class='row card shadow mb-3 '>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary">
                                Panier de la commande en cours
                            </h6>
                        </div>
                        <div class='card-body'>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>P.U</th>
                                        <th>Qte</th>
                                        <th>PTTC</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if ($panier != null) {
                                            $sum = [0];
                                        ?>

                                    <?php
                                            $panierCurr = $paniers->getPanierByPanierID($panier);
                                            if (!empty($panierCurr)) {
                                                foreach ($panierCurr as $produit) { ?>
                                    <tr>
                                        <td>
                                            <!-- get stock designation from panier produit id -->
                                            <?php echo $stocks->getStockByID($produit['produit_id'])['designation']; ?>
                                        </td>
                                        <td>
                                            <?= number_format($stocks->getStockByID($produit['produit_id'])['prix']) . " FCFA"; ?>

                                        </td>
                                        <td>
                                            <?= $produit['quantite']; ?>
                                        </td>
                                        <td>
                                            <?= number_format($produit['quantite'] * $stocks->getStockByID($produit['produit_id'])['prix']) . " FCFA";
                                                            array_push($sum, $produit['quantite'] * $stocks->getStockByID($produit['produit_id'])['prix']);
                                                            ?>
                                        </td>
                                        <td><a href="#" class='btn btn-danger'><i class="fas fa-fw fa-trash"></i>
                                            </a> </td>
                                    </tr>
                                    <?php }
                                            }
                                        } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="1">
                                            <a href='Commandes.php' class='btn btn-danger'> Annuler </a>
                                        </th>
                                        <td colspan="2"> Total de la commande </td>
                                        <th colspan="2">
                                            <?= number_format(array_sum($sum)) . " FCFA"; ?>
                                            F </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <?php } ?>
                    <?php if ($panier != null && !empty($panierCurr)) { ?>

                    <div class='row card shadow'>
                        <div class='card-header'>
                            <h6 class="m-0 font-weight-bold text-primary">
                                Validation de la commande
                            </h6>
                        </div>
                        <div class='card-body'>

                            <form method="POST" class='form-group row'>
                                <div class='col-12 mb-3'>
                                    <small> Choisir le client </small>
                                    <select required name='client' class='form-control'>
                                        <option value=""> Choisir le client</option>
                                        <?php foreach ($utilisateurs->getUtilisateurByType('client') as $client) { ?>
                                        <option value='<?php echo $client['id']; ?>'>
                                            <?php echo $client['nom'] . " " . $client['prenom'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class='col-12 mb-3'>
                                    <p>Date de livraison </p>
                                    <input name='date' class='form-control' type='date' required />
                                </div>
                                <div class='col-6'>
                                    <input name="commander" type="submit" class="btn btn-primary btn-block "
                                        value='Creer la commande' />
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
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