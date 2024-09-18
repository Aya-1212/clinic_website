
<?php require_once ROOT_PATH . 'inc/header.php'; ?>
<?php
if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $sql = "SELECT * FROM `doctors` WHERE `id` = $id";
 
  if (check($sql)) {
    $doctor = getRow("doctors",$id);
  } else {
    redirect("error");
  }
}
?>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
  integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>

<div class="page-wrapper">
  <?php require_once ROOT_PATH . 'inc/nav.php'; ?>
  <div class="container">
    <nav
      style="--bs-breadcrumb-divider: '>'"
      aria-label="breadcrumb"
      class="fw-bold my-4 h4">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="<?php echo url("home"); ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="<?php echo url("doctor"); ?>">doctors</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          doctor name
        </li>
      </ol>
    </nav>

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
          <h6 class="card-title fw-bold">
            <?php echo $doctor['description']; ?>
          </h6>
        </div>
      </div>
      <hr />
     
      <form class="form">
        <div class="form-items">
          <div class="mb-3">
            <label class="form-label required-label" for="name">Name</label>
            <input type="text" class="form-control" id="name" required />
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="phone">Phone</label>
            <input type="tel" class="form-control" id="phone" required />
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" required />
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
          Confirm Booking
        </button>
      </form>
    </div>
  </div>

</div>


<script>
  const stars = document.querySelectorAll(".star");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      const isActive = star.classList.contains("active");
      if (isActive) {
        star.classList.remove("active");
      } else {
        star.classList.add("active");
      }
      for (let i = 0; i < index; i++) {
        stars[i].classList.add("active");
      }
      for (let i = index + 1; i < stars.length; i++) {
        stars[i].classList.remove("active");
      }
    });
  });
</script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
  integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>
<?php require_once ROOT_PATH . 'inc/footer.php'; ?>