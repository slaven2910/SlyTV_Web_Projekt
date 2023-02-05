<?php
include 'scripts/connect.php';

// Check if user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != true) {
    // user is not logged in
    // redirect user to login page
    header("Location: login.php?message=login_required_to_post_reviews");
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
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center ">
                        <form action="scripts/create-movie-verfication.php" method="POST">
                            <h2 class="textOnCard fw-bold mb-2 text-uppercase">Add a Movie</h2>
                            <p class="textOnCard mb-5">Please enter the needed information!</p>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="title" />
                                <label>Movie Name</label>
                            </div>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="month" name="publishingyear" />
                                <label>Publishing Year</label>
                            </div>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="genre" />
                                <label>Genre</label>
                            </div>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="plot" />
                                <label>Plot</label>
                            </div>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="name" name="actors" />
                                <label>Actors</label>
                            </div>
                            <br>
                            <div class="form-outline form-white mb-4">
                                <input type="file" name="image" />
                                <label>Movie Image</label>
                            </div>
                            <input type="submit" value="Submit">
                        </form>
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