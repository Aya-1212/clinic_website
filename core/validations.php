<?php

function requiredVal($input)
{
    if (empty($input)) {
        return true;
    }
    return false;
}

function minVal($input, $lenght)
{
    if (strlen($input) < $lenght) {
        return true;
    }
    return false;
}

function maxVal($input, $lenght)
{
    if (strlen($input) > $lenght) {
        return true;
    }
    return false;
}

function emailVal($email) 
{
   return !filter_var($email, FILTER_VALIDATE_EMAIL); 

}






