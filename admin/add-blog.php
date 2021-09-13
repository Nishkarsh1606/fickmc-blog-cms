<?php
include 'assets/includes/header.php';
checkLoginStatus();
include 'assets/includes/sidebar.php';
include 'assets/includes/navbar.php';
if(isset($_POST['add'])) {
    addBlog();
}
?>
<div class="row py-5">
    <div class="col-12 col-xl-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="container-fluid">
                <form action="" method="POST" class="bg-white p-4" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Posted On</label>
                            <input type="text" class="form-control mb-3" readonly value="<?php echo date('d M Y'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control mb-3" value="<?php echo isset($_POST['add']) && isset($_POST['title']) ? $_POST['title'] : null ?>">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-select mb-3" name="categories">
                                <option selected disabled value="">View categories</option>
                                <?php
                                    $categories = getCategories();
                                    foreach($categories as $category) {
                                ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo ucwords($category['category_name']); ?></option>
                                <?php    
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>URL Slug</label>
                            <input name="url_slug" type="text" class="form-control mb-3" value="<?php echo isset($_POST['add']) && isset($_POST['url_slug']) ? $_POST['url_slug'] : null ?>">
                        </div>
                        <div class="form-group">
                            <label>Upload File</label>
                            <input name="header_image" type="file" class="form-control mb-3" value="<?php echo isset($_POST['add']) && isset($_POST['header_image']) ? $_POST['header_image'] : null ?>">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" cols="30" rows="20" class="form-control mb-3"><?php echo isset($_POST['add']) && isset($_POST['content']) ? $_POST['content'] : null ?></textarea>
                        </div>
                    <button type="submit" name="add" class="btn btn-primary">Upload Blog</button>
                </form>
            </div>
            </div>


        </div>
    </div>

</div>
</div>
<?php
    include 'assets/includes/footer.php'
?>