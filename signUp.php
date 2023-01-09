<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include("./components/navbar.php"); ?>

    <div class="mask d-flex align-items-center h-100 gradient-custom-3 p-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form action="signUp-verification.php" method="POST">
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
                                    <div class="form-outline mb-4">
                                        <input type="text" name="username" class="form-control form-control-lg" value="<?php echo $_GET["uname"]; ?>" />
                                        <label class="form-label" for="username">Your Name</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-outline mb-4">
                                        <input type="text" name="username" class="form-control form-control-lg" />
                                        <label class="form-label" for="username">Your Name</label>
                                    </div>
                                <?php } ?>

                                <?php if (isset($_GET["eMail"])) { ?>
                                    <div class="form-outline mb-4">
                                        <input type="email" name="eMail" class="form-control form-control-lg" value="<?php echo $_GET["eMail"]; ?>" />
                                        <label class="form-label" for="eMail">Your Email</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-outline mb-4">
                                        <input type="email" name="eMail" class="form-control form-control-lg" />
                                        <label class="form-label" for="eMail">Your Email</label>
                                    </div>
                                <?php } ?>


                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="pwd-repeat" class="form-control form-control-lg" />
                                    <label class="form-label" for="pwd-repeat">Repeat your password</label>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" name="terms-checkbox" />
                                    <label class="form-check-label" for="terms-checkbox">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-outline-success btn-lg text-green w-100">Register</button>

                                <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>