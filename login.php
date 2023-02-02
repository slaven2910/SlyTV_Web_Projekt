<!DOCTYPE html>
<html lang="en">

<?php include('./components/header.php'); ?>

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
                                $movie_id = $_GET["movie_id"];
                                $_SESSION["redirect_to_movie"] = $movie_id;
                                    echo "
                                    <div class='alert alert-warning alert-dismissible fade show text-center mx-auto mb-3' role='alert'>
                                        You need to be logged in order to view or post reviews.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                    ";
                                    }
                            ?>
                            <form action="./scripts/login-verification.php?movie_id=<?php $movie_id ?>" method="POST">
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

                                <p class="small mb-5 pb-lg-2 "><a href="passwordReset.php" class="text-body">Forgot password?</a></p>

                                <button type="submit" class="btn btn-outline-dark btn-lg px-5 w-100">Login</button>
                            </form>
                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="signUp.php" class="fw-bold text-body">Sign Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './components/footer.php'; ?>
</body>

</html>