<?php

require_once ROOT_PATH . 'inc/header.php';
require_once ROOT_PATH . 'inc/nav.php';

?>
<div class="page-wrapper">
    <?php require_once ROOT_PATH . 'inc/nav.php'; ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo url("home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">contact</li>
        </ol>
    </nav>
    
    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
        <form class="form" method="POST" action="<?php echo url("send-message"); ?>">
        <div class="text-center">
                <span class="text-success"><?php echo $_SESSION['success'] ?? ''; ?></span>
                </div>
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <span class="text-danger"><?php echo $_SESSION['errors']['name'] ?? ''; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                    <span class="text-danger"><?php echo $_SESSION['errors']['phone'] ?? ''; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <span class="text-danger"><?php echo $_SESSION['errors']['email'] ?? ''; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="subject">subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                    <span class="text-danger"><?php echo $_SESSION['errors']['subject'] ?? ''; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="content">message</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                    <span class="text-danger"><?php echo $_SESSION['errors']['content'] ?? ''; ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</div>


<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['success']); ?>
<?php require_once ROOT_PATH . 'inc/footer.php'; ?>