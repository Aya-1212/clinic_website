<?php require_once ROOT_PATH . 'include/header.php'; ?>
<?php require_once ROOT_PATH . 'include/navbar.php'; ?>
<?php require_once ROOT_PATH . 'include/sidebar.php'; ?>
<?php
$sql = "SELECT * FROM `messages`";
$result = mysqli_query($conn, $sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 text-center">
          <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Messages</h1>
          <p class="font-weight-normal" style="font-size: 1.2em;">All messages sent by users</p>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Messages -->
  <section class="content">
    <div class="container-fluid">
<<<<<<< HEAD
      <div class="container-fluid">
        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success text-center">
            <?php echo $_SESSION['success']; ?>
            <?php unset($_SESSION['success']); ?>
          </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-12">
            <?php if (isNotEmpty($sql)): ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title text-center" style="font-size: 1.5em;">Messages</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-sm" style="width: 100%; border: 1px solid #ddd;">
                    <thead>
                      <tr>
                        <th style="text-align: center;">Id</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Subject</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Phone</th>
                        <th style="text-align: center;">Content</th>
                        <th style="text-align: center; width: 40px;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($message = mysqli_fetch_assoc($result)): ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $message['id']; ?></td>
                          <td style="text-align: center;"><?php echo $message['name']; ?></td>
                          <td style="text-align: center;"><?php echo $message['subject']; ?></td>
                          <td style="text-align: center;"><?php echo $message['email']; ?></td>
                          <td style="text-align: center;"><?php echo $message['phone']; ?></td>
                          <td style="text-align: center;"><?php echo $message['content']; ?></td>
                          <td style="text-align: center;">
                            <a href="<?php echo url("delete_message&id=" . $message['id']); ?>" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            <?php else: ?>
              <div class="container">
                <div class="container-fluid bg-light py-5">
                  <div class="col-md-6 m-auto text-center">
                    <section class="content-header">
                      <div class="container-fluid">
                        <div class="row mb-2">
                          <div class="col-sm-6">
                            <h2>No Messages Until Now</h2>
                          </div>
                        </div>
                      </div><!-- /.container-fluid -->
                    </section>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
  </section>
  <!-- end messages -->

</div>
<?php require_once ROOT_PATH . 'include/footer.php'; ?>