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
                            <div class='row mb-3'>
                                <div class='col-4'>
                                    <p class='m-0 font-weight-bold text-muted'>Trier par date</p>

                                    <form class='row px-3'>
                                        <input type='date' class='form-control col-8' />
                                        <input type='submit' class='form-control col-4 btn btn-light' value='filtrer' />
                                    </form>
                                </div>
                                <div class='col-4'>
                                    <p class='m-0 font-weight-bold text-muted'>Trier par date</p>

                                    <form class='row px-3'>
                                        <select class='form-control col-8'>
                                            <option>
                                                Filtrer par
                                            </option>
                                            <option>
                                                les plus nouveaux
                                            </option>
                                            <option>
                                                les plus anciens
                                            </option>
                                        </select>
                                        <input type='submit' class='form-control col-4 btn btn-light' value='filtrer' />
                                    </form>
                                </div>
                                <div class='col-4'>
                                    <p class='m-0 font-weight-bold text-muted'> &nbsp;</p>

                                    <div class='row px-3'>
                                        <a href="fournitures.php" class='btn btn-light btn-block'> Effacer les
                                            filtres</a>
                                    </div>
                                </div>


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
                                    <tfoot>
                                        <tr>
                                            <td class='bg-light' colspan='5'>Montant total des fournitures </td>
                                            <th colspan='1'>5500000F </th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <tr>
                                            <td>22-08-2022</td>
                                            <td>Madar</td>
                                            <td>150</td>
                                            <td>50</td>
                                            <td>200</td>
                                            <td>10000F</td>
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