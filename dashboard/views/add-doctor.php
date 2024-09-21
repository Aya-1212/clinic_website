<?php require_once ROOT_PATH . "include/header.php"; ?>
<?php require_once ROOT_PATH . "include/navbar.php"; ?>
<?php require_once ROOT_PATH . "include/sidebar.php";
?>

<?php

$sql = " SELECT * FROM `majors` ";
$result = mysqli_query($conn, $sql);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-8 mx-auto">
                <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                    Add Doctor
                </h1>
                <form class="form border p-3" method="POST" action="<?php echo url("add_doctor"); ?>">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Location</label>
                        <input type="url" name="location" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="7" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Major</label>
                        <select name="major_id">
                            <?php while ($major = mysqli_fetch_assoc($result)): ?>
                                <option value="<?php echo $major['id']; ?>"><?php echo $major['title']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image">Upload Image</label> <!-- القسم الجديد -->
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add " class="form-control text-white bg-success">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once ROOT_PATH . "include/footer.php"; ?>