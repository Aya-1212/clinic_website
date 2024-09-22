<?php
session_start();

require_once 'src/config.php';
require_once ROOT_PATH. 'src/connection.php';
require_once '../core/functions.php';
require_once '../core/validations.php';
// $doctors = countIds('doctors'); 
// dd($doctors); 
// die;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case "home":
            require_once 'views/home.php';
            break;
        case "table-doctors":
            require_once "views/doctors.php";
            break;
        case "add-doctor":
            require_once "views/add-doctor.php";
            break;
        case "table-patients":
            require_once "views/patients.php";
            break;
        case "table-majors":
            require_once "views/majors.php";
            break;
        case "table-messages":
            require_once "views/messages.php";
            break;
        case "table-appointments":
            require_once "views/appointments.php";
            break;
        case "login":
            require_once "views/login.php";
            break;
        case "handle-login":
            require_once "handelers/handle-login.php";  
            break;  
        case "register":
            require_once "views/register.php";
            break;
        case "handle-register":
            require_once "handelers/handle-register.php";
            break;    
        case "add-major":
            require_once "views/add-major.php";
            break;
        case "add-patient":
            require_once "views/add-patient.php";
            break;
        case "addPatient":
            require_once "handelers/addPatient.php";
            break;
        case "add_major":
            require_once "handelers/addMajor.php";
            break;
        case "add_doctor":
            require_once "handelers/insert_doctor.php";
            break;
        case "insert_message":
            require_once "handelers/insert_message.php";
            break;
        case "deleteDoctor":
            require_once "handelers/deleteDoctor.php";
            break;
        case "deletePatients":
            require_once "handelers/deletepatients.php";
            break;
        case "deleteMajor":
            require_once "handelers/deleteMajor.php";
            break;
        case 'delete_message':
            require_once 'handelers/deleteMessage.php';
            break;
        case 'reject-appointment':
            require_once 'handelers/reject-appointment.php';
            break;
        case 'edit-doctor':
            require_once 'views/edit-doctor.php';
            break;
        case 'edit-patient':
            require_once 'views/edit-patient.php';
            break;
        case 'edit-major':
            require_once 'views/edit-major.php';
            break;
        case 'edit-appointment':
            require_once 'views/edit-appointment.php';
            break;
        case 'update_doctor':
            require_once 'handelers/update_doctor.php';
            break;
        case 'update_patient':
            require_once 'handelers/update_patient.php';
            break;
        case 'update_major':
            require_once 'handelers/update_major.php';
            break;
        case 'update_appointment':
            require_once 'handelers/update_appointment.php';
            break;
        default:
            require_once 'views/404.php';
    }
} else {
    require_once 'views/home.php';
}