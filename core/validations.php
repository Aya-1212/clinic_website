<?php

function requiredVal($input) 
{
    if (empty($input))
    {
        return false; 
    }
    return true;
}

function minVal($input , $lenght) 
{
    if (strlen($input)< $lenght)
    {
        return false;
    }
    return true;
}

function maxVal($input , $lenght) 
{
    if (strlen($input) > $lenght)
    {
        return false;  
    }
    return true;
}

function emailVal($email) 
{
   return filter_var($email, FILTER_VALIDATE_EMAIL); 
  
}

?>