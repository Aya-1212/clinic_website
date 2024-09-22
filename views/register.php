<?php
if (getsession('auth')) {
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
            <form class="form" action="<?php echo url("handelRegister"); ?>" method="POST">
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <span class="text-danger"><span class="danger"><?= $_SESSION['errors']['name'] ?? ''; ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                        <span class="text-danger"><span class="danger"><?= $_SESSION['errors']['phone'] ?? ''; ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span class="text-danger"><span class="danger"><?= $_SESSION['errors']['email'] ?? ''; ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="text-danger"><span class="danger"><?= $_SESSION['errors']['password'] ?? ''; ?></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create account</button>
            </form>
            <div class="d-flex justify-content-center gap-2">
                <span>already have an account?</span><a class="link" href="<?php echo url("Login"); ?>"> login</a>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['errors']);
unset($_SESSION['success']);

?>
<?php require_once ROOT_PATH . 'inc/footer.php'; ?>