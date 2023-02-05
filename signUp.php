<!DOCTYPE html>
<html lang="en">

<?php include('./components/header.php'); ?>

<body class="site-background">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="container-fluid">
        <?php include("./components/navbar.php"); ?>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 pb-5 mb-5">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="container h-100">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                        <div class="card" style="border-radius: 15px;">
                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                            <div class="card-body p-5">
                                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="./scripts/signUp-verification.php" method="POST">
                                    <?php if (isset($_GET["error"])) { ?>
                                        <!-- alert from https://getbootstrap.com/docs/5.2/components/alerts/ -->
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_GET["error"]; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET["success"])) { ?>
                                        <!-- alert from https://getbootstrap.com/docs/5.2/components/alerts/ -->
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $_GET["success"]; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET["uname"])) { ?>
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <div class="form-outline mb-4">
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <input type="text" name="username" class="form-control form-control-lg" value="<?php echo $_GET["uname"]; ?>" />
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <label class="form-label" for="username">Your Name</label>
                                        </div>
                                    <?php } else { ?>
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <div class="form-outline mb-4">
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <input type="text" name="username" class="form-control form-control-lg" />
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <label class="form-label" for="username">Your Name</label>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET["eMail"])) { ?>
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <div class="form-outline mb-4">
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <input type="email" name="eMail" class="form-control form-control-lg" value="<?php echo $_GET["eMail"]; ?>" />
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <label class="form-label" for="eMail">Your Email</label>
                                        </div>
                                    <?php } else { ?>
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <div class="form-outline mb-4">
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <input type="email" name="eMail" class="form-control form-control-lg" />
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <label class="form-label" for="eMail">Your Email</label>
                                        </div>
                                    <?php } ?>

                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                    <div class="form-outline mb-4">
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                    <div class="form-outline mb-4">
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <input type="password" name="pwd-repeat" class="form-control form-control-lg" />
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <label class="form-label" for="pwd-repeat">Repeat your password</label>
                                    </div>
                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                    <div class="form-check d-flex justify-content-center mb-5" style="position: relative;">
                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <label class="form-check-label" for="terms-checkbox">
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <input class="form-check-input me-2 terms-checkbox" type="checkbox" value="" name="terms-checkbox" />
                                    </div>


                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                    <button type="submit" class="btn btn-outline-dark btn-lg  w-100">Register</button>
                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                    <p class="text-center text-muted mt-5 mb-0">Already have an account?
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <a href="login.php" class="fw-bold text-body"><u>Login here</u></a>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="fixed-bottom">
    <?php include './components/footer.php'; ?>
    </div>
</body>

</html>