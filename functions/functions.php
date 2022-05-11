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
    if()


    


    $string = str_replace("'", "''", $string);
    $string = str_replace("\\", "\\\\", $string);
    $string = str_replace("\"", "\\\"", $string);
    $string = str_replace("\n", "\\n", $string);
    $string = str_replace("\r", "\\r", $string);
    $string = str_replace("\t", "\\t", $string);
    return $string;
}