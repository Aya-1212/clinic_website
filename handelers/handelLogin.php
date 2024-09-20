<?php
require_once ROOT_PATH . 'core/functions.php';
require_once ROOT_PATH . 'core/validations.php';
$errors = [];
if (checkRequestMethod("POST") && checkPostInput('email')) {
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
        // echo $key . $value;
    }
    //val_email
    if (requiredVal($email)) {
        $errors[] = "Email is Required";
    } elseif (emailVal($email)) {
        $errors[] = "Enter a Valid Email";
    }
    //val_password
    if (requiredVal($password)) {
        $errors[] = "Password is Required";
    } elseif (minVal($password, 8)) {
        $errors[] = "Password Must Be More than 8 letters";
    } elseif (maxVal($password, 25)) {
        $errors[] = "Password Must Be Less than 25 letters";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("Login");

    } else {
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM `patients` WHERE `email` = '$email'";
          $result = mysqli_query($conn, $sql);
        if (mysqli_fetch_row($result) > 0){
            $patient = mysqli_fetch_assoc($result);
            if (password_verify($password, $patient['password'])) {
                $_SESSION['auth'] =
                    [
                        'name' => $patient['name'],
                        'email' => $email,
                        'id' => $patient['id']
                    ];
                redirect("home");
            } else {
                $_SESSION['errors'] = ["Password Not Correct"];
            }
            // dd($patient);
        } else {
            $_SESSION['errors'] = ["No such Account"];
            redirect("Login");
        }
    }

    }



