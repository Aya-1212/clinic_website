<?php

$errors = [];

if (checkRequestMethod("POST") && checkPostInput("name") && checkPostInput("email") && checkPostInput("password") && checkPostInput("password_confirm")) {
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
    }
    //name 
    if (requiredVal($name)) {
        $errors['name'] = "The name is required";
    } else if (minVal($name, 6)) {
        $errors['name'] = "The name must me more than 6 chars";
    } else if (maxVal($name, 25)) {
        $errors['name'] = "The name must me less than 25 chars";
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
    //password_confirmation
    if (requiredVal($password_confirm)) {
        $errors['password_confirm'] = "The password confirmation is required";
    } else if ($password_confirm != $password) {
        $errors['password_confirm'] = "The password confirmation doesn't match password";
    }
    // dd($_POST);
    // dd($errors);
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("register");
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `admins` (`name`,`email`,`password`)
                VALUES('$name','$email','$hash')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $id = mysqli_insert_id($conn);
            $_SESSION['admin_auth'] = [
                "id" => $id,
                "name" => $name,
                "email" => $email,
            ];
            redirect("home");
        } else {
            $errors['password_confirm'] = "Something want wrong";
            redirect("register");
        }
        
    }
}
