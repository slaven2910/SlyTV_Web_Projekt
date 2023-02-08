<?php
    include('./scripts/movie.php');
    include('./scripts/review.php');
    ob_start();

    $movie_id = $_GET["movie_id"];
    // Check if user is logged in
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != true){
        // user is not logged in, redirect user to login page
        // user is not logged in, redirect user to login page
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
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <div class="container-fluid">

            <?php include('./components/navbar.php'); ?>

            <!-- Movie Info -->
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="container">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <div class='sticky-top site-background' style='background-color: #dedede'>
                    <?php include('./components/movie-info.php');
                        
                        
                            include('./components/add-review.php');
                echo "</div>";
                            //<!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                            echo "<div class='mb-5'>";
                            include('./components/all-reviews.php');
                            echo "</div>";
                    ?>
                           <?php echo "</div>";
                    ?>
            </div>
        </div>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <div class="fixed-bottom">
        <?php include './components/footer.php'; ?>
        </div>
    </body>

</html>