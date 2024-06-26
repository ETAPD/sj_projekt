<?php
require_once 'class/session_oop.php';
require_once 'includes/head.php';
require_once 'class/signup_oop.php';
require_once 'action/signup_act.php';
?>

<body>
    <?php require_once('includes/header.php') ?>

    <main>
        <section class="container-signup">
            <div class="row">

                <div class="col-md-6">
                    <img src="media/img/password.png" alt="" class="img-fluid">
                    <!-- <a href="https://www.flaticon.com/free-icons/login" title="login icons">Login icons created by Icon Pond - Flaticon</a> -->
                </div>

                <div class="col-md-6 ">
                    <h1>Vytvoriť si účet</h1>

                    <form method="post">
                        <div class="mb-3">
                            <?php if (isset($errors['usernameError'])): ?>
                                <span class="error-message"><?php echo $errors['usernameError']; ?></span>
                            <?php endif; ?>

                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" name="username" class="form-control" id="name" placeholder="Použivateľské meno">
                            </div>
                        </div>
                        <div class="mb-3">
                            <?php if (isset($errors['emailError'])): ?>
                                <span class="error-message"><?php echo $errors['emailError']; ?></span>
                            <?php endif; ?>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>


                        <div class="mb-3">
                            <?php if (isset($errors['pwdError'])): ?>
                                <span class="error-message"><?php echo $errors['pwdError']; ?></span>
                            <?php endif; ?>
                            <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="pwd_1" class="form-control" id="pwd_1" placeholder="Heslo">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="pwd_2" class="form-control" id="pwd_2" placeholder="Znovu heslo">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Registrovať sa</button>
                        </div>
                        <div class="mb-3">
                            Už máte účet?
                            <a href="login.php" class="text-center">Prihlásiť sa</a>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>
    <?php include('includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
