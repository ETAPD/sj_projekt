<?php
$post = new Post();
$posts = $post->get_all_post();
$categories = $post->get_all_category();


if (isset($_GET['delete_id'])) {
    $post->delete_post($_GET['delete_id']);
    header("Location: manage_post.php");
}

if (isset($_GET['edit_id'])) {
    $data_post = $post->read_post($_GET['edit_id']);
}

if (isset($_POST['edit'])) {

    $post_id = $_POST['edit_id'];
    $post_title = $_POST['post_title'];
    $post_content = $_POST['content'];
    $post_category = $_POST['category'];
    $post->update_post($post_id, $post_title, $post_content, $post_category);
}

if (isset($_POST['create'])) {

    $post_title = $_POST['post_title'];
    $post_content = $_POST['content'];
    $post_category = $_POST['category'];
    $post->create_post($post_title, $post_content);
}
