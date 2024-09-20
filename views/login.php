 <?php
    //if (getsession ('auth')){
    // redirect("home");
    //}
    ?>
 <?php require_once ROOT_PATH . 'inc/header.php'; ?>

 <div class="page-wrapper">
     <?php require_once ROOT_PATH . 'inc/nav.php'; ?>
     <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
             <ol class="breadcrumb justify-content-center">
                 <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo url("home"); ?>">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">login</li>
             </ol>
         </nav>
         <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
             <?php
                if (isset($_SESSION['errors'])):
                    foreach ($_SESSION['errors'] as $error): ?>
                     <div class="alert alert-danger text-center">
                         <?php echo $error; ?>
                     </div>
             <?php
                    endforeach;
                    unset($_SESSION['errors']);
                endif;
                ?>
             <form class="form" action="<?php echo url("handelLogin"); ?>" method="POST">

                 <div class="mb-3">
                     <label class="form-label required-label" for="email">Email</label>
                     <input type="email" class="form-control" id="email" name="email" required>
                 </div>
                 <div class="mb-3">
                     <label class="form-label required-label" for="password">password</label>
                     <input type="password" class="form-control" id="password" name="password" required>
                 </div>
                 <button type="submit" class="btn btn-primary">Login</button>
             </form>
             <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                 <span>don't have an account?</span><a class="link" href="<?php echo url("register"); ?>">create account</a>
             </div>
         </div>
     </div>
 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
     integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
     crossorigin="anonymous" referrerpolicy="no-referrer">
 </script>


 <?php require_once ROOT_PATH . 'inc/footer.php'; ?>