<?php
if (getsession ('auth')){
    redirect("home");
}
?>
<?php require_once ROOT_PATH . 'inc/header.php'; ?>
<div class="page-wrapper">
    <?php require_once ROOT_PATH . 'inc/nav.php'; ?>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo url("home"); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
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
            <form class="form" action="<?php echo url("handelRegister"); ?>" method="POST">
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name ="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name ="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name ="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" class="form-control" id="password" name ="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create account</button>
            </form>
            <div class="d-flex justify-content-center gap-2">
                <span>already have an account?</span><a class="link" href="<?php echo url("Login") ?>"> login</a>
            </div>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>