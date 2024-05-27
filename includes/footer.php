<!--<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

<footer class="container-fluid bg-dark text-white  ">
        <div class="row d-flex justify-content-center">
            <div class="col-3">
                <h4>O Nás:</h4>
                <p>Sme komunita herných nadšencov, ktorí veria v silu zdieľania skúseností a stratégií. Na našom fóre nájdete diskusie, 
                tipy a podporu, ktoré obohatia váš herný zážitok. Pridajte sa k nám a buďte súčasťou priateľského prostredia, kde každý hráč je vítaný.</p>
               
                
            </div>
            <div class="col-3">
                <h4>Kontaktujte nás</h4>
                <ul>
                    <li><i class="fa fa-envelope" aria-hidden="true"><a
                        href="mailto:tuan.anh.emil.pham.dac@student.ukf.sk">
                        Mail</a></i></li>
                        
                    <li><i class="fa fa-info-circle" aria-hidden="true"><a
                    href="contact.php"> Podpora</a></i></li>
                </ul>
            </div>
            <div class="col-3">
                <h4>Rýchle odkazy</h4>
                <ul>
                    <li><a href="index.php">Domov</a></li>
                    <li><a href="contact.php">Kontakt</a></li>
                    <li><a href="about.php">O-nás</a></li>
                    <li><a href="<?php echo isset($_SESSION['username']) ? 'manage_post.php' : 'login.php'; ?>">Príspevky</a></li>
                </ul>
            </div>
            
        </div>
        
    </footer>