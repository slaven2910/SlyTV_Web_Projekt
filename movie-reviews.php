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

        <!-- Navbar -->

        <?php include('./components/navbar.php'); ?>

        <!-- Movie Info -->
        <div class="container">
        <div class='sticky-top site-background' >
            <?php include('./components/movie-info.php');
            
            // FIXME: fixed erstmal den Fehler. Ihr könnt entscheiden, ob ihr das so lassen wollt
            if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false) {
                echo 'You must be logged in to make reviews and comments --> <a href="login.php">Login</a>';
            } else {
                echo "            
                
                ";
                include('./components/add-review.php');
                echo "</div>";
                include('./components/all-reviews.php');
                
            } ?>
        </div>
    </div>
    <?php include './components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>