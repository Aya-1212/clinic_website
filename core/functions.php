<?php


function dd($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
  die;
}
function url($path)
{
  return "index.php?page=" . $path;
}
function redirect($path)
{
  header("Location:" . BASE_URL . "index.php?page=" . $path);

}

function getsession($session)
{
  return $_SESSION[$session] ?? false;
}
function checkRequestMethod($method)
{
  if ($_SERVER['REQUEST_METHOD'] == $method) {
    return true;
  }
  return false;
}
function checkPostInput($input)
{
  if (isset($_POST[$input])) {
    return true;
  }
  return false;
}



function sanitize ($input){


  return trim(htmlspecialchars(htmlentities($input)));

}