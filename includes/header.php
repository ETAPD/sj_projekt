<header>
<nav class="navbar navbar-expand-lg fixed-top container-fluid d-flex justify-content-center mx-auto">
        
    
    <?php $currentFile = basename($_SERVER['PHP_SELF']); ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-center ">
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item <?php if($currentFile == 'index.php') { echo 'active'; } ?>">
                        <a class="nav-link ps-3" href="index.php">Domov</a>
                    </li>

                    <li class="nav-item <?php if($currentFile == 'contact.php') { echo 'active'; } ?>"> 
                        <a class="nav-link ps-3" href="contact.php">Kontakt</a>
                    </li>

                    <li class="nav-item <?php if($currentFile == 'about.php') { echo 'active'; } ?>">
                        <a class="nav-link ps-3 " href="about.php">O-nás</a>
                    </li>
                    
                    <li class="nav-item  <?php if($currentFile == 'manage_post.php') { echo 'active'; } ?>">
                        <a class="nav-link ps-3 " href="<?php echo isset($_SESSION['username']) ? 'manage_post.php' : 'login.php'; ?>">Príspevky</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="login d-flex mx-3">
            <?php if(isset($_SESSION['username'])): ?>
                <a class="nav-link ps-3" href="index.php?logout=true">Odhlásiť sa</a>
            <?php else: ?>
                <a class="nav-link ps-3" href="login.php">Prihlásiť sa</a>
            <?php endif; ?>
        </div>
    </div>
            
    <?php if ($currentFile == 'index.php'): ?>
        <form class="d-flex justify-content-center m-auto">
            <input class="search" type="text" id='search' placeholder="Ako hrať...." aria-label="Search">
        </form>
    <?php endif; ?>

</nav>
    

</header>


