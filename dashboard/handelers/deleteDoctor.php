<?php
$errors = [] ;
if(isset($_GET['id'])){
$id= $_GET['id'];
$sql= " SELECT * FROM `doctors` WHERE `id` = $id ";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_row($result);
    if(!$row){
        $_SESSION['errors']= "Doctor Doesn't Exists.";
    }else{
        $sql= "SELECT distinct(doctor_id) FROM `appointments`";
        if(tableContainsId($sql,$id)){
            $_SESSION['errors']= "Can't delete this doctor.";
        }else{
            $sql= " DELETE FROM `doctors` WHERE `id`= $id ";
            $result= mysqli_query($conn,$sql);
            $_SESSION['success']= "Doctor Deleted Successfully";
        }
    }
    redirect("table-doctors");
}
?>