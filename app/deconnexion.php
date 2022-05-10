<?php
include("../components/head.php");
// clear session storage and redirect to login page

session_destroy();

header('Location: login.php');