<?php require_once ROOT_PATH . 'include/header.php'; ?>
<?php require_once ROOT_PATH . 'include/navbar.php'; ?>
<?php require_once ROOT_PATH . 'include/sidebar.php'; ?>

<?php 
  $sql = "SELECT * FROM `majors`";
  $result = mysqli_query($conn, $sql); 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 text-center">
          <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Majors</h1>
          <p class="font-weight-normal" style="font-size: 1.2em;">List of all registered majors</p>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Majors -->
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center" style="font-size: 1.5em;">Majors</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm table-bordered border-primary " style="width: 100%; border: 1px solid #ddd;">
                <thead>
                  <tr>
                    <th style="width: 10%; text-align: center; padding: 10px;">Id</th>
                    <th style="width: 20%; text-align: center; padding: 10px;">Title</th>
                    <th style="width: 30%; text-align: center; padding: 10px;">Image</th>
                    <th style="width: 20%; text-align: center; padding: 10px;">Delete</th>
                    <th style="width: 20%; text-align: center; padding: 10px;">Edit</th>

                  </tr>
                </thead>
                <tbody>
                  <?php while($major = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td style="text-align: center; word-wrap: break-word;"><?php echo $major['id']; ?></td>
                    <td style="text-align: center; word-wrap: break-word;"><?php echo $major['title']; ?></td>
                    <td style="text-align: center;">
                      <img src="<?php echo "../public/images/majors/" . $major['image']; ?>" alt="major" class="img-fluid " height="100" width="120">
                    </td>
                    <td style="text-align: center;">
                      <a href="<?php echo url("deleteMajor&id=" . $major['id']); ?>" class="btn btn-danger">Delete</a>
                    </td>
                    <td style="text-align: center;">
                      <a href="<?php echo url("edit-major&id=" . $major['id']); ?>" class="btn btn-success">Edit</a>
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
  <!-- end majors -->

</div>
<?php require_once ROOT_PATH . "include/footer.php"; ?>
