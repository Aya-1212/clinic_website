<?php require_once ROOT_PATH . "include/header.php"; ?>
<?php require_once ROOT_PATH . "include/navbar.php"; ?>
<?php require_once ROOT_PATH . "include/sidebar.php"; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-8 mx-auto">
                <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                    Leave Message !
                </h1>
                <form class="form border p-3" method="POST" action="<?php echo url("insert_message"); ?>">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Content</label>
                        <textarea name="content" rows="7" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" >Phone</label>
                        <input type="tel" name="phone" class="form-control" >
                    </div>
    
                    <div class="mb-3">
                        <input type="submit" value="Add Comment! " class="form-control text-white bg-primary">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once ROOT_PATH . "include/footer.php"; ?>