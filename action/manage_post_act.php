<?php
$post = new Post();
$posts = $post->get_all_post();
$categories = $post->get_all_category();
$stat = new Stat();



if (isset($_GET['delete_id'])) {
    $post->delete_post($_GET['delete_id']);
    header("Location: manage_post.php");
}

if (isset($_POST['edit'])) {

    $post_id = $_POST['edit_id'];
    $post_title = $_POST['post_title'];
    $post_content = $_POST['content'];
    $post_category = $_POST['category'];
    $post->update_post($post_id, $post_title, $post_content, $post_category);
    
    if ($_FILES['title_img']['size'] > 0) {
        
        $file = $_FILES['title_img'];
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];
        $post->update_img($post_id, $file_name, $file_tmp_name, $file_size, $file_error, $file_type);
    }
    header("Location: manage_post.php");
}

if (isset($_POST['create'])) {
   
    $post_title = $_POST['post_title'];
    $post_content = $_POST['create-content'];
    $post_category = $_POST['category'];
    $post_id=$post->create_post($post_title, $post_content, $post_category);
    $stat_id = $stat->create_stat($post_id);
    
    if ($_FILES['title_img']['size'] > 0) {
        
        $file = $_FILES['title_img'];
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];
        $post->update_img($post_id, $file_name, $file_tmp_name, $file_size, $file_error, $file_type);
    }
    header("Location: manage_post.php");
 }    
