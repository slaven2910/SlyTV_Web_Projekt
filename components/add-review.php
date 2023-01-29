<?php 
// Start output buffering
ob_start();

// Check if user is logged in
if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != true){
    // user is not logged in
    // redirect user to login page
    header("Location: /login.php");
    exit;
}

// Get user_id and movie_id
$user_id = $_SESSION["user_id"];
$movie_id = $_GET["movie_id"];
$existingRating = getUserRatingForMovie($dbConn, $movie_id, $user_id);
// Flush output buffer
ob_end_flush();
?>

<!-- Rest of add-review.php file -->


<section class="text-center">
  <h3 >Reviews:</h3>
  <h5 >Please tell us what you think about the movie:</h5>
<hr color="white">

<form id="comment-form" method="post">
<label for="rate">Rate this movie:</label>
  <div class="row">
  <div class="rate mx-auto">
  <input type="radio" id="star5" name="rate" value="5" <?php if ($existingRating && $existingRating['rating'] == 5) { echo 'checked'; } ?> />
  <label for="star5" title="text">5 stars</label>
  <input type="radio" id="star4" name="rate" value="4" <?php if ($existingRating && $existingRating['rating'] == 4) { echo 'checked'; } ?> />
  <label for="star4" title="text">4 stars</label>
  <input type="radio" id="star3" name="rate" value="3" <?php if ($existingRating && $existingRating['rating'] == 3) { echo 'checked'; } ?> />
  <label for="star3" title="text">3 stars</label>
  <input type="radio" id="star2" name="rate" value="2" <?php if ($existingRating && $existingRating['rating'] == 2) { echo 'checked'; } ?> />
  <label for="star2" title="text">2 stars</label>
  <input type="radio" id="star1" name="rate" value="1" <?php if ($existingRating && $existingRating['rating'] == 1) { echo 'checked'; } ?> />
  <label for="star1" title="text">1 star</label>
</div>

  </div>
  <div class="row">
    <div class="col-8 mx-auto">
      <label for="comment">Your movie thoughts..</label>
      <textarea id="comment" name="comment" rows="4" class="form-control " placeholder="This movie was..."></textarea>
    </div>
  </div>
  <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>">
  <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
  <div class="row">
    <div class="col-8 mx-auto text-right py-4">
      <input class="btn btn-dark border border-light mb-3" type="submit" value="Submit">
    </div>
  </div>
</form>
</section>