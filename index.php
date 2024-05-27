<?php
    require_once 'class/session_oop.php';
    require_once 'includes/head.php';
    
    
?>

<body>
    <?php require_once('includes/header.php') ?>

    <div class="image-container">
        <img src="media/img/gamer_font.jpg" alt="" class="img-fluid">
    </div>

    <div class="container" id='results' >
    </div>

    <?php include('includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/search.js"></script>
</body>
</html>