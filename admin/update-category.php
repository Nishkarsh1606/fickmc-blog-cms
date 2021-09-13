<?php
require 'assets/includes/functions.php';
checkLoginStatus(); 
if(isset($_POST['name']) && isset($_POST['id'])) {
    updateCategory($_POST['name'], $_POST['id']);
} else {
    echo 'error';
    die();
}
?>