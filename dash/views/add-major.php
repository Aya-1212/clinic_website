<?php require_once "../include/header.php"; ?>
<?php require_once "../include/navbar.php"; ?>
<?php require_once "../include/sidebar.php"; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-8 mx-auto">
                <h1 class="text-center p-3 my-2">
                    Add Major
                </h1>
                <form class="form border p-3" method="POST" action="#">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Save" class="form-control text-white bg-success">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once "../include/footer.php"; ?>