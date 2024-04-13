<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php include('header.php') ?>

    <main>
        <section class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Vytvor si účet</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore at corporis alias optio veniam! Accusantium amet sed perferendis nobis quaerat nulla sapiente asperiores. Esse quasi laudantium ullam debitis optio officia?</p>
                    <a href="signup.php" class="btn btn-primary">Registrovať sa</a>
                </div>
                <div class="col-md-6">
                    <!-- Formular -->
                    <h1>Už mám účet</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore at corporis alias optio veniam! Accusantium amet sed perferendis nobis quaerat nulla sapiente asperiores. Esse quasi laudantium ullam debitis optio officia?</p>
                    <form action = "includes/login_inc.php">
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" class="form-control" id="email" placeholder="" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo</label>
                            <div class="input-icon">
                                <i class=""></i>
                                <input type="password" class="form-control" id="password" placeholder="" required>
                            </div>
                        </div>
                        
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Prihlasiť sa</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
    </main>
    





    <?php include('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>