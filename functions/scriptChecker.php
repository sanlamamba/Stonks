<?php
// function to check for injection in params, if injection then redirect to 403
function checkInjectionSQL($elementArray)
{
    foreach ($elementArray as $element) {
        if (preg_match("/[^a-zA-Z0-9]/", $element)) {
            header("Location: 403.php");
        }
    }
}
