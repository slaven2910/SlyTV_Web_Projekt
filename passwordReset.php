<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include('./components/navbar.php'); ?>


    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mt-md-4 pb-5">

                            <form action="passwordReset-verification.php" method="POST">
                                <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
                                <p class="text-white-50 mb-5">you will recieve an e-mail with instructions to reset your password</p>

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

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="typeEmailX" name="eMail" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>

                                <button type="submit" class="btn btn-outline-danger btn-lg px-5 w-100">reset password</button>
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