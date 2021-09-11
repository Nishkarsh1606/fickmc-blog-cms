<?php
require 'db.php';
require_once 'vendor/autoload.php';

//markdown setup
use League\CommonMark\CommonMarkConverter;
$commonMark = new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]);

//global constants
define('BLOG_DIR', 'http://localhost/community/blog');
define('BLOG_IMG_DIR', 'http://localhost/community/assets/upload/');


function getAllBlogPosts() {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT blog_post.url_slug, blog_post.title, blog_post.posted_on, categories.category_name FROM `blog_post` JOIN `categories` ON categories.id = blog_post.category_id");
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

function getAllCategories() {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT `id`, `category_name` FROM `categories`");
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

function getBlog($slug) {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT `posted_on`, `title`, `content`, `image` FROM `blog_post` WHERE `url_slug` = ?");
    $stmt->bind_param('s', $slug);
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

function getAllBlogPostsByCategory($id) {
    global $conn;
    $rows = array();

    $stmt = $conn->prepare("SELECT blog_post.url_slug, blog_post.title, blog_post.posted_on, categories.category_name FROM `blog_post` JOIN `categories` ON categories.id = blog_post.category_id WHERE categories.id = ?");
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



?>