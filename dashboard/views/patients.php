<?php require_once ROOT_PATH . 'include/header.php'; ?>
<?php require_once ROOT_PATH . 'include/navbar.php'; ?>
<?php require_once ROOT_PATH . 'include/sidebar.php'; ?>

<?php 
  $sql = "SELECT * FROM `patients`";
  $result = mysqli_query($conn,$sql); 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Patients</h1>
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
              <h3 class="card-title">Patients</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($patient = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td><?php echo $patient ['id'];?></td>
                    <td><?php echo $patient ['name'];?></td>
                    <td><?php echo $patient ['phone'];?></td>
                    <td><?php echo $patient ['email'];?></td>
                    <td><?php echo $patient ['password'];?></td>
                    <td><a href="<?php echo url("deletePatients&id=".$patient['id']);?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

  </section>
  <!-- end doctors -->


</div>
<!-- /.content-wrapper -->
<?php require_once ROOT_PATH . 'include/footer.php'; ?>