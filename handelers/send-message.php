<?php
//  dd($_POST);


require_once ROOT_PATH . 'core/functions.php';
require_once ROOT_PATH . 'core/validations.php';

// validate

// request 

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $subject = sanitize($_POST['subject']);
    $content = sanitize(input: $_POST['content']);
    $phone = sanitize(input: $_POST['phone']);

    //var_dump($_POST);



    // validations
    $errors = [];


    // val_name
    if (requiredVal($name)) {
        $errors['name'] = "Name is Required";
    } elseif (minVal($name, 3)) {
        $errors['name'] = "Name Must Be More than 3 letters";
    } elseif (maxVal($name, 25)) {
        $errors['name'] = "Name Must Be Less than 25 letters";
    }


    //val_email
    if (requiredVal($email)) {
        $errors['email'] = "Email is Required";
    } elseif (emailVal($email)) {
        $errors['email'] = "Please enter a valid Email!";
     }elseif (maxVal($email, 25)) {
        $errors['email'] = "Email Must Be Less than 25 letters";
    }


    //val_subject
    if (requiredVal($subject)) {
        $errors['subject'] = "Subject is Required";
    } elseif (minVal($subject, 3)) {
        $errors['subject'] = "Subject Must Be More than 3 letters";
    } elseif (maxVal($subject, 25)) {
        $errors['subject'] = "Subject Must Be Less than 25 letters";
    }


    //val_phone
    if (requiredVal($phone)) {
        $errors['phone'] = "Phone is Required";
    } elseif (strlen($phone) != 11) {
        $errors['phone'] = "Phone Must Be 11 Numbers";
    }


    //val_content
    if (requiredVal($content)) {
        $errors["content"] = "Content is Required";
    } elseif (minVal($content, 10)) {
        $errors["content"] = "Content Must Be More than 10 letters";
    } elseif (maxVal($content, 200)) {
        $errors["content"] = "Content Must Be Less than 200 letters";
    }



    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }
    else {
        $sql = "INSERT INTO `messages` (`name`, `email`, `subject`, `phone`, `content`)
         VALUES ('$name', '$email', '$subject', '$phone' , '$content')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Your message has been sent successfully.";
        }
    }

    redirect("contact");
}
