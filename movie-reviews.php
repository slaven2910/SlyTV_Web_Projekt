<?php
    include('./scripts/movie.php');
    include('./scripts/review.php');
    
    /* ob_start() and ob_end_flush() are functions from the PHP Output Buffering extension. 
    In PHP, output buffering allows you to buffer the output generated by your scripts, 
    so you can modify it before it gets sent to the browser.

    ob_start() starts output buffering. Any output generated by your script (e.g., echo statements, HTML, etc.) will be 
    held in an internal buffer, rather than being immediately sent to the browser.

    ob_end_flush() ends output buffering and sends the buffered output to the browser. 
    It flushes (empties) the buffer and sends its contents to the browser.

    In this code, ob_start() is called at the beginning, before any output is generated. 
    Then, the header() function is called to redirect the user to the login page. 
    The ob_end_flush() function is called right before the script ends, to send any output buffered so far to the browser.
    By using output buffering, this code ensures that the header() function is called before any output is sent to the browser. 
    If any output were generated before the header() function is called, it would cause a "headers already sent" error, 
    which would prevent the redirection from working. */
    ob_start();

    $movie_id = $_GET["movie_id"];
    // Check if user is logged in
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != true){
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
                            echo "<div class='mb-5'>";
                            include('./components/all-reviews.php');
                            echo "</div>";
                    ?>
            </div>
        </div>
        <div class="fixed-bottom">
        <?php include './components/footer.php'; ?>
        </div>
    </body>

</html>