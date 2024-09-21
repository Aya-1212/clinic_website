<?php



$conn = mysqli_connect("localhost", "root", "", "clinic");

if (!$conn) {
    echo "Connect error: " . mysqli_connect_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])) {

    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $subject = sanitize($_POST['subject']);
    $content = sanitize($_POST['content']);
    $phone = sanitize($_POST['phone']);

    


    // إدخال المنتج في قاعدة البيانات
    $sql = "INSERT INTO `messages` (`name`, `email`, `subject`, `content`, `phone`) VALUES 
    ('$name', '$email', '$subject', '$content' , '$phone')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['success'] = "Thanks For Your Comment!";
    }

    // Redirection
   redirect("table-messages");
}
?>
