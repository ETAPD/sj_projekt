
    
<link rel="stylesheet" href="css/nav.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<header>
    <nav class="navbar navbar-expand-lg fixed-top container d-flex">
            
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php $currentFile = basename($_SERVER['PHP_SELF']); ?>

            <div class="collapse navbar-collapse middle justify-content-start" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item <?php if($currentFile == 'index.php') { echo 'active'; } ?>">
                        <a class="nav-link ps-3" href="index.php">Domov</a>
                    </li>
                    <li class="nav-item <?php if($currentFile == 'contact.php') { echo 'active'; } ?>">
                        <a class="nav-link ps-3" href="contact.php">Kontakt</a>
                    </li>
                    <li class="nav-item <?php if($currentFile == 'about.php') { echo 'active'; } ?>">
                        <a class="nav-link ps-3 " href="about.php">O-nás</a>
                    </li>
                </ul>
            </div>
            <div class="justify-content-end me-3">
                <form class="d-flex ">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
    </nav> 
    <div class="image-container">
        <img src="img/gamer_font.jpg" alt="" class="img-fluid">
    </div>

</header>


