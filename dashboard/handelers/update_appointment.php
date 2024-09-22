
<?php

$conn= mysqli_connect("localhost","root","","clinic");
if(!$conn){
    echo "connect error!".mysqli_connect_error($conn);
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['status'])){

    $id = $_GET['id'];

    $name= sanitize($_POST['status']);
    
    
    if(empty($_SESSION['errors'])){

        $sql="UPDATE `appointments` SET `status`='$name' WHERE `id`= $id "; 
        $result= mysqli_query($conn,$sql);
        $_SESSION['success']=" Appointment Updated Successfully";
    }else{
        redirect("table-appointments");
    }
// var_dump($_SESSION);
// die;
    //redirect
 redirect("table-appointments");
}


