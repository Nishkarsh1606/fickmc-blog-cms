<?php 
include 'assets/includes/header.php';
include 'assets/includes/navbar.php'; 

if(!isset($_GET['id'])) {
  header('location: ./');
}
?>
  
    <?php
      $blog_details = getBlog($_GET['id']);
      foreach($blog_details as $blog_detail) {
    ?>
      <header class="masthead" style="background-image: url('assets/upload/<?php echo $blog_detail['image']; ?>')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <h1><?php echo $blog_detail['title']; ?></h1>
                <span class="meta">Posted on <u><?php echo date('d M Y', strtotime($blog_detail['posted_on'])); ?></u></span>
              </div>
            </div>
          </div>
        </div>
      </header>
      <article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p><?php echo $commonMark->convertToHtml($blog_detail['content']);?></p>
            </div>
          </div>
        </div>
      </article>
    <?php  }
    ?>

    <hr>

<?php include 'assets/includes/footer.php'; ?>