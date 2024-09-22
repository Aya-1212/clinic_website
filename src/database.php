<?php
// CREATE DATABASE
//,port:3377

$conn = mysqli_connect("localhost", "root", "","clinic");

 
$sql = "CREATE DATABASE IF NOT EXISTS `clinic`";
$result = mysqli_query($conn, $sql);

// CONNECT WITH DATABASE 
//,3377


$conn = mysqli_connect("localhost", "root", "", "clinic");
 

define("HOST_NAME", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DATABASE_NAME", "clinic");
// define("PORT", 3377);

// CREATE TABLES
$sql = "CREATE TABLE IF NOT EXISTS `patients`(
  `id` INT PRIMARY KEY  AUTO_INCREMENT,
  `phone` VARCHAR(150) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `password` VARCHAR(200) NOT NULL
  )";
$result = mysqli_query($conn, $sql);


$sql = "CREATE TABLE IF NOT EXISTS `majors`(
    `id` INT PRIMARY KEY  AUTO_INCREMENT,
    `title` VARCHAR(150) NOT NULL,
    `image` VARCHAR(200) NOT NULL
    )";
$result = mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS `doctors`(
    `id` INT PRIMARY KEY  AUTO_INCREMENT,
    `name` VARCHAR(150) NOT NULL,
    `description` TEXT NOT NULL,
    `location` VARCHAR(250) NOT NULL,
    `image` VARCHAR(200) NOT NULL,
    `major_id` int not null,
    FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`)
      )";
$result = mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS `appointments`(
        `id` INT PRIMARY KEY  AUTO_INCREMENT,
        `time` TIMESTAMP DEFAULT(now()) NOT NULL,
        `status` ENUM('yes', 'no') NOT NULL,
         `doctor_id` INT NOT NULL,
         FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
         `patient_id` INT NOT NULL,
          FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
          )";
$result = mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS `messages` (
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `name` varchar(200) not null,
            `subject` varchar(200) not null,
            `phone` VARCHAR(200) NOT NULL,
            `content` TEXT NOT NULL,
            `email` varchar(200) not null
       )";
$result = mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS `admins`(
`id` INT PRIMARY KEY AUTO_INCREMENT,
`name` varchar(200) not null,
`email` varchar(200) not null,
`password` VARCHAR(200) NOT NULL
)";

$result = mysqli_query($conn, $sql);

// $sql = "INSERT INTO `majors` (`title`, `image`) VALUES 
// ('Cardiology', '1.jpg'),
// ('Orthopedic Surgery', '2.jpg'),
// ('Pediatrics', '3.jpg'),
// ('Medical Oncology', '4.jpg'),
// ('Dermatology', '5.jpg'),
// ('Endocrinology', '6.jpg'),
// ('Gynecology', '8.jpg'),
// ('Ophthalmology', '7.jpg') ";
// $result = mysqli_query($conn, $sql);


// $sql =  "INSERT INTO `doctors` (`name`, `image`, `location`, `description`, `major_id`) VALUES 
// ('DR. Sara Hassan', '04.jpg', 'Alexandria', 'DR Sara is a consultant in Cardiovascular diseases with fifteen years of experience', 1),
// ('DR. Omar Youssef', '02.jpg', 'Cairo', 'DR Omar specialist in Orthopedic Surgery with eight years of experience', 2),
// ('DR. Mona Saeed', '06.jpg', 'Giza', 'DR Mona is an expert in Orthopedic Surgery with twelve years of experience', 2),
// ('DR. Khaled Nabil', '01.jpg', 'Aswan', 'DR Khaled is a renowned Pediatrician with over twenty years of practice', 3),
// ('DR. Laila Samir', '09.jpg', 'Mansoura', 'DR Laila specializes in Dermatology with extensive knowledge in skin care', 5),
// ('DR. Hisham Fahmy', '05.jpg', 'Tanta', 'DR Hisham is a well-known Endocrinologist focusing on diabetes management', 6),
// ('DR. Rania Magdy', '08.jpg', 'Suez', 'DR Rania is a Gynecologist with over ten years of experience in women\'s health', 7),
// ('DR. Tarek Ismail', '03.jpg', 'Fayoum', 'DR Tarek is an Ophthalmologist specializing in eye surgeries and treatments', 8),
// ('DR. Nourhan Adel', '010.jpg', 'Sharm El-Sheikh', 'DR Nourhan is a well-experienced with a focus on Medical Oncology', 4)";
// $result = mysqli_query($conn, $sql);

// $sql = "INSERT INTO `doctors` (`name`, `image`, `location`, `description`, `major_id`) VALUES (
//          'DR. Hamza Ahmed', '07.jpg', 'Giza', 'DR Ahmed is a specialist in medical oncology with ten years of experience', 5
//     )";

// $result = mysqli_query($conn, $sql);
// $sql = "INSERT INTO `appointments` ( `status`, `doctor_id`, `patient_id`) VALUES 
// ('yes', 1, 7),
// ('no',3 , 7)";
// $result = mysqli_query($conn, $sql);
// $sql = "INSERT INTO `appointments` ( `status`, `doctor_id`, `patient_id`) VALUES 
// ('yes', 5, 7),
// ('no',9 , 7)";
// $result = mysqli_query($conn, $sql);