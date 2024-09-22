<?php
if (!getsession('admin_auth')) {
  redirect("login");
}
?>
<?php require_once ROOT_PATH . "include/header.php"; ?>
<?php require_once ROOT_PATH . "include/navbar.php"; ?>
<?php require_once ROOT_PATH . "include/sidebar.php"; ?>



<?php

if (isset($_GET['id'])) {
    $status=  [
        "pending" , "completed" , "canceled" 


    ];
    $id = $_GET['id'];

}
else {
    redirect("error");
    die;
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-8 mx-auto">
                <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                    Edit Appointment
                </h1>
                <form class="form border p-3" method="POST" action="<?php echo url("update_appointment&id=".$id); ?>">
                <div class="mb-3">
                        <label for="">Status</label>
                        <br>
                        <select name="status">
                            <?php foreach($status as $value): ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php  endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Update" class="form-control text-white bg-success">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once ROOT_PATH . "include/footer.php"; ?>