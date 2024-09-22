<?php require_once ROOT_PATH . 'include/header.php'; ?>
<?php require_once ROOT_PATH . 'include/navbar.php'; ?>
<?php require_once ROOT_PATH . 'include/sidebar.php'; ?>

<?php
$sql = "SELECT appointments.*, doctors.name AS d_name , patients.name AS p_name FROM `appointments` 
INNER JOIN `doctors` ON appointments.doctor_id = doctors.id
 INNER JOIN `patients` ON appointments.patient_id = patients.id; ";
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
          <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Appointments</h1>
          <p class="font-weight-normal" style="font-size: 1.2em;">List of all scheduled appointments</p>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Appointments -->
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
              <h3 class="card-title text-center" style="font-size: 1.5em;">Appointments</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm  table-bordered border-primary " style="width: 100%; border: 1px solid #ddd;">
                <thead>
                  <tr>
                    <th style="text-align: center;  word-wrap: break-word; ">Id</th>
                    <th style="text-align: center;  word-wrap: break-word; ">Time</th>
                    <th style="text-align: center; word-wrap: break-word;">Status</th>
                    <th style="text-align: center;  word-wrap: break-word;">Patient Name</th>
                    <th style="text-align: center;  word-wrap: break-word;">Doctor Name</th>
                    <th style="text-align: center; width: 40px;  word-wrap: break-word; ">Reject</th>
                    <th style="text-align: center; width: 40px;  word-wrap: break-word; ">Edit</th>

                  </tr>
                </thead>
                <tbody>
                  <?php while($appointment=mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $appointment['id']; ?></td>
                    <td style="text-align: center;"><?php echo $appointment['time']; ?></td>
                    <td style="text-align: center;"><?php echo $appointment['status']; ?></td>
                    <td style="text-align: center;"><?php echo $appointment['p_name']; ?></td>
                    <td style="text-align: center;"><?php echo $appointment['d_name']; ?></td>
                    <td style="text-align: center;">
                      <a href="<?php echo url("reject-appointment&id=".$appointment['id']); ?>" class="btn btn-danger">Reject</a>
                    </td>
                    <td style="text-align: center;">
                      <a href="<?php echo url("edit-appointment&id=".$appointment['id']); ?>" class="btn btn-success">Edit</a>
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
  <!-- end appointments -->

</div>
<!-- /.content-wrapper -->
<?php require_once ROOT_PATH . 'include/footer.php'; ?>
