<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body class="site-background">
    <!-- Code snippet from: https://mdbootstrap.com/docs/standard/extended/login/#!  -->
    <div class="container-fluid">
        <?php include('./components/navbar.php'); ?>

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center ">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <?php if(isset($_GET["message"]) && $_GET["message"] == "login_required_to_post_reviews"){
                                    echo "
                                    <div class='alert alert-warning alert-dismissible fade show d-flex justify-content-between' role='alert'>
                                        <p class='text-center mx-auto my-auto'> You need to be logged in order to view or post reviews. </p>
                                        <button type='button' class='close ' data-dismiss='alert' aria-label='Close'>
                                            <span class='float-right' aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    ";
                                    }
                            ?>
                            <form action="./scripts/login-verification.php" method="POST">
                                <h2 class="textOnCard fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="textOnCard mb-5">Please enter your login and password!</p>

                                <?php if (isset($_GET["error"])) { ?>
                                    <!-- alert from https://getbootstrap.com/docs/5.2/components/alerts/ -->
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_GET["error"]; ?>
                                    </div>
                                <?php } ?>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="typeEmailX" name="eMail" class="form-control form-control-lg textOnCard" />
                                    <label class="form-label textOnCard" for="typeEmailX">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg textOnCard" />
                                    <label class="form-label textOnCard" for="typePasswordX">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2 "><a href="passwordReset.php">Forgot password?</a></p>

                                <button type="submit" class="btn btn-outline-dark btn-lg px-5 w-100 ">Login</button>
                            </form>
                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="signUp.php" class="fw-bold">Sign Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>