<?php
  include 'assets/includes/header.php';
  checkLoginStatus();
  include 'assets/includes/sidebar.php';
  include 'assets/includes/navbar.php';
?>
<div class="row py-5">
    <div class="col-12 col-xl-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0 text-success" style="cursor: pointer" onclick="addCategory()">Add category</h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-bottom" scope="col">#</th>
                                    <th class="border-bottom" scope="col">Title</th>
                                    <th class="border-bottom" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $categories = getCategories();
                                $i = 0;
                                foreach($categories as $category) {
                                    $i++;
                                    $id = $category["id"];
                            ?>
                                <tr>
                                    <th class="fw-bolder text-gray-900" scope="row">
                                       <?php echo $i; ?>
                                    </th>
                                    <td class="fw-bolder text-gray-900" scope="row">
                                       <?php echo ucwords($category['category_name']); ?>
                                    </td>
                                    <td class="fw-bolder text-gray-900">
                                        <div class="row">
                                            <div class="col"><a href="#" onclick="deleteType('category', <?php echo $id; ?>)"><svg style="width:24px;height:24px" class="text-danger" viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg></a></div>
                                            <div class="col"><a href="#" onclick="editCategory(<?php echo $id; ?>)"><svg style="width:24px;height:24px" class="text-warning" viewBox="0 0 24 24"><path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg></a></div>
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
    function addCategory() {
        var name = window.prompt('Please enter the name of the category you want to create:');
        jQuery.ajax({
            type: 'post',
            url: 'add-category.php',
            data: 'name='+name,
            success: function(result) {
                if(result == 'success') {
                    alert('SUCCESS: A category has been added!');
                    location.reload();
                } else {
                    alert('An error occurred while adding a category!');
                }
            }
        });
    }
    function deleteType(type, id) {
        var confirmation = window.confirm('Are you sure you want to delete this category?');
        if(confirmation == true) {
            window.location.href = 'delete.php?type='+type+'&id='+id;
        }
    }

    function editCategory(id_category) {
        var name = window.prompt('Please rename your category:');
        jQuery.ajax({
            type: 'post',
            url: 'update-category.php',
            data: 'name='+name+'&id='+id_category,
            success: function(result) {
                if(result == 'success') {
                    alert('SUCCESS: The category has been renamed!');
                    location.reload();
                } else {
                    alert('An error occurred while renaming a category!');
                }
            }
        });
    }
</script>