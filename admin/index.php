<?php
  include 'assets/includes/header.php';
  checkLoginStatus();
  include 'assets/includes/sidebar.php';
  include 'assets/includes/navbar.php';
?>
<div class="row py-5">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Total Users</h2>
                            <h3 class="fw-extrabold mb-1">wsc</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Total Users</h2>
                            <h3 class="fw-extrabold mb-2">acs</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Since Lifetime
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Total Blogs</h2>
                            <h3 class="mb-1">Rs. asc</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Total Blogs</h2>
                            <h3 class="fw-extrabold mb-2">Rs. asc</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Since Lifetime
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Total Categories</h2>
                            <h3 class="mb-1">asc</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Total Categories</h2>
                            <h3 class="fw-extrabold mb-2">sac</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Total number
                            </svg>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Recent Blogs Uploaded</h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-bottom" scope="col">#</th>
                                    <th class="border-bottom" scope="col">Title</th>
                                    <th class="border-bottom" scope="col">Category</th>
                                    <th class="border-bottom" scope="col">Added On</th>
                                    <th class="border-bottom" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $blogDetails = recentBlogs();
                                $i = 0;
                                foreach($blogDetails as $blogDetail) {
                                    $i++;
                                    $id = $blogDetail["id"];
                            ?>
                                <tr>
                                    <th class="fw-bolder text-gray-900" scope="row">
                                       <?php echo $i; ?>
                                    </th>
                                    <td class="fw-bolder text-gray-900" scope="row">
                                       <?php echo $blogDetail['title']; ?>
                                    </td>
                                    <td class="fw-bolder text-gray-900" scope="row">
                                       <?php echo $blogDetail['category_name']; ?>
                                    </td>
                                    <td class="fw-bolder text-gray-900">
                                       <?php echo date('d M Y', strtotime($blogDetail['posted_on'])); ?>
                                    </td>
                                    <td class="fw-bolder text-gray-900">
                                        <div class="row">
                                            <div class="col"><a href="#" onclick="deleteType('blog', <?php echo $id; ?>)"><svg style="width:24px;height:24px" class="text-danger" viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg></a></div>
                                            <div class="col"><a href="#" onclick="editBlog(<?php echo $id; ?>)"><svg style="width:24px;height:24px" class="text-warning" viewBox="0 0 24 24"><path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg></a></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
</div>
<?php
include 'assets/includes/footer.php';
?>
<script>
    function deleteType(type, id) {
        var confirmation = window.confirm('Are you sure you want to delete this blog?');
        if(confirmation == true) {
            window.location.href = 'delete.php?type='+type+'&id='+id;
        }
    }
    function editBlog(id) {
        window.location.href = 'edit-blog.php?id='+id;
    }
</script>