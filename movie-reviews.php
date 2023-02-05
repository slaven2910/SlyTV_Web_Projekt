<?php
    include('./scripts/movie.php');
    include('./scripts/review.php');
    ob_start();

    $movie_id = $_GET["movie_id"];

    // Check if user is logged in
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != true){
        // user is not logged in
        // redirect user to login page
        header("Location: login.php?message=login_required_to_post_reviews&movie_id=$movie_id");
        exit;
    }

    $user_id = $_SESSION["user_id"];
    $existingRating = getUserRatingForMovie($dbConn, $movie_id, $user_id);

    // Flush output buffer
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('./components/header.php'); ?>

    <body class="site-background">
        <div class="container-fluid">

            <?php include('./components/navbar.php'); ?>

            <!-- Movie Info -->
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="container">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <div class='sticky-top site-background' >
                    <?php include('./components/movie-info.php');
                        if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false) {
                            echo 'You must be logged in to make reviews and comments --> 
                                    <a href="login.php">Login</a>';
                        } else {
                            include('./components/add-review.php');
                echo "</div>";
                            include('./components/all-reviews.php');
                    
                        } ?>
            </div>
        </div>
        <?php include './components/footer.php'; ?>
    </body>

</html>