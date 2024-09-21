<?php



$conn = mysqli_connect("localhost", "root", "", "clinic");

if (!$conn) {
    echo "Connect error: " . mysqli_connect_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'])) {

    $name = sanitize($_POST['name']);

     $image = sanitize($_POST['image']);



        // التعامل مع رفع الصورة
    // تأكد من أن الصورة تُرفع بشكل صحيح
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imageName = $_FILES['image']['name']; // هذا هو اسم الملف الأصلي
    $imageTmpName = $_FILES['image']['tmp_name']; // الموقع المؤقت للملف على السيرفر
    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION)); // استخراج الامتداد

    $allowedExt = array('jpg', 'jpeg', 'png', 'gif');

    // تحقق من أن الامتداد مسموح به
    if (in_array($imageExt, $allowedExt)) {
        $imageNewName = uniqid('', true) . "." . $imageExt;
       var_dump( $imageUploadPath = ROOT_PATH . "/uploads/" . $imageNewName);

        // حاول رفع الملف إلى المسار المحدد
        if (move_uploaded_file($imageTmpName, $imageUploadPath)) {
            $imagePathForDB = "/uploads/" . $imageNewName;
        } else {
            echo "Error uploading the image.";
            exit;
        }
    } else {
        echo "Invalid image type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }
} else {
    $imagePathForDB = null; // إذا لم يتم رفع الصورة
}




    // إدخال المنتج في قاعدة البيانات
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
