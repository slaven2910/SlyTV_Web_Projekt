
<!DOCTYPE html>
<html lang="en">
<?php include('./components/header.php'); ?>
<!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
<body class="site-background">
    <?php
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
    } else {
        if (ctype_xdigit($selector) && ctype_xdigit($validator)) { ?>
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

                                    <form action="scripts/password-change-logic.php" method="POST">
                                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <p class="mb-5">here you can type in your new password</p>
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
                                        <div class="form-outline mb-4">
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <input type="password" name="password" class="form-control form-control-lg" />
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <label class="form-label" for="password">New Password</label>
                                        </div>
                                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                        <div class="form-outline mb-4">
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <input type="password" name="pwd-repeat" class="form-control form-control-lg" />
                                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                                            <label class="form-label" for="pwd-repeat">Repeat New Password</label>
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
    <?php
        }
    } ?>

    <div class="fixed-bottom">
        <?php include './components/footer.php'; ?>
    </div>
</body>

</html>