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
                    <h1 class="h3 mb-2 text-gray-800">Gestion des livraisons ? de ********</h1>

                    <p class="mb-1 text-muted">
                        ?Addresse du client : <strong> **** *** * * ** **** *</strong>
                    </p>
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
                                            <input type="text" class="form-control" id="searchByClient"
                                                placeholder="Entrer le nom du client">
                                        </div>
                                        <!-- SUBMIT input only icon -->
                                        <form class="col-2">
                                            <button class="btn btn-primary " type="submit">
                                                <span class="icon text-white-60 ">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </button>
                                        </form>

                                    </div>

                                </form>
                            </div>
                            <div class="row">

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Filtrer par client
                                        </label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Tous</option>
                                            <option>Client 1</option>
                                            <option>Client 2</option>
                                            <option>Client 3</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Filtrer par date
                                        </label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Tous</option>
                                            <option>Aujourd'hui</option>
                                            <option>Hier</option>
                                            <option>Cette semaine</option>
                                            <option>Ce mois</option>
                                            <option>Cette année</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Commande Correspondante
                                        </label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Tous</option>
                                            <option>En cours</option>
                                            <option>Livré</option>
                                            <option>Annulé</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
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
                                        <tr>
                                            <td>N 01</td>
                                            <td>11/06/2018</td>
                                            <td>25/06/2018</td>
                                            <td>
                                                <a href="#" class='btn btn-success'>
                                                    <i class="fas fa-fw fa-eye"></i>
                                                </a>
                                                ?
                                                <a href="#" class='btn btn-danger'>
                                                    <i class="fas fa-fw fa-eye-slash"></i>
                                                </a>

                                            </td>
                                            <td class='text-danger'>Indisponible</td>
                                            <td class='text-success'>Livraison Terminée</td>
                                            <td class='text-danger'>Indisponible</td>
                                            <td class='d-flex justify-content-center'>
                                                <a href="#" class='btn btn-warning'>
                                                    <i class="fas fa-fw fa-print"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                                        <tr>
                                            <td>On Almond</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>20000</td>
                                            <td>5</td>
                                            <td class='text-danger'>
                                                <i class="fas fa-fw fa-ban "></i>
                                                ?
                                                <!-- Input with a button with only an icon -->
                                                <form class="form-inline">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Qte livrée">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button">
                                                                <span class="icon text-white-60">
                                                                    <i class="fas fa-fw fa-check"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </td>

                                            <td class='text-success'>Livraison Terminée</td>
                                            <td class='text-danger'>Indisponible</td>
                                            <td class='d-flex justify-content-center'>
                                                <a href="#" class='btn btn-warning'>
                                                    <i class="fas fa-fw fa-print"></i>
                                                </a>

                                            </td>
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