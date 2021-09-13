<?php 
include 'assets/includes/header.php';
include 'assets/includes/navbar.php';
?>

    
    <header class="masthead" style="background-image: url('assets/upload/907379_09e1a620_0f45_4335_b34f_555eeae63c31.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>FIC KIRORIMAL COLLEGE</h1>
              <span class="subheading">Blog by FIC</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <?php
            $blogs = getAllBlogPosts();
            $i = 0;
            foreach($blogs as $blog) {
              $i++;
          ?>
              <!-- POST START #<?php echo $i ?> -->
              <div class="post-preview">
                <a href="<?php echo BLOG_DIR.'.php?id='.$blog['url_slug']; ?>">
                  <h2 class="post-title"><?php echo $blog['title']; ?></h2>
                </a>
                <p class="post-meta">
                  Posted on <?php echo date('d M Y', strtotime($blog['posted_on'])) ?><br>
                  <small>CATEGORY: <?php echo $blog['category_name']; ?></small>
                </p>
              </div><hr>
          <?php  }
          ?>
      </div>
    </div>
<?php include 'assets/includes/footer.php'; ?>