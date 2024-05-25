
    
<!--<link rel="stylesheet" href="css/nav.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">-->
<header>
<nav class="navbar navbar-expand-lg fixed-top container-fluid d-flex justify-content-center mx-auto">
        <?php $currentFile = basename($_SERVER['PHP_SELF']); ?>

        <ul class="navbar-nav ">
            <li class="nav-item <?php if($currentFile == 'index.php') { echo 'active'; } ?>">
                <a class="nav-link ps-3" href="index.php">Domov</a>
            </li>

            <li class="nav-item me-5 <?php if($currentFile == 'contact.php') { echo 'active'; } ?>"> 
                <a class="nav-link ps-3" href="contact.php">Kontakt</a>
            </li>

            <li class="nav-item <?php if($currentFile == 'about.php') { echo 'active'; } ?>">
                <a class="nav-link ps-3 " href="about.php">O-nás</a>
            </li>
           
            <li class="nav-item  <?php if($currentFile == 'manage_post.php') { echo 'active'; } ?>">
                <a class="nav-link ps-3 " href="<?php echo isset($_SESSION['username']) ? 'manage_post.php' : 'login.php'; ?>">Príspevky</a>
            </li>

        </ul>
                
        <?php if ($currentFile == 'index.php'): ?>
            <form class="d-flex justify-content-center mx-auto">
                <input class="search" type="text" id='search' placeholder="Ako hrať...." aria-label="Search">
            </form>
        <?php endif; ?>

        
        
        
    </nav>
    

</header>


