<?php
    include 'assets/includes/header.php';
    include 'assets/includes/sidebar.php';
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
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table user-table bg-white">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">POSTED ON</th>
                                <th class="border-top-0">TITLE</th>
                                <th class="border-top-0">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $blog_details = getAllBlogPosts();
                            $i = 0;
                            foreach($blog_details as $blog_detail) {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($blog_detail['posted_on'])) ?></td>
                                <td><?php echo $blog_detail['title']; ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="edit.php?id=<?php echo $blog_detail['id']; ?>">
                                                <svg style="width:24px;height:24px" class="text-warning" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="#?" onclick="confirmDeletion('<?php echo $blog_detail['id']; ?>')">
                                                <svg style="width:24px;height:24px" class="text-danger" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                            </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                function confirmDeletion(id) {
                    var confirmation = window.confirm('Are you sure you want to delete this blog?');
                    if(confirmation == true) {
                        window.location.href = 'delete.php?id='+id;
                    }
                }
            </script>
<?php
    include 'assets/includes/footer.php'
?>