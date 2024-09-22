
<?php

$conn= mysqli_connect("localhost","root","","clinic");
if(!$conn){
    echo "connect error!".mysqli_connect_error($conn);
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])){

    $id = $_GET['id'];

    $name= sanitize($_POST['name']);
    
    $image = sanitize($_POST['image']);

    
    
    
    if(empty($_SESSION['errors'])){

        $sql="UPDATE `majors` SET `title`='$name',  `image` ='$image'  WHERE `id`= $id "; 
        $result= mysqli_query($conn,$sql);
        $_SESSION['success']=" Data Updated Successfully";
    }else{
        redirect("table-majors");
    }
// var_dump($_SESSION);
// die;
    //redirect
 redirect("table-majors");
}


