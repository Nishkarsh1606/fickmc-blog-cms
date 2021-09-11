<?php 
include 'assets/includes/header.php';
include 'assets/includes/navbar.php';

if(!isset($_GET['id'])) {
    header('location: ./');
}
?>
    <div class="container mt-5">
        <center><img src="assets/upload/header.jpg" class="img_fluid" alt="" width="80%"></center>  
      <div class="row">
        <?php
        $blogs = getAllBlogPostsByCategory($_GET['id']);
        $i = 0;
        foreach($blogs as $blog) {
            $i++;
            if($i == 1) {
                echo "<div class='col-lg-8 col-md-10 mx-auto'><strong><u>Category: ".$blog['category_name']."</u></strong><br>";
            }
        ?>
        
              <!-- POST START #<?php echo $i ?> -->
              <div class="post-preview">
                <a href="<?php echo BLOG_DIR.'.php?id='.$blog['url_slug']; ?>">
                  <h2 class="post-title"><?php echo $blog['title']; ?></h2>
                </a>
                <p class="post-meta">
                    Posted on <?php echo date('d M Y', strtotime($blog['posted_on'])) ?><br>
                    <small>Category: <?php echo $blog['category_name']; ?></small>
                </p>
              </div><hr>
          <?php  }
          ?>
      </div>
    </div>
<?php include 'assets/includes/footer.php'; ?>