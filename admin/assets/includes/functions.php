<?php
require 'assets/includes/db.php';

function getAllBlogPosts() {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT `id`, `title`, `posted_on` FROM `blog_post`");
    $stmt->execute();

    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            $row = $result->fetch_assoc();
            if($row) {
                array_push($rows, $row);                
            }
            return $rows;
        }
    }
}

function getSingleBlogById($id) {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT blog_post.url_slug, blog_post.title, blog_post.posted_on, blog_post.content, categories.category_name FROM `blog_post` JOIN `categories` ON categories.id = blog_post.category_id WHERE blog_post.id = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            $row = $result->fetch_assoc();
            if($row) {
                array_push($rows, $row);                
            }
            return $rows;
        }
    }
}


function editBlog() {
    $title = $url_slug = $content = null;
    global $formErrors;
    $formErrors = array();

    if(strlen($url_slug) > 100) {
        array_push($formErrors, 'Err1');
        echo '<script>alert("SUCCESS: Changes have been made to the blog post!</script>")';
    }

    if(empty($formErrors)) {
        global $conn;
        $title = $_POST['title'];
        $url_slug = $_POST['url_slug'];
        $content = $_POST['content'];

        $stmt = $conn->prepare("UPDATE `blog_post` SET `title` = ?, `url_slug` = ?, `content` = ?");
        $stmt->bind_param('sss', $title, $url_slug, $content);
        $stmt->execute();

        if($stmt) {
            echo '<script>alert("SUCCESS: Changes have been made to the blog post!")</script>';
        }
    }
}


function addBlog() {
    // $title = $url_slug = $content = null;
    // global $formErrors;
    // $formErrors = array();

    

    // if(empty($formErrors)) {
    //     global $conn;
    //     $title = $_POST['title'];
    //     $url_slug = $_POST['url_slug'];
    //     $content = $_POST['content'];

    //     // $name = $_FILES['title'];
    //     // $name = $_FILES['title'];
    //     // $name = $_FILES['title'];
    //     // $name = $_FILES['title'];

    //     $stmt = $conn->prepare("INSERT INTO `blog_post`(`title`, `url_slug`, `content`) VALUES(?, ?, ?)");
    //     $stmt->bind_param('sss', $title, $url_slug, $content);
    //     $stmt->execute();

    //     if($stmt) {
            
    //     }
    // }
}
?>