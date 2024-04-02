<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include('header.php') ?>

    <main>
        <section class="container contact">
            
                
                
                    <!-- Formular -->
                    <h1>Podpora</h1>
                    <p>Spýtajte sa nás na čokoľvek.</p>
                    <form action="thankyou.html">
                        <div class="mb-3">
                            <label for="name" class="form-label">Meno</label>
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" class="form-control" id="email" placeholder="" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Správa</label>
                            <div class="input-icon">
                                <i class="fas fa-comment"></i>
                                <textarea class="form-control" id="message" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="consent" required>
                            <label class="form-check-label" for="consent" >Súhlasím so spracovaním osobných údajov</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Poslať správu</button>
                        </div>
                        
                    </form>
               
            
        </section>
    </main>



   





    <?php include('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>