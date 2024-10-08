<?php
if (!getsession('admin_auth')) {
  redirect("login");
}
?>
<?php require_once ROOT_PATH . 'include/header.php'; ?>
<?php require_once ROOT_PATH . 'include/navbar.php'; ?>
<?php require_once ROOT_PATH . 'include/sidebar.php'; ?>

<?php
$sql = "SELECT doctors.*, majors.title AS major FROM `doctors`
INNER JOIN `majors` ON doctors.major_id = majors.id
";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (check($sql)) {
        $sql = "SELECT doctors.*, majors.title AS major FROM `doctors`
        INNER JOIN `majors` ON doctors.major_id = majors.id
        WHERE majors.id = $id";
    } else {
        redirect("error");
        die;
    }
}

$result = mysqli_query($conn, $sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Doctors</h1>
                    <p class="font-weight-normal" style="font-size: 1.2em;">List of all registered doctors</p>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <!-- Doctors -->
    <section class="content">
        <div class="container-fluid">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['success']; ?>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $_SESSION['errors']; ?>
                    <?php unset($_SESSION['errors']); ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12"> 
                    <!-- Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center" style="font-size: 1.5em;">Doctors</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm  table-bordered border-primary " style="table-layout: fixed; width: 100%; border: 1px solid #ddd;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align: center; padding: 10px;">Id</th>
                                        <th style="width: 20%; text-align: center; padding: 10px;">Name</th>
                                        <th style="width: 20%; text-align: center; padding: 10px;">Description</th>
                                        <th style="width: 15%; text-align: center; padding: 10px;">Location</th>
                                        <th style="width: 15%; text-align: center; padding: 10px;">Image</th>
                                        <th style="width: 15%; text-align: center; padding: 10px;">Major Name</th>
                                        <th style="width: 10%; text-align: center; padding: 10px;">Delete</th>
                                        <th style="width: 10%; text-align: center; padding: 10px;">Edit</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while ($doctor = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td style="text-align: center; word-wrap: break-word;"><?php echo $doctor['id']; ?></td>
                                        <td style="text-align: center; word-wrap: break-word;"><?php echo $doctor['name']; ?></td>
                                        <td style="text-align: center; word-wrap: break-word;"><?php echo $doctor['description']; ?></td>
                                        <td style="text-align: center; word-wrap: break-word;"><?php echo $doctor['location']; ?></td>
                                        <td style="text-align: center;">
                                            <img src="<?php echo "../public/images/doctors/" . $doctor['image']; ?>" alt="doctor"
                                                 class="img-fluid "
                                                 height="150"
                                                 width="150">
                                        </td>
                                        <td style="text-align: center; word-wrap: break-word;"><?php echo $doctor['major']; ?></td>
                                        <td style="text-align: center;"> 
                                            <a href="<?php echo url("deleteDoctor&id=" . $doctor['id']); ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                        <td style="text-align: center;"> 
                                            <a href="<?php echo url("edit-doctor&id=" . $doctor['id']); ?>" class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- end doctors -->
</div>
<!-- /.content-wrapper -->

<?php require_once ROOT_PATH . 'include/footer.php'; ?>
