<?php
include 'assets/includes/header.php';
checkLoginStatus();
include 'assets/includes/sidebar.php';
include 'assets/includes/navbar.php';
if(!isset($_GET['id'])) {
    header('location: ./');
}
if(isset($_POST['edit'])) {
    editBlog($_GET['id']);
}
?>
<div class="row py-5">
    <div class="col-12 col-xl-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="container-fluid">
                <form action="" method="POST" class="bg-white p-4">
                    <?php
                        $blog_details = getSingleBlogById($_GET['id']);
                        foreach($blog_details as $blog_detail) {
                    ?>
                        <div class="form-group">
                            <label>Posted On</label>
                            <input type="text" class="form-control mb-3" readonly value="<?php echo date('d M Y', strtotime($blog_detail['posted_on'])); ?>">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control mb-3" value="<?php echo isset($_POST['edit']) && isset($_POST['title']) ? $_POST['title'] : $blog_detail['title'] ?>">
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
                            <input name="url_slug" type="text" class="form-control mb-3" value="<?php echo isset($_POST['edit']) && isset($_POST['url_slug']) ? $_POST['url_slug'] : $blog_detail['url_slug'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" cols="30" rows="20" class="form-control mb-3"><?php echo isset($_POST['edit']) && isset($_POST['content']) ? $_POST['content'] : $blog_detail['content'] ?></textarea>
                        </div>
                    <?php   
                        }
                    ?>
                    <button type="submit" name="edit" class="btn btn-primary">Re-upload</button>
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