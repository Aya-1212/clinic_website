<nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
    <div class="container">
        <div class="navbar-brand">
        <img src="assets/images/logo.png" alt="Logo" style="width: 40px; height: 40px;">
            <a class="fw-bold text-white m-0 text-decoration-none h3" href="<?php echo url("home"); ?>">VCare</a>
        </div>
        <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                <a type="button" class="btn btn-outline-light navigation--button" href="<?php echo url("home"); ?>">Home</a>
                <a type="button" class="btn btn-outline-light navigation--button"
                    href="<?php echo url("major"); ?>">Majors</a>
                <a type="button" class="btn btn-outline-light navigation--button"
                    href="<?php echo url("doctor"); ?>">Doctors</a>

                <?php if (!getsession('auth')):  ?>
                    <a type="button" class="btn btn-outline-light navigation--button" href="<?php echo url("Login"); ?>">login</a>
                <?php else : ?>
                    <a type="button" class="btn btn-outline-light navigation--button" href="<?php echo url("history"); ?>">History</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>