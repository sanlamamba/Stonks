<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stonks - Gestion de Stock</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- font awesome cdn -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- LOAD SCRIPT WITH DEFER -->

    <script>
    // document.addEventListener("contextmenu", (event) => event.preventDefault());
    document.onkeydown = function(e) {
        if (event.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }
    </script>



    <?php
    include_once("../functions/functions.php");
    include_once("../includes/class-autoload.inc.php");
    // echo checkMyPassword("password", "$2y$11$055fda95Pf3b9a58b32080ulVtsp1kmRnhNp6mpjSVk7.YxZNKQ5Y6 ");
    ?>
    <?php
    // start a session
    session_start();
    $admin = null;
    // check if the user is logged in or not
    if (!isset($_SESSION['token'])) {
        // if php self not on login page
        if (basename($_SERVER['PHP_SELF']) != 'login.php') {
            // redirect to login page
            header('Location: login.php');
        }
    } else {
        if (basename($_SERVER['PHP_SELF']) == 'login.php') {
            // redirect to login page
            header('Location: clients.php');
            $admin = new Admin();
            $admin = $admin->getAdminByToken($_SESSION['token']);
            var_dump($admin);
            $nom = $admin['nom'];
            $prenom = $admin['prenom'];


            // set admin nom and prenom to  javascipt local storage
            echo "<script>
            localStorage.setItem('nom', '$nom');
            localStorage.setItem('prenom', '$prenom');
            </script>";
        }
    }
    ?>


</head>

<body id="page-top">
    <!-- MAIN -->
    <div id="wrapper">