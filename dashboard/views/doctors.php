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
WHERE majors.id = $id
";
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
        <div class="col-sm-6">
          <h1>Doctors</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Doctors -->
  <section class="content">
    <div class="container-fluid">
    <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION['success'];?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['errors'];?>
                <?php unset($_SESSION['errors']); ?>
            </div>
        <?php endif; ?>
      <div class="row">
        <div class="col-md-9">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dostors</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Major Name</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($doctor = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td><?php echo $doctor['id']?></td>
                    <td><?php echo $doctor['name']?></td>
                    <td><?php  echo $doctor['description']?></td>
                    <td><?php echo $doctor['location']?></td>
                    <td>
                    <img src="<?php echo "../public/images/doctors/" . $doctor['image']; ?>" alt="doctor"
                    class="img-fluid rounded-circle"
                    height="150"
                    width="150"  >
                   </td>
                    <td><?php echo $doctor['major']?></td>
                    <td><a href="<?php echo url("deleteDoctor&id=".$doctor['id']);?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                 
                <?php endwhile; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

  </section>
</div>
  <!-- end doctors -->
<!-- /.content-wrapper -->
<?php require_once ROOT_PATH . 'include/footer.php'; ?>