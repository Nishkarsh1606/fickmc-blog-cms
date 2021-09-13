<?php
require 'assets/includes/functions.php';
checkLoginStatus();
if(isset($_POST['name'])) {
    addCategory($_POST['name']);
} else {
    echo 'error';
    die();
}
?>