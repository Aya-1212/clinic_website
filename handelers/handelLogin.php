<?php
require_once ROOT_PATH . 'core/functions.php';
require_once ROOT_PATH . 'core/validations.php';
$errors = [];

if (checkRequestMethod("POST") && checkPostInput('email')) {
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
        // echo $key . $value;
    }

    // dd($_POST);


    //val_email
    if (requiredVal($email)) {
        $errors["email"] = "Email is Required";
    } elseif (emailVal($email)) {
        $errors["email"] = "Enter a Valid Email";
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
        redirect("Login");
    } else {
        // dd($_POST);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM `patients` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        $patient = mysqli_fetch_assoc($result);
        if ($patient) {
            if (password_verify($password, $patient['password'])) {
                $_SESSION['auth'] = [
                    "id" => $patient['id'],
                    "name" => $patient['name'],
                    "email" => $patient['email'],
                ];
                redirect("home");
            } else {
                $errors["password"] = "Password isn't correct";
                $_SESSION['errors'] = $errors;
                redirect("Login");
            }
        } else {
            $errors["password"] = "No such account";
            $_SESSION['errors'] = $errors;
            redirect("Login");
        }
    }
}
// if ($patient) {
            //     $_SESSION['auth'] = [
            //         'name' => $patient['name'],
            //         'email' => $patient['email'],
            //         'id' => $patient['id']
            //     ];
            //     redirect("home");
            // } else {
            //      $errors["password"] = "No such account";
            //     $_SESSION['errors'] = $errors;
            //     redirect("Login");
            // }
