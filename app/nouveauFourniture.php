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
                                            <input name='quantite' placeholder='Quantite' class='form-control'
                                                type='number' required min=1 />
                                        </div>
                                        <div class='col-5'>
                                            <input type="submit" name='fourniture' class="btn btn-danger btn-block "
                                                value='retirer' />
                                        </div>
                                        <p class='col-2'>
                                        </p>
                                        <div class='col-5'>
                                            <input type="submit" class="btn btn-success btn-block " value='Ajouter' />
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class='col-7 mb-3'>
                            <div class='row card shadow mb-3 '>
                                <div class='card-header'>
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Panier de la fourniture en cours
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
                                        <tfoot>
                                            <tr>

                                                <td class='bg-light' colspan="4 "> Total de la fourniture </td>
                                                <th colspan="2"> 500.000F </th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr>
                                                <td>11-05-2019</td>
                                                <td>Madar</td>
                                                <td>150</td>
                                                <td>10</td>
                                                <td>2000F</td>
                                                <td>
                                                    <a href="#" class='btn btn-danger'>
                                                        &#8634;
                                                    </a>
                                                </td>
                                            </tr>

                                        </tbody>
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