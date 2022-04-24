<?php

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



    // $password_salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);


    // function hashMyPassword($user_input){
    //     global $password_salt;
    //     return crypt($user_input, $password_salt);
    // }

    // function checkMyPassword($user_input, $hashed_password){
    //     global $password_salt;
    //     return crypt($user_input, $password_salt) == $password_salt;
    // }

    // // echo '$2y$11$055fda95f3b9a58b32080ulVtsp1kmRnhNp6mpjSVk7.YxZNKQ5Y6 ';
    // echo checkMyPassword("password", "$2y$11$055fda95f3b9a58b32080ulVtsp1kmRnhNp6mpjSVk7.YxZNKQ5Y6 ");