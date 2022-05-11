<?php
include "../components/head.php";
$paniers = new Panier();
$commandes = new Commande();
$clients = new Utilisateur();
$stocks = new Stock();

?>


<?php
function printInvoice($id, $client, $dateL, $data)
{
    $stocks = new Stock();
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    Livraison de <?php echo $client['nom'] . " " . $client['prenom']; ?>
                </h1>
                <small class="text-center">
                    <strong> Adresse : </strong>
                    <?php echo $client['adresse']; ?>
                </small>
                <br />

                <small class="text-center">
                    <strong> Téléphone : </strong>
                    <?php echo $client['telephone']; ?>
                </small>
                <br />

                <small class="text-center">
                    <strong> Email : </strong>
                    <?php echo $client['email']; ?>
                </small>
                <br />

                <small class="text-center">
                    <strong> Date de livraison : </strong>
                    <?php echo $dateL; ?>
                </small>
                <br />

                <hr>
                <h3 class="text-center">
                    Facture n°<?php echo $id; ?>
                </h3>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sum = array();

                            foreach ($data as $row) {
                            ?>
                        <tr>
                            <td><?php
                                        // get stock designation by produit_id from $row and $stocks
                                        echo $stocks->getStockById($row['produit_id'])['designation'];
                                        ?></td>
                            <td><?php echo $row['quantite']; ?></td>
                            <td><?php
                                        $currPrix = $stocks->getStockById($row['produit_id'])['prix'];
                                        echo $currPrix;
                                        ?></td>
                            <td><?php
                                        $currTotal = $currPrix * $row['quantite'];
                                        echo number_format($currTotal, 2, ',', ' ');
                                        echo " FCFA";
                                        array_push($sum, $currTotal);
                                        ?></td>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th>
                                <?php
                                    echo number_format(array_sum($sum), 2, ',', ' ');
                                    echo " FCFA";
                                    ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
<?php
    echo "<script>window.print();</script>";
} ?>

<?php
//if get commande is not set
if (!isset($_GET['commande'])) {
    //redirect to commandes

}

// check if commande with id of get commande exist in database
if ($commandes->getCommandeByID($_GET['commande']) == null) {
    //redirect to commandes
    header("Location: commandes.php");
} else {

    //get commande by id
    $commande = $commandes->getCommandeByID($_GET['commande']);
    if ($commande == null) {
        header("Location: commandes.php");
    } else {
        //get client by id
        $client = $clients->getUtilisateurByID($commande[0]['client_id']);
        // get pnaier by panier id
        $panier = $paniers->getPanierByPanierID($commande[0]['panier_id']);
    }
}


printInvoice($commande[0]['id'], $client, $commande[0]['date_livraison'], $panier);