<?php
//IF POST DATA exists and is not empty vardump it else redirect back
if (isset($_POST) && !empty($_POST)) {
    var_dump($_POST);
} else {
    header('Location: ../index.php');
}