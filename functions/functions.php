<?php

function stringController($str)
{
    $str = strip_tags($str);
    $str = htmlspecialchars($str);
    $str = trim($str);
    return $str;
}

function generateRandomId()
{
    //Generate a string of int that could be used as id
    $id = "";
    $characters = "0123456789";
    $charactersLength = strlen($characters);
    for ($i = 0; $i < 10; $i++) {
        $id .= $characters[rand(0, $charactersLength - 1)];
    }
    return $id;
}

//function to check if string has special characters and convert them
function checkString($string)
{
    $string = str_replace("'", "''", $string);
    $string = str_replace("\\", "\\\\", $string);
    $string = str_replace("\"", "\\\"", $string);
    $string = str_replace("\n", "\\n", $string);
    $string = str_replace("\r", "\\r", $string);
    $string = str_replace("\t", "\\t", $string);
    return $string;
}

// function to generate random id from date and time to use as id
function generateId()
{
    // generate random id from 0-9 and a-z and A-Z
    $id = "";
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charactersLength = strlen($characters);
    for ($i = 0; $i < 6; $i++) {
        $id .= $characters[rand(0, $charactersLength - 1)];
    }
    return $id;
}

// sanitize string
function sanitizeString($string)
{
    //if pregmatch php tag is not available
    if (preg_match("/<\?php/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    //if pregmatch script tag is not available
    if (preg_match("/<script/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    //if pregmatch style tag is not available
    if (preg_match("/<style/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    //if pregmatch iframe tag is not available
    if (preg_match("/<iframe/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch link tag is not available
    if (preg_match("/<link/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch meta tag is not available
    if (preg_match("/<meta/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch form tag is not available
    if (preg_match("/<form/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch input tag is not available
    if (preg_match("/<input/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch button tag is not available
    if (preg_match("/<button/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch select tag is not available
    if (preg_match("/<select/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch option tag is not available
    if (preg_match("/<option/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch textarea tag is not available
    if (preg_match("/<textarea/", $string)) {
        // head to error page
        header("Location: error.php");
    }
    // if pregmatch button tag is not available
    if (preg_match("/<button/", $string)) {
        // head to error page
        header("Location: error.php");
    }

    $string = str_replace("'", "''", $string);
    $string = str_replace("\\", "\\\\", $string);
    $string = str_replace("\"", "\\\"", $string);
    $string = str_replace("\n", "\\n", $string);
    $string = str_replace("\r", "\\r", $string);
    $string = str_replace("\t", "\\t", $string);
    return $string;
}