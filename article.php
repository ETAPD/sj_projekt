<?php
    require_once 'class/session_oop.php';
    require_once 'includes/head.php';
    require_once 'class/crud_post_opp.php';
    require_once 'class/stat_oop.php';

?>

<body>
    <?php require_once('includes/header.php') ?>
    <main>
        <?php 
            $stat = new Stat();
            $stat->add_view($_GET['id']); 
            $post = new Post;
            $article = $post->read_post($_GET['id']);
        
        ?>
        <div class="container-article">
            <div class="title"><h1><?php echo $article['title']; ?></h1></div>
            
            <section class="container-text">
                
                <br>
                <?php echo $article['content']; ?>
            </section>        
        </div>
    </main>

    <?php include('includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>