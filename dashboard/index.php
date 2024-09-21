<?php
session_start();
require_once 'src/config.php';
require_once ROOT_PATH. 'src/connection.php';
require_once '../core/functions.php';
require_once '../core/validations.php';

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
        case "add-major":
            require_once "views/add-major.php";
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
            require_once "handlers/handle-login.php";  
            break;  
        case "register":
            require_once "views/register.php";
            break;
        case "handle-register":
            require_once "handlers/handle-register.php";
            break;    
        default:
            require_once 'views/404.php';
    }
} else {
    require_once 'views/home.php';
}