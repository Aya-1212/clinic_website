<?php



$conn = mysqli_connect("localhost", "root", "", "clinic");

if (!$conn) {
    echo "Connect error: " . mysqli_connect_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])) {
    $name = sanitize($_POST['name']);

    $phone = sanitize($_POST['phone']);

    $email = sanitize($_POST['email']);

     $password = sanitize($_POST['password']);


    // إدخال المنتج في قاعدة البيانات
    $sql = "INSERT INTO `patients` (`name`, `phone`, `email`, `password`) VALUES 
    ('$name', '$phone', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['success'] = "Patient Added Successfully!";
    }

    // Redirection
   redirect("table-patients");
}
?>
