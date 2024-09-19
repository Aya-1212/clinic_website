<?php require_once ROOT_PATH . 'inc/header.php'; ?>
<?php
if (isset($_GET['doctor_id'])) {
    $id = $_GET['doctor_id'];

    $sql = "SELECT doctors.*, majors.title AS major FROM `doctors`
    INNER JOIN `majors` ON doctors.major_id = majors.id
    WHERE doctors.id = $id
    ";
    if (check($sql)) {
        $result = mysqli_query($conn, $sql);
        $doctor = mysqli_fetch_assoc($result);
    } else {
        redirect("home");
    }
    
} else {
    redirect("home");
}


?>
<div class="page-wrapper">
    <?php require_once ROOT_PATH . 'inc/nav.php'; ?>
    <div class="container my-2">

        <div class="d-flex flex-column gap-3 details-card doctor-details">
            <div class="details d-flex gap-2 align-items-center">
                <img
                    src="<?php echo BASE_URL . "public/images/doctors/" . $doctor['image']; ?>"
                    alt="doctor"
                    class="img-fluid rounded-circle"
                    height="150"
                    width="150" />
                <div class="details-info d-flex flex-column gap-3">
                    <h4 class="card-title fw-bold"><?php echo $doctor['name']; ?></h4>
                    <h5 class="card-title fw-bold">
                        <?php echo $doctor['major']; ?>
                    </h5>
                </div>
            </div>
            <hr />
            <h6 class="card-title fw-bold">
                <?php echo $doctor['description']; ?>
            </h6>
            <div class="details d-flex gap-2 align-items-center">
                <h5><a href="<?= $doctor['location'] ?>" target="_blank">Location</a></h5>
            </div>
            <a href="<?php echo url("appointment&id=" . $doctor['id']); ?>" class="btn btn-outline-primary card-button">Book an appointment
            </a>
        </div>
    </div>
</div>
<?php require_once ROOT_PATH . 'inc/footer.php'; ?>