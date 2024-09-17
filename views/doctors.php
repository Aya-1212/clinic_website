<?php require_once ROOT_PATH . 'inc/header.php'; ?>
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
<div class="page-wrapper">
    <?php require_once ROOT_PATH . 'inc/nav.php'; ?>
    <div class="container">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo url("home"); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">doctors</li>
            </ol>
        </nav>


        <div class="doctors-grid">
            <?php while ($doctor = mysqli_fetch_assoc($result)): ?>
                <div class="card p-2" style="width: 18rem;">
                <a href="<?= url("doctor-profile&doctor_id=" . $doctor['id']); ?>" class="card-img-top rounded-circle card-image-circle"
                                alt="major">
                                <img src="<?php echo BASE_URL . "public/images/doctors/" . $doctor['image']; ?>" class="card-img-top rounded-circle card-image-circle"
                                alt="major"  >
                                </a>
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                    <a href="<?= url("doctor-profile&doctor_id=" . $doctor['id']);  ?>" class="card-title fw-bold text-center"><h4 class="card-title fw-bold text-center" ><?php echo $doctor['name']; ?></h4></a> 
                    <h6 class="card-title fw-bold text-center"><?php echo ucwords($doctor['major']); ?></h6>
                        <a href="<?php echo url("appointment&id=" . $doctor['id']); ?>" class="btn btn-outline-primary card-button">Book an appointment
                        </a>

                    </div>
                </div>
            <?php endwhile; ?>



        </div>
        <nav class="mt-5" aria-label="navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link page-prev" href="#" aria-label="Previous">
                        <span aria-hidden="true">
                            < </span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link page-next" href="#" aria-label="Next">
                        <span aria-hidden="true"> > </span>
                    </a>
                </li>
            </ul>
        </nav>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
    integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<?php require_once ROOT_PATH . 'inc/footer.php'; ?>