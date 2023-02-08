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
                        <form action="scripts/create-movie-verification.php" method="POST" enctype="multipart/form-data">
                            <h2 class="textOnCard fw-bold mb-2 text-uppercase">Add a Movie</h2>
                            <p class="textOnCard mb-5">Please enter the needed information!</p>
                            <div class="">
                            <?php if (isset($_GET["error"])) { ?>
                                <!-- alert from https://getbootstrap.com/docs/5.2/components/alerts/ -->
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET["error"]; ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($_GET["title"])) { ?>
                            <div class="form-outline form-white mb-2">
                                <input id="title" type="name" class="form-control form-control-lg "  name="title" value="<?php echo $_GET["title"]; ?>"/>
                                <label class="form-label" for="title">Movie Name</label>
                            </div>
                            <?php } else { ?>
                                <div class="form-outline form-white mb-2">
                                <input id="title" class="form-control form-control-lg " type="name" name="title" />
                                <label class="form-label" for="title">Movie Name</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["publishingyear"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input id="publishingYear" class="form-control form-control-lg " type="month" name="publishingyear" value="<?php echo $_GET["publishingyear"]; ?>"/>
                                <label class="form-label" for="publishingYear">Publishing Year</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input id="publishingYear" class="form-control form-control-lg " type="month" name="publishingyear" />
                                <label class="form-label" for="publishingYear">Publishing Year</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["genre"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input id="genre" type="name" class="form-control form-control-lg " name="genre" value="<?php echo $_GET["genre"]; ?>"/>
                                <label class="form-label" for="genre">Genre</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input type="name" class="form-control form-control-lg " name="genre" />
                                <label class="form-label" for="genre">Genre</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["plot"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input type="name" class="form-control form-control-lg " name="plot" value="<?php echo $_GET["plot"]; ?>"/>
                                <label class="form-label" for="plot">Plot</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input id="plot" type="name" class="form-control form-control-lg " name="plot" />
                                <label class="form-label" for="plot">Plot</label>
                            </div>
                            <?php } ?>

                            <?php if (isset($_GET["actors"])) { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input id="actors" type="name" class="form-control form-control-lg " name="actors" value="<?php echo $_GET["actors"]; ?>"/>
                                <label class="form-label" for="actors">Actors</label>
                            </div>
                            <?php } else { ?>
                            <br>
                            <div class="form-outline form-white mb-2">
                                <input id="actors" type="name" class="form-control form-control-lg " name="actors" />
                                <label class="form-label" for="actors">Actors</label>
                            </div>
                            <?php } ?>

                            <br>
                            <div class="form-outline form-white mb-2">
                                <input id="movieImg" type="file" class="form-control form-control-lg " name="image" accept="image/png, image/jpeg, image/jpg"/>
                                <label class="form-label" for="movieImg">Movie Image</label>
                            </div>
                            <input class="btn btn-dark border border-light mb-3" type="submit" value="Submit">
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