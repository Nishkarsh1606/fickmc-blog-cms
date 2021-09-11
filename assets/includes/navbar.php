    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="./">FIC KIRORIMAL</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="./">Home</a>
            </li>
            <?php
              $categories = getAllCategories();
              foreach($categories as $category) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a>
            </li>
            <?php  }
            ?>           
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="./">FIC KIRORIMAL</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="./">Home</a>
            </li>
             <?php
              $categories = getAllCategories();
              foreach($categories as $category) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a>
            </li>
            <?php  }
            ?>                           
          </ul>
        </div>
      </div>
    </nav>