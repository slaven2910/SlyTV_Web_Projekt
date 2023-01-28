<?php
include 'db-credientials.php';
session_start();

// Datenbankverbindung aufbauen

$connStr = "host=$host port=$port dbname=$db user=$user password=$pw";

$dbConn = pg_connect($connStr);

if (!$dbConn) {
  echo "Ein Fehler ist aufgetreten.\n";
  exit;
}

// Get movies from the database

function getMovies($dbConn){
  try{
      $showMoviesQuery = "select * from public.\"Movies\"";
      $showMoviesResult = pg_query($dbConn, $showMoviesQuery);
      $movies = pg_fetch_all($showMoviesResult);
      return $movies;
  } catch(Exception $e){
      echo $e->getMessage();
  }
}

// Get a single movie from the database

function getMovie($dbConn,$id) {
  try {
      $movieQuery = "SELECT * from public.\"Movies\" where id=$id";
      $queryResult = pg_query($dbConn, $movieQuery);
      $movie = pg_fetch_assoc($queryResult);
      return $movie;
  } catch(Exception $e) {
      echo $e->getMessage();
  }
}

// Search movies

function searchMovies($dbConn, $search_term){
  $searchQuery = "SELECT * FROM public.\"Movies\" WHERE title ILIKE $1 LIMIT 10";
  $queryResult = pg_query_params($dbConn, $searchQuery, array("%" . $search_term . "%"));

  if (!$queryResult) {
      $error = pg_last_error($dbConn);
      throw new Exception("Search query failed: $error");
  }
  $searchedMovies = pg_fetch_all($queryResult);
  return $searchedMovies;
}



// Get comments from the database

function getComments($dbConn, $movie_id) {
  try {
      $commentsQuery = "SELECT u.username, mc.comment, mc.created_at, mc.id, mc.user_id
      FROM public.\"Users\" u
      INNER JOIN public.\"movie_comments\" mc ON u.user_id = mc.user_id
      WHERE mc.movie_id = $movie_id";
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
    $ratingQuery = "SELECT AVG(rating) as avg_rating FROM public.\"movie_ratings\" WHERE movie_id = $movie_id";
    $queryResult = pg_query($dbConn, $ratingQuery);
    $rating = pg_fetch_assoc($queryResult);
    return $rating;
  } catch(Excepton $e) {
    echo $e->getMessage();
  }
}

// Get movie rating from logged in user for the selected movie

function getUserRatingForMovie($dbConn, $movieId, $user_id) {
  try{
    $query = "SELECT * FROM public.\"movie_ratings\" WHERE movie_id='$movieId' AND user_id='$user_id'";
    $queryResult = pg_query($dbConn, $query);
    return pg_fetch_assoc($queryResult);
  } catch(Excepton $e) {
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
      $comment = $_POST['comment'];
      if(!empty($comment)){
        $insertComment = "INSERT INTO public.\"movie_comments\"(comment, movie_id, user_id, created_at) VALUES('$comment', '$movie_id', '$user_id', now())";
        $insertCommentResult = pg_query($dbConn, $insertComment);
        $_SESSION['message'] = "Your comment has been added successfully";
      }else{

      }
  }

  if (!empty($existingRating)) {
      $update = "UPDATE public.\"movie_ratings\" SET rating='$rate' WHERE movie_id='$movie_id' AND user_id='$user_id'";
      $updateResult = pg_query($dbConn, $update);
  } else {
      $insert = "INSERT INTO public.\"movie_ratings\"(rating, movie_id, user_id) VALUES('$rate', '$movie_id', '$user_id')";
      $insertResult = pg_query($dbConn, $insert);
  }
  //...
}

//delete a comment

function deleteComment($dbConn, $comment_id, $user_id) {
  try{
    $deleteQuery = "DELETE FROM public.\"movie_comments\" WHERE id = '$comment_id' AND user_id = '$user_id'";
    $deleteResult = pg_query($dbConn, $deleteQuery);
    return $deleteResult;
  } catch(Excepton $e) {
    echo $e->getMessage();
  }
}

if(isset($_POST["delete"])) {
  $comment_id = $_POST['comment_id'];
  $user_id = $_SESSION['user_id'];
  $result = deleteComment($dbConn, $comment_id, $user_id);
  if ($result) {
    echo "
    <div class='alert alert-success alert-dismissible fade show d-flex justify-content-between' role='alert'>
      <p class='text-center mx-auto my-auto'> Comment deleted successfully </p>
      <button type='button' class='close ' data-dismiss='alert' aria-label='Close'>
      <span class='float-right' aria-hidden='true'>&times;</span>
      </button>
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
  } catch(Excepton $e) {
    echo $e->getMessage();
  }
}

if(isset($_POST["update"])) {
  $comment_id = intval($_POST['comment_id']);
  $new_comment = $_POST['new_comment_input'];
  $user_id = $_SESSION['user_id'];
  $result = updateComment($dbConn, $comment_id, $new_comment, $user_id);
  if ($result) {
    echo "
    <div class='alert alert-success alert-dismissible fade show d-flex justify-content-between' role='alert'>
      <p class='text-center mx-auto my-auto'> Comment updated successfully </p>
      <button type='button' class='close ' data-dismiss='alert' aria-label='Close'>
      <span class='float-right' aria-hidden='true'>&times;</span>
      </button>
    </div>
    ";
  }
}


?>