<?php
$errors = [] ;
if(isset($_GET['id'])){
$id= $_GET['id'];
$sql= " SELECT * FROM `patients` WHERE `id` = '$id' ";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_row($result);
    if(!$row){
        $_SESSION['errors']= "patient Doesn't Exists.";
    }else{
        $sql = "SELECT distinct(patient_id) FROM `appointments`";
        if (tableContainsId($sql, $id)) {
            $_SESSION['errors'] = "Can't delete this patient.";
        } else {
            $sql= " DELETE FROM `patients` WHERE `id`= '$id' ";
            $result= mysqli_query($conn,$sql);
            $_SESSION['success']= "patient Deleted Successfully";
        }
    }
    redirect("table-patients");
}
?>