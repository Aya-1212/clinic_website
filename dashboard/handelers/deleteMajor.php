<?php
$errors = [];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = " SELECT * FROM `majors` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    if (!$row) {
        $_SESSION['errors'] = "Major Doesn't Exists.";
    } else {
        $sql = "SELECT distinct(major_id) FROM `doctors` WHERE `major_id` = $id";
        if (tableContainsId($sql, $id)) {
            $_SESSION['errors'] = "Can't delete this major.";
        } else {
            $sql = " DELETE FROM `majors` WHERE `id`= '$id' ";
            $result = mysqli_query($conn, $sql);
            $_SESSION['success'] = "Major Deleted Successfully";
        }
    }
    redirect("table-majors");
}
