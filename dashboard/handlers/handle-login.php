<?php 

$errors = [];

if( checkRequestMethod("POST")  && checkPostInput("email") && checkPostInput("password") ){
    foreach($_POST as $key => $value){
        $$key = $value;
    }
    //email
    if (requiredVal($email)) {
        $errors['email'] = "The email is required";
    } else if (emailVal($email)) {
        $errors['name'] = "The email is invalid";
    }
    //password
    if (requiredVal($password)) {
        $errors['password'] = "The password is required";
    } else if (minVal($password, 7)) {
        $errors['password'] = "The password must me more than 7 chars";
    } else if (maxVal($password, 12)) {
        $errors['password'] = "The password must me less than 12 chars";
    }
 
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        redirect("login");
    }else{

        $sql ="SELECT * FROM `admins` WHERE `email`= '$email'";
        $result = mysqli_query($conn,$sql);
        // if(){

        // }
        // dd(mysqli_fetch_row($result));

    }

}
