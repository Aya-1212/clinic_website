<?php require_once ROOT_PATH . 'include/header.php'; ?>
<?php require_once ROOT_PATH . 'include/navbar.php'; ?>
<?php require_once ROOT_PATH . 'include/sidebar.php'; ?>

<?php 
  $sql = "SELECT * FROM `patients`";
  $result = mysqli_query($conn, $sql); 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 text-center">
          <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;" >Patients</h1>
          <p class="font-weight-normal" style="font-size: 1.2em;">List of all registered patients</p>
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
              <h3 class="card-title text-center" style="font-size: 1.5em;">Patients</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm" style="table-layout: fixed; width: 100%; border: 1px solid #ddd;">
                <thead>
                  <tr>
                    <th style="width: 10%; text-align: center; padding: 10px;">Id</th>
                    <th style="width: 20%; text-align: center; padding: 10px;">Name</th>
                    <th style="width: 15%; text-align: center; padding: 10px;">Phone</th>
                    <th style="width: 25%; text-align: center; padding: 10px;">Email</th>
                    <th style="width: 20%; text-align: center; padding: 10px;">Password</th>
                    <th style="width: 10%; text-align: center; padding: 10px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($patient = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td style="text-align: center; word-wrap: break-word;"><?php echo $patient['id']; ?></td>
                    <td style="text-align: center; word-wrap: break-word;"><?php echo $patient['name']; ?></td>
                    <td style="text-align: center; word-wrap: break-word;"><?php echo $patient['phone']; ?></td>
                    <td style="text-align: center; word-wrap: break-word;"><?php echo $patient['email']; ?></td>
                    <td style="text-align: center; word-wrap: break-word;"><?php echo $patient['password']; ?></td>
                    <td style="text-align: center;">
                      <a href="<?php echo url('deletePatients&id=' . $patient['id']); ?>" class="btn btn-danger">Delete</a>
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
