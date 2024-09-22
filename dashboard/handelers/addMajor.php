<?php



$conn = mysqli_connect("localhost", "root", "", "clinic");

if (!$conn) {
    echo "Connect error: " . mysqli_connect_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])) {

    $name = sanitize($_POST['name']);

     $image = sanitize($_POST['image']);



    // insert into DB
    $sql = "INSERT INTO `majors` (`title`, `image`) VALUES 
    ('$name','$image')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['success'] = "Major Added Successfully!";
    }

    // Redirection
   redirect("table-majors");
}
?>
