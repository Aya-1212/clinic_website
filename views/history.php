<?php
if (getsession ('auth')){
    redirect("home");
}
// if (!getsession ('auth')){
//     redirect("home");
// }
// dd($_SESSION['auth']);
// die;
?>
<?php require_once ROOT_PATH . 'inc/header.php'; ?>
<div class="page-wrapper">
    <?php require_once ROOT_PATH . 'inc/nav.php'; ?>
    
   <?php
//     $_SESSION['auth']['id'] = $id;
//    if (getsession($_SESSION['auth']['id'])){
//    $sql = "SELECT majors.title, doctors.*, appointments.status, appointments.id AS app_id,
//     appointments.time FROM `majors` INNER JOIN `doctors` ON majors.id = doctors.major_id
//      INNER JOIN `appointments` ON doctors.id = appointments.doctor_id 
//    INNER JOIN `patients` ON appointments.patient_id = patients.id where patient_id = $id
//       ";
$sql = "SELECT majors.title, doctors.*, appointments.status, appointments.id AS app_id,
    appointments.time FROM `majors` INNER JOIN `doctors` ON majors.id = doctors.major_id
     INNER JOIN `appointments` ON doctors.id = appointments.doctor_id 
      ";
      $result = mysqli_query($conn, $sql);
  // }
       ?>


    <div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo url("home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">history</li>
        </ol>
    </nav>
   <?php  // if (check($sql)):?>
   
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Appointments</th>
                <th scope="col">Date</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">major</th>
                <th scope="col">location</th>
                <th scope="col">completed</th>
            </tr>
        </thead>
       
        <tbody>
              <?php while ($histoy = mysqli_fetch_assoc($result)): ?>
            <tr>
               
                <th scope="row"><?php echo $histoy['app_id'];?></th>
                <td><?php echo $histoy['time'];?></td>
                <td class="d-flex align-items-center gap-2"><img src="<?php echo BASE_URL . "public/images/doctors/" . $histoy['image']; ?>" alt="" width="25"
                        height="25" class="rounded-circle">
                    <a href="<?php echo url("doctor-profile&doctor_id=". $histoy['id'] ); ?>"><?php echo $histoy['name'];?></a>
                </td>
                <td><?php echo $histoy['title'];?></td>
                <td><a href="https://www.google.com/maps" target="_blank"><?php echo $histoy['location'];?></a></td>
                <td><?php echo $histoy['status'];?></td>
            </tr>
          <?php endwhile; ?> 
      
          
        </tbody>
    </table>
    <?php 
   // else: 
     ?> 
    
    
     <!-- <div class="container">
        <div class="container-fluid bg-light py-5">
            <div class="col-md-6 m-auto text-center">
                <h1 class="display-2">History is Empty</h1>
               
            </div>
        </div>
    </div>
     -->

   
    <?php // endif; ?>
    </div>
</div>



<?php require_once ROOT_PATH . 'inc/footer.php'; ?>