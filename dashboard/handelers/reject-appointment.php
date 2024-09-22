<?php
$errors = [] ;
if(isset($_GET['id'])){
$id= $_GET['id'];
$sql= " SELECT * FROM `appointments` WHERE `id` = '$id' ";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_row($result);
    if(!$row){
        $_SESSION['errors']= "Appointment Doesn't Exists.";
    }else{
        $sql= " DELETE FROM `appointments` WHERE `id`= '$id' ";
        $result= mysqli_query($conn,$sql);
        $_SESSION['success']= "Appointment rejected Successfully";
    }
    redirect("table-appointments");
}
?>