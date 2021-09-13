<?php
require 'assets/includes/db.php';

session_start();
date_default_timezone_set('Asia/Kolkata');


//session flash
if(isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    echo "<script>alert('$msg')</script>";
    unset($_SESSION['msg']);
}

//check session
function checkLoginStatus() {
    if(!isset($_SESSION['admin'])) {
        header('location: ./login.php');
        exit();
    } else {
        session_regenerate_id();
    }
}


//admin login
function login() {
    $email = $password = null;

    $formErrors = array();


    if(empty($_POST['email'])) {
        array_push($formErrors, 'Err1');
        echo '<script>alert("Please enter your email address!")</script>';
    }

    if(empty($_POST['password'])) {
        array_push($formErrors, 'Err2');
        echo '<script>alert("Please enter your password!")</script>';
    }

    if(empty($formErrors)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email == 'admin@fickmc.in' && $password == 'Nishkarsh306') {
            $_SESSION['admin'] = true;
            header('location: ./');
            exit();
        } else {
            echo '<script>alert("Please enter valid credentials!")</script>';
        }
    }
}


//get all categories
function getCategories() {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT `id`, `category_name` FROM `categories`");
    $stmt->execute();

    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);                
            }
            return $rows;
        }
    }
}

//all blog posts
function getAllBlogPosts() {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT blog_post.id, blog_post.title, categories.category_name, blog_post.posted_on FROM `blog_post` JOIN `categories` ON blog_post.category_id = categories.id ORDER BY blog_post.id DESC");
    $stmt->execute();

    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);                
            }
            return $rows;
        }
    }
}


//top 5 recent blog posts
function recentBlogs() {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT blog_post.id, blog_post.title, categories.category_name, blog_post.posted_on FROM `blog_post` JOIN `categories` ON blog_post.category_id = categories.id ORDER BY blog_post.id DESC LIMIT 5");
    $stmt->execute();

    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);                
            }
            return $rows;
        }
    }
}


//single blog post by id
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

//edit blog
function editBlog($id) {
    $title = $url_slug = $content = $category = null;
    global $formErrors;
    $formErrors = array();

    if(strlen($_POST['url_slug']) > 100) {
        array_push($formErrors, 'Err1');
        echo '<script>alert("ERROR: Url Slug cannot be greater than 100 characters!")</script>';
    }

    if(empty($_POST['title'])) {
        array_push($formErrors, 'Err2');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }

    if(empty($_POST['url_slug'])) {
        array_push($formErrors, 'Err3');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }

    if(empty($_POST['content'])) {
        array_push($formErrors, 'Err4');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }

    if(empty($_POST['categories'])) {
        array_push($formErrors, 'Err5');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }

    if(empty($formErrors)) {
        global $conn;
        $title = $_POST['title'];
        $url_slug = $_POST['url_slug'];
        $content = $_POST['content'];
        $category = $_POST['categories'];

        $stmt = $conn->prepare("UPDATE `blog_post` SET `title` = ?, `url_slug` = ?, `content` = ?, `category_id` = ? WHERE `id` = ?");
        $stmt->bind_param('sssii', $title, $url_slug, $content, $category, $id);
        $stmt->execute();

        if($stmt) {
            echo '<script>alert("SUCCESS: Changes have been made to the blog post!")</script>';
        }
    }
}

//add a blog
function addBlog() {
    $title = $url_slug = $content = $category = $filename = $tmp_name = null;
    global $formErrors;
    $formErrors = array();

    if(empty($_FILES['header_image']['name'])) {
        array_push($formErrors, 'Err1');
        echo '<script>alert("ERROR: Please upload a header image!")</script>';
    } else {
        if($_FILES['header_image']['type'] == 'image/png' || $_FILES['header_image']['type'] == 'image/jpeg' || $_FILES['header_image']['type'] == 'image/jpg') {
        } else {
            array_push($formErrors, 'Err2');
            echo '<script>alert("ERROR: Image can only be of type png, jpeg and jpg!")</script>';
        }
        if($_FILES['header_image']['size'] > 8613288) {
            array_push($formErrors, 'Err3');
            echo '<script>alert("ERROR: Image cannot be more than 8 MB!")</script>';
        }
    }

    if(empty($_POST['title'])) {
        array_push($formErrors, 'Err4');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }

    if(empty($_POST['url_slug'])) {
        array_push($formErrors, 'Err4');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }

    if(empty($_POST['content'])) {
        array_push($formErrors, 'Err4');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }

    if(empty($_POST['categories'])) {
        array_push($formErrors, 'Err4');
        echo '<script>alert("ERROR: Please enter a title!")</script>';
    }
    

    if(empty($formErrors)) {
        global $conn;

        $title = $_POST['title'];
        $url_slug = $_POST['url_slug'];
        $content = $_POST['content'];
        $category = $_POST['categories'];
        $posted_on = date('Y-m-d');

        $filename = $_FILES['header_image']['name'];
        $tmp_name = $_FILES['header_image']['tmp_name'];

        $stmt = $conn->prepare("INSERT INTO `blog_post`(`title`, `url_slug`, `content`, `category_id`, `image`, `posted_on`) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssiss', $title, $url_slug, $content, $category, $filename, $posted_on);
        $stmt->execute();

        if($stmt) {
            move_uploaded_file($tmp_name, "../assets/upload/$filename");
            echo '<script>alert("SUCCESS: Your blog has successfully been uploaded!")</script>';
        } else {
            echo '<script>alert("ERROR: An error occurred while uploading the blog!")</script>';
        }
    }
}

function addCategory($name) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO `categories`(`category_name`) VALUES(?)");
    $stmt->bind_param('s', $name);
    $stmt->execute();

    if($stmt) {
        echo 'success';
    } else {
        echo 'error';
    }
}

function updateCategory($name, $id) {
    global $conn;

    $stmt = $conn->prepare("UPDATE `categories` SET `category_name` = ? WHERE `id` = ?");
    $stmt->bind_param('si', $name, $id);
    $stmt->execute();

    if($stmt) {
        echo 'success';
    } else {
        echo 'error';
    }
}


//delete a blog post
function deleteBlog($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM `blog_post` WHERE `id` = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if($stmt) {
        $_SESSION['msg'] = 'The blog has been successfully deleted!';
        header('location: ./');
        exit();
    } else {
        $_SESSION['msg'] = 'An error occurred while deleting the blog!';
        header('location: ./');
        exit();
    }
}

//delete category
function deleteCategory($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM `categories` WHERE `id` = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if($stmt) {
        $_SESSION['msg'] = 'The category has been successfully deleted!';
        header('location: ./manage-categories.php');
        exit();
    } else {
        $_SESSION['msg'] = 'An error occurred while deleting the category!';
        header('location: ./manage-categories.php');
        exit();
    }
}

//logout
function logout() {
    unset($_SESSION['admin']);
    header('location: ./login.php');
    exit();
}
?>