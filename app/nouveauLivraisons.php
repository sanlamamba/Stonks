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
                <div class="container">
                    <div class='row'>
                    <div class='col-6'>
                        
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ajouter Un Client</h1>
                    <p class="mb-4">
                        Veuillez remplir les champs pour ajouter un nouveau client ou consulter la liste des clients en
                        <a  href="clients.php"> 
                            cliquant ici
                        </a>.
                    </p>
                    <div class='card shadow mb-4'>
                        <div class='card-header'>
                        <h6 class="m-0 font-weight-bold text-primary">
                            Formulaire d'ajout des clients
                        </h6>
                        </div>

                        <div class='card-body'>
                            
                            <form class="user" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Le nom du client" name='nom' required/> 
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Le prenom du client" name='prenom' required/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Adresse Mail" name='email' required/>
                                        
                                        
                                </div>
                                <div class="form-group">
                                    <input type="tel" pattern="[7]{1}[0-9]{8}" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Numero de Telephone" name='telephone' required/>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Mot de passe" name='password' required>
                                    </div>
                                    
                                    <button class='btn btn-light'> <i class="fas fa-fw fa-eye"></i> </button>
                                </div>
                                <hr>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value='Creer un nouveau client'/>
                                    
                                </a>
                                
                            </form>
                        </div>
                    </div>
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