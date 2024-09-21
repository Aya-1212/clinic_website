<?php
$errors = [] ;
if(isset($_GET['id'])){
$id= $_GET['id'];
$sql= " SELECT doctors.* , majors.id FROM doctors
INNER JOIN majors ON doctors.major_id = majors.id;
 ";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_row($result);
    if(!$row){
        $_SESSION['errors']= "Major Doesn't Exists.";
    }else{
        $sql= " DELETE FROM `majors` WHERE `id`= '$id' ";
        $result= mysqli_query($conn,$sql);
        $_SESSION['success']= "Major Deleted Successfully";
    }
    redirect("table-majors");
}
?>