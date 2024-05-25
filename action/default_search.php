<?php
require_once '../class/crud_post_opp.php';
$post = new Post();
$posts = $post->get_most_views();

$rows = array_chunk($posts, 3);

foreach ($rows as $row) {
    echo '<div class="row">';
    foreach ($row as $post): 
        $backgroundImage = htmlspecialchars($post['title_img']);
        //echo '<a href="post.php?id=' . $post['post_id'] . '">';
        echo '<div class="col" style="border: 1px solid black; padding: 10px; margin: 10px; background-image: url(' . $backgroundImage . '); background-size: cover;" onclick="window.location.href=\'article.php?id=' . $post['post_id'] . '\'">';
        echo '<h2 class="title">' . htmlspecialchars($post['title']) . '</h2>'; 
        echo '<p class=" desription">' . (substr(strip_tags($post['content']), 0, 200))."..." .'</p>'; 
        echo '</div>';
        //echo '</a>';
    endforeach;
    echo '</div>';
}

