<?php
session_start();
require_once 'src/config.php';
require_once ROOT_PATH . 'core/db.php';
require_once ROOT_PATH . 'core/functions.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($_GET['page']) {
        case "home":
            require_once 'views/home.php';
            break;
        case "history":
            require_once 'views/history.php';
            break;
        case "handelRegister":
            require_once 'handelers/handelRegister.php';
            break;
        case "handelBooking":
            require_once 'handelers/handelBooking.php';
            break;
        case "handelLogin":
            require_once 'handelers/handelLogin.php';
            break;
        case 'major':
            require_once 'views/majors.php';
            break;
        case 'doctor-profile':
            require_once 'views/doctor-profile.php';
            break;
        case 'doctor':
            require_once 'views/doctors.php';
            break;
        case 'contact':
            require_once 'views/contact.php';
            break;
        case "appointment":
            require_once 'views/booking.php';
            break;
        case 'register':
            require_once 'views/register.php';
            break;
        case 'Login':
            require_once 'views/login.php';
            break;
        case 'error':
            require_once 'views/404.php';
            break;
        default:
            require_once 'views/404.php';
    }
} else {
    require_once 'views/home.php';
}
