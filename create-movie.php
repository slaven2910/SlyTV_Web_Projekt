<?php
include 'scripts/connect.php';

// Check if user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != true) {
    // user is not logged in
    // redirect user to login page
    header("Location: login.php?message=login_required_to_add_a_movie");
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<?php include('./components/header.php'); ?>

<body class="site-background">
    <!-- Code snippet from: https://mdbootstrap.com/docs/standard/extended/login/#!  -->
    <div class="container-fluid">
        <?php include('./components/navbar.php'); ?>
        <div class="row d-flex justify-content-center align-items-center h-100 pb-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card " style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center ">
                        <div class="align-items-left">
                        <form action="scripts/create-movie-verification.php" method="POST" enctype="multipart/form-data">
                            <h2 class="textOnCard fw-bold mb-2 text-uppercase">Add a Movie</h2>
                            <p class="textOnCard mb-5">Please enter the needed information!</p>
                            
                            <?php if (isset($_GET["error"])) { ?>
                                <!-- alert from https://getbootstrap.com/docs/5.2/components/alerts/ -->
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET["error"]; ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($_GET["title"])) { ?>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="title" value="<?php echo $_GET["title"]; ?>"/>
                                <label>Movie Name</label>
                            </div>
                            <?php } else { ?>
                                <div class="form-outline form-white mb-4">
                                <input type="name" name="title" />
                                <label>Movie Name</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["publishingyear"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="month" name="publishingyear" value="<?php echo $_GET["publishingyear"]; ?>"/>
                                <label>Publishing Year</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="month" name="publishingyear" />
                                <label>Publishing Year</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["genre"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="genre" value="<?php echo $_GET["genre"]; ?>"/>
                                <label>Genre</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="genre" />
                                <label>Genre</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["plot"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="plot" value="<?php echo $_GET["plot"]; ?>"/>
                                <label>Plot</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="plot" />
                                <label>Plot</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["actors"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="actors" value="<?php echo $_GET["actors"]; ?>"/>
                                <label>Actors</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="actors" />
                                <label>Actors</label>
                            </div>
                            <?php } ?>

                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="file" name="image" accept="image/png, image/jpeg, image/jpg"/>
                                <label>Movie Image</label>
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<div class="fixed-bottom">
    <?php include './components/footer.php'; ?>
</div>

</html>