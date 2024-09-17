<?php


function dd ($data){
  echo "<pre>";
  var_dump ($data);
  echo "</pre>";
  die;
}
function url($path){
return BASE_URL."index.php?page=".$path;
 die;
}
function redirect ($path){
header("Location:".BASE_URL."index.php?page=".$path);
}

function getsession ($session){
 return $_SESSION[$session] ?? false;
 
}