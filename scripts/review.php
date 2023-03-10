
<?php
include 'connect.php';

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $_SESSION["validation_activated"] = true;
    return $data;
}
// Get comments from the database
function getComments($dbConn, $movie_id) {
    try {
        $commentsQuery = "SELECT u.username, mc.comment, mc.created_at, mc.id, mc.user_id
        FROM public.\"Users\" u
        INNER JOIN public.\"movie_comments\" mc ON u.user_id = mc.user_id
        WHERE mc.movie_id = $movie_id ORDER BY mc.created_at DESC";
        $queryResult = pg_query($dbConn, $commentsQuery);
        $comments = pg_fetch_all($queryResult);
        return $comments;
    } catch(Exception $e) {
        echo $e->getMessage();
    }
  }
  
  // Get a movie rating 
  function getMovieRatingAvg($dbConn, $movie_id){
    try{
      $ratingQuery = "SELECT AVG(rating) AS avg_rating FROM public.\"movie_ratings\" WHERE movie_id = $movie_id";
      $queryResult = pg_query($dbConn, $ratingQuery);
      $rating = pg_fetch_assoc($queryResult);
      return $rating;
      
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  
  // Get movie rating from logged in user for the selected movie
  function getUserRatingForMovie($dbConn, $movieId, $user_id) {
    try{
      $query = "SELECT * FROM public.\"movie_ratings\" WHERE movie_id='$movieId' AND user_id='$user_id'";
      $queryResult = pg_query($dbConn, $query);
      return pg_fetch_assoc($queryResult);
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }

  //post for rating and comment
  if (isset($_POST['rate']) && isset($_POST['movie_id']) && isset($_POST['user_id'])) {
    
    $rate = $_POST['rate'];
    $movie_id = $_POST['movie_id'];
    $user_id = $_POST['user_id'];
    $existingRating = getUserRatingForMovie($dbConn, $movie_id, $user_id); 
    if (isset($_POST['comment'])) {
        $comment = validate($_POST['comment']);
        if(!empty($comment)){
          $insertComment = "INSERT INTO public.\"movie_comments\"(comment, movie_id, user_id, created_at) VALUES('$comment', '$movie_id', '$user_id', now())";
          $insertCommentResult = pg_query($dbConn, $insertComment);
         // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3].
          echo "
          <div class='alert alert-success alert-dismissible fade show text-center mx-auto my-auto' role='alert'>
            Comment added successfully  
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          ";
        }
    }

    if (empty($existingRating)) {
        $insert = "INSERT INTO public.\"movie_ratings\"(rating, movie_id, user_id) VALUES('$rate', '$movie_id', '$user_id')";
        $insertResult = pg_query($dbConn, $insert);
        // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3].
        echo "
        <div class='alert alert-success alert-dismissible fade show text-center mx-auto my-auto' role='alert'>
          Rating added successfully  
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      ";
    } else {
      $update = "UPDATE public.\"movie_ratings\" SET rating='$rate' WHERE movie_id='$movie_id' AND user_id='$user_id'";
      $updateResult = pg_query($dbConn, $update);
      // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3].
      echo "
      <div class='alert alert-success alert-dismissible fade show text-center mx-auto my-auto' role='alert'>
        Rating updated successfully  
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
    }
  }else if(!isset($_POST['rate']) && isset($_POST['comment'])){
    // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3].
    echo "
        <div class='alert alert-success alert-dismissible fade show text-center mx-auto my-auto' role='alert'>
          You have to rate the movie in order to post a comment 
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
  }

  //delete a comment
  function deleteComment($dbConn, $comment_id, $user_id) {
    try{
      $deleteQuery = "DELETE FROM public.\"movie_comments\" WHERE id = '$comment_id' AND user_id = '$user_id'";
      $deleteResult = pg_query($dbConn, $deleteQuery);
      return $deleteResult;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  
  if(isset($_POST["delete"])) {
    $comment_id = $_POST['comment_id'];
    $user_id = $_SESSION['user_id'];
    $result = deleteComment($dbConn, $comment_id, $user_id);
    if ($result) {
      // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3].
      echo "
      <div class='alert alert-success alert-dismissible fade show text-center mx-auto my-auto' role='alert'>
        Comment deleted successfully
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
    }
  }
  
  // Update comment
  function updateComment($dbConn, $comment_id, $newComment, $user_id) {
    try{
      $updateQuery = "UPDATE public.\"movie_comments\" SET comment='$newComment', created_at= now() WHERE id = $comment_id AND user_id = '$user_id'";
      $updateResult = pg_query($dbConn, $updateQuery);
      return $updateResult;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  
  if(isset($_POST["update"])) {
    $comment_id = intval($_POST['comment_id']);
    $new_comment = validate($_POST['new_comment_input']);
    $user_id = $_SESSION['user_id'];
    $result = updateComment($dbConn, $comment_id, $new_comment, $user_id);
    if ($result) {
      // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3].
      echo "
      <div class='alert alert-success alert-dismissible fade show text-center mx-auto my-auto' role='alert'>
        Comment updated successfully  
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
    }
  }
  
?>