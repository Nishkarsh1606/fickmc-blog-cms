<?php
include 'assets/includes/header.php';
include 'assets/includes/sidebar.php';
if(!isset($_GET['id'])) {
    header('location: ./');
}
if(isset($_POST['edit'])) {
    editBlog();
}
?>
        
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Edit Blog</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <form action="" method="POST" class="bg-white p-4">
                    <?php
                        $blog_details = getSingleBlogById($_GET['id']);
                        foreach($blog_details as $blog_detail) {
                    ?>
                        <div class="form-group">
                            <label>Posted On</label>
                            <input type="text" class="form-control" readonly value="<?php echo date('d M Y', strtotime($blog_detail['posted_on'])); ?>">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control" value="<?php echo $blog_detail['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label>URL Slug</label>
                            <input name="url_slug" type="text" class="form-control" value="<?php echo $blog_detail['url_slug'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" cols="30" rows="20" class="form-control"><?php echo $blog_detail['content'] ?></textarea>
                        </div>
                    <?php   
                        }
                    ?>
                    <button type="submit" name="edit" class="btn btn-primary">Re-upload</button>
                </form>
            </div>
<?php
    include 'assets/includes/footer.php'
?>