<!DOCTYPE html>
<html lang="en">

<?php
    include("../components/head.php")
?>

<body id="page-top">
    <!-- MAIN -->
    <div id="wrapper">
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
                        <br/>
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
                  <div class='row'>
                <div class='col-4'>
                  <form class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Id ou nom ou prenom" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                  </form>
                </div>
                <div class='col-4' >
                  <select class='form-control'>
                    <option>Trier par :</option>
                    <option>Date de commande le plus recent</option>
                    <option>Date de commande le plus ancien</option>
                    <option>Date de livraison le plus recent</option>
                    <option>Date de livraison le plus ancien</option>
                    <option>Plus grande Quantite</option>
                    <option>Plus petite Quantite</option>
                  </select>

                </div>
                <div class='col-4' >
                  <select class='form-control'>
                    <option>Filtrer par client :</option>
                    <option>01 - San Lamamba Popoda</option>
                    <option>01 - San Lamamba Popoda</option>
                    <option>01 - San Lamamba Popoda</option>
                  </select>

                </div>
                
                </div>
                
                </div>
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Code Client</th>
                        <th>Nom et Prenom</th>
                        <th>Produit</th>
                        <th>P.U</th>
                        <th>Qte</th>
                        <th>PTTC</th>
                        <th>Date de livraison</th>
                        <th>Livrée</th>
                        <th>Reste</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th colspan="4"> <btn class='btn btn-danger'> Supprimer toutes les commandes </btn> </th>
                        <th colspan="4"> Total des commandes </th>
                        <td colspan="4"> 500.000F </td>
                      </tr>
                    </tfoot>

                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>22-03-2018</td>
                        <td>3</td>
                        <td>San Lamamba Popoda</td>
                        <td>Madar</td>
                        <td>200</td>
                        <td>5</td>
                        <td>1000F</td>
                        <td>26-03-2018</td>
                        <td>50</td>
                        <td>10</td>
                        <td><a href="#" class='btn btn-warning' ><i class="fas fa-fw fa-pen"></i> </a> </td>
                      </tr>
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
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
</body>

</html>