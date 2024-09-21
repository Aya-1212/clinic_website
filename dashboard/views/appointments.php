<?php require_once ROOT_PATH . 'include/header.php'; ?>
<?php require_once ROOT_PATH . 'include/navbar.php'; ?>
<?php require_once ROOT_PATH . 'include/sidebar.php'; ?>

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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center" style="font-size: 1.5em;">Appointments</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm" style="width: 100%; border: 1px solid #ddd;">
                <thead>
                  <tr>
                    <th style="text-align: center;">Id</th>
                    <th style="text-align: center;">Time</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Patient ID</th>
                    <th style="text-align: center;">Doctor ID</th>
                    <th style="text-align: center; width: 40px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: center;">WRITE HERE</td>
                    <td style="text-align: center;"><div>WRITE HERE</div></td>
                    <td style="text-align: center;">WRITE HERE</td>
                    <td style="text-align: center;">WRITE HERE</td>
                    <td style="text-align: center;">
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;">2</td>
                    <td style="text-align: center;">WRITE HERE</td>
                    <td style="text-align: center;"><div>WRITE HERE</div></td>
                    <td style="text-align: center;">WRITE HERE</td>
                    <td style="text-align: center;">WRITE HERE</td>
                    <td style="text-align: center;">
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                 
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
