<?php
    require_once "includes/signup_view_inc.php";
    require_once "includes/session_inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include('header.php') ?>

    <main>
        <section class="container">
            <div class="row">
                
                <div class="col-md-6">
                    
                    <h1>Registrovať sa</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam voluptates nisi repellat vero temporibus non tempora doloremque perspiciatis commodi at, ducimus rerum voluptatibus itaque sunt omnis nobis aliquid porro optio!</p>
                    <form action = "includes/signup_inc.php" method = "post">
                        <div class="mb-3">
                            <label for="name"  class="form-label">Meno</label>
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" name="username"class="form-control" id="name" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email"  class="form-label">Email</label>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" class="form-control" id="email" placeholder="" >
                            </div>
                        </div>
                    
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo</label>
                            <div class="input-icon">
                                <i class=""></i>
                                <input type="password" name="pwd_1" class="form-control" id="pwd_1" placeholder="" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo ešte raz</label>
                            <div class="input-icon">
                                <i class=""></i>
                                <input type="password" name="pwd_2" class="form-control" id="pwd_2" placeholder="" >
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="consent" >
                            <label class="form-check-label" for="consent" >Súhlasím so spracovaním osobných údajov</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Poslať správu</button>
                        </div>
                        
                    </form>

                    <?php
                        check_signup_errors();
                    ?>

                </div>
            </div>
        </section>
    </main>
    
        


   





    <?php include('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>