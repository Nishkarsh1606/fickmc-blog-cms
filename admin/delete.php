<?php
require 'assets/includes/functions.php';
checkLoginStatus();
if(isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];

    if($type == 'blog') {
        deleteBlog($id);
    } else if($type == 'category') {
        deleteCategory($id);
    } else {
        header('location: ./dd');
        exit();
    }
} else {
    header('location: ./');
    exit();
}
?>