<?php
require_once '../class/crud_post_opp.php';
if (isset($_POST['query'])) {
    $searchQuery = $_POST['query'];

    $search = new Post();
    $searchResults = $search->search_post($searchQuery);
    $rows = array_chunk($searchResults, 3);

    foreach ($rows as $row) {
        echo '<div class="row image-container">';
        foreach ($row as $post): 
            $backgroundImage = htmlspecialchars($post['title_img']);
            //echo '<a href="post.php?id=' . $post['post_id'] . '">';
            echo '<div class="col" style=" padding: 10px; margin: 10px; background-image: url(' . $backgroundImage . '); background-size: cover;" onclick="window.location.href=\'article.php?id=' . $post['post_id'] . '\'">';
            echo '<h2 class="title">' . htmlspecialchars($post['title']) . '</h2>'; 
            echo '<p class=" desription">' . (substr(strip_tags($post['content']), 0, 200))."..." .'</p>'; 
            echo '</div>';
            //echo '</a>';
        endforeach;
        echo '</div>';
    }
}