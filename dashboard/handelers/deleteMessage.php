<?php
$errors = [] ;
if(isset($_GET['id'])){
$id= $_GET['id'];
$sql= " SELECT * FROM `messages` WHERE `id` = '$id' ";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_row($result);
    if(!$row){
        $_SESSION['errors']= "Message Doesn't Exists.";
    }else{
        $sql= " DELETE FROM `messages` WHERE `id`= '$id' ";
        $result= mysqli_query($conn,$sql);
        $_SESSION['success']= "Message Deleted Successfully";
    }
    redirect("table-messages");
}
?>