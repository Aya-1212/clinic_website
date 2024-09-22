
<?php

$conn= mysqli_connect("localhost","root","","clinic");
if(!$conn){
    echo "connect error!".mysqli_connect_error($conn);
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])){

    $id = $_GET['id'];

    $name= sanitize($_POST['name']);
    
    $phone = sanitize($_POST['phone']);

    $email = sanitize($_POST['email']);

    $password = sanitize($_POST['password']);
    
    
    
    if(empty($_SESSION['errors'])){

        $sql="UPDATE `patients` SET `name`='$name', `phone`='$phone', `email`='$email', `password` ='$password' 
         WHERE `id`= $id "; 
        $result= mysqli_query($conn,$sql);
        $_SESSION['success']=" Data Updated Successfully";
    }else{
        redirect("table-patients");
    }
// var_dump($_SESSION);
// die;
    //redirect
 redirect("table-patients");
}


