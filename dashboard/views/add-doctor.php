<?php require_once ROOT_PATH . "include/header.php"; ?>
<?php require_once ROOT_PATH . "include/navbar.php"; ?>
<?php require_once ROOT_PATH . "include/sidebar.php"; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-8 mx-auto">
                <h1 class="text-center p-3 my-2">
                    Add Doctor
                </h1>
                <form class="form border p-3" method="POST" action="#">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Location</label>
                        <input type="url" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="7" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Major</label>
                        <select name="category_id" id="">
                            <option value="Major">major1</option>
                            <option value="Major">major2</option>
                            <option value="Major">major3</option>
                            <option value="Major">major4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Save" class="form-control text-white bg-success">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once ROOT_PATH . "include/footer.php"; ?>