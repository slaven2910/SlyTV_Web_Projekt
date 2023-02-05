<!DOCTYPE html>
<html lang="en">
<?php include('./components/header.php'); ?>

<body class="site-background">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="container-fluid">
        <?php include('./components/navbar.php'); ?>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <div class="row d-flex justify-content-center align-items-center h-100">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <div class="card" style="border-radius: 1rem;">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                    <div class="card-body p-5 text-center">
                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                        <div class="mt-md-4 pb-5">

                            <form action="scripts/passwordReset-verification.php" method="POST">
                                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
                                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                <p class="text-50 mb-5">you will recieve an e-mail with instructions to reset your password</p>

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
                                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                <div class="form-outline form-white mb-4">
                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                    <input type="email" id="typeEmailX" name="eMail" class="form-control form-control-lg" />
                                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>
                                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                <button type="submit" class="btn btn-outline-danger btn-lg px-5 w-100">reset password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>