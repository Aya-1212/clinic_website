<?php
if (checkRequestMethod("POST") && checkPostInput('patient_id') && checkPostInput('doctor_id')) {
    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    //
    $sql = "INSERT INTO `appointments` (`doctor_id`,`patient_id`)
           VALUES ('$doctor_id','$patient_id')   ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['appointment-success'] = "Booked Successfully";
        redirect("home");
    } else {
        $_SESSION['error'] = "Something want wrong";
        redirect("appointment&id" . $doctor_id);
    }
}
