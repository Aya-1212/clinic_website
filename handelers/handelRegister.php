<?php
require_once 'core/db.php';
require_once  'core/functions.php';
require_once  'core/validations.php';
$errors = [];
if (checkRequestMethod("POST") && checkPostInput('name')) {
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
        echo $key . $value;
    }


    // val_name
    if (requiredVal($name)) {
        $errors["name"] = "Name is Required";
    } elseif (minVal($name, 3)) {
        $errors["name"] = "Name Must Be More than 3 letters";
    } elseif (maxVal($name, 25)) {
        $errors["name"] = "Name Must Be Less than 25 letters";
    }
    //val_email
    if (requiredVal($email)) {
        $errors["email"] = "Email is Required";
    } elseif (emailVal($email)) {
        $errors["email"] = "Enter a Valid Email";
    }
    //val_phone
    if (requiredVal($phone)) {
        $errors["phone"] = "Phone is Required";
    } elseif (strlen($phone) != 11) {
        $errors["phone"] = "Phone Must Be 11 Numbers";
    }
    //val_password
    if (requiredVal($password)) {
        $errors["password"] = "Password is Required";
    } elseif (minVal($password, 8)) {
        $errors["password"] = "Password Must Be More than 8 letters";
    } elseif (maxVal($password, 25)) {
        $errors["password"] = "Password Must Be Less than 25 letters";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("register");
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `patients` (`name`, `email`, `phone`, `password`) VALUES 
        ('$name', '$email' , '$phone', '$hash')
        ";
        $result = mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        $_SESSION['auth'] =
            [
                'name' => $name,
                'email' => $email,
                'id'  => $id
            ];
        redirect("home");
    }
}

redirect("register");
