<?php 
require_once '../src/database.php';
$conn = mysqli_connect(HOST_NAME , USER_NAME, PASSWORD, DATABASE_NAME,PORT);
//, port: PORT

function countIds ($table_name){
    global $conn;
   $sql = "SELECT COUNT(`id`) as `num` FROM `$table_name`";
   $result = mysqli_query($conn,$sql); 
   $entity = mysqli_fetch_assoc($result);
   return $entity['num'];
}

function isNotEmpty ($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    if( mysqli_affected_rows($conn) >0 ){
            return true;
    }
    return false;
}

function tableContainsId ($sql,$needle){
    global $conn;
   $result = mysqli_query($conn,$sql); 
   $ids = mysqli_fetch_assoc($result);
   $contains= array_search($needle,$ids);
   if($contains){
      return true;
   }
   return false;
}