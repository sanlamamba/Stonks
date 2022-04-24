<!DOCTYPE html>
<html lang="en">

<?php include "../components/head.php"; ?>

<body id="page-top">
    <!-- MAIN -->
    <div id="wrapper">
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
                                            <input type="search" class="form-control"
                                                placeholder="Rechercher le nom du produit" name='produit' required />

                                        </div>
                                        <div class='col-4'>
                                            <input type='submit' class='btn btn-light' value='rechercher'
                                                name='rechercheP' />
                                        </div>

                                    </form>
                                    <form class="form-group row">
                                        <div class='col-12 mb-3'>
                                            <select name='produit' class='form-control'>
                                                <option> Choisir le produit</option>
                                                <option default value='1'> 01 - Madar</option>
                                            </select>
                                        </div>
                                        <div class='col-12 mb-3'>
                                            <input name='quantite' class='form-control' type='number' required min=0
                                                max=100 />
                                            <p class='small text-muted'>max: 150 </p>
                                        </div>
                                        <div class='col-6'>
                                            <input type="submit" class="btn btn-primary btn-block "
                                                value='Ajouter au panier' />

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class='col-7 mb-3'>
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
                                        <tfoot>
                                            <tr>
                                                <th colspan="1">
                                                    <a href='Commandes.php' class='btn btn-danger'> Annuler </a>
                                                </th>
                                                <td colspan="2"> Total de la commande </td>
                                                <th colspan="2"> 500.000F </th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr>
                                                <td>Madar</td>
                                                <td>200</td>
                                                <td>3</td>
                                                <td>600</td>
                                                <td><a href="#" class='btn btn-danger'><i
                                                            class="fas fa-fw fa-trash"></i>
                                                    </a> </td>
                                            </tr>
                                            <tr>
                                                <td>Madar</td>
                                                <td>200</td>
                                                <td>3</td>
                                                <td>600</td>
                                                <td><a href="#" class='btn btn-danger'><i
                                                            class="fas fa-fw fa-trash"></i>
                                                    </a> </td>
                                            </tr>
                                            <tr>
                                                <td>Madar</td>
                                                <td>200</td>
                                                <td>3</td>
                                                <td>600</td>
                                                <td><a href="#" class='btn btn-danger'><i
                                                            class="fas fa-fw fa-trash"></i>
                                                    </a> </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class='row card shadow'>
                                <div class='card-header'>
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Validation de la commande
                                    </h6>
                                </div>
                                <div class='card-body'>
                                    <form class="form-group row">
                                        <div class='col-9'>
                                            <input type="search" class="form-control"
                                                placeholder="Rechercher le nom du produit" name='produit' required />

                                        </div>
                                        <div class='col-3'>
                                            <input type='submit' class='btn btn-light' value='rechercher'
                                                name='rechercheC' />
                                        </div>

                                    </form>
                                    <form class='form-group row'>
                                        <div class='col-12 mb-3'>
                                            <select name='client' class='form-control'>
                                                <option> Choisir le client</option>
                                                <option default value='1'> 01 - San Lamamba Popoda</option>
                                            </select>
                                        </div>
                                        <div class='col-12 mb-3'>
                                            <p>Date de livraison </p>
                                            <input name='date' class='form-control' type='date' required />
                                        </div>
                                        <div class='col-6'>
                                            <input type="submit" class="btn btn-primary btn-block "
                                                value='Ajouter au panier' />

                                        </div>
                                    </form>
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