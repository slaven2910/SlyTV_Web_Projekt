<?php
include 'connect.php';


// Get movies from the database
  function getMovies($dbConn){
      try{
          $showMoviesQuery = "SELECT * FROM public.\"Movies\"";
          $showMoviesResult = pg_query($dbConn, $showMoviesQuery);
          $movies = pg_fetch_all($showMoviesResult);
          return $movies;
      } catch(Exception $e){
          echo $e->getMessage();
      }
  }

  function getMoviesForUser($dbConn, $userId){
    try {
      $movieQuery = "SELECT * FROM public.\"Movies\" WHERE user_id=$userId";
      $queryResult = pg_query($dbConn, $movieQuery);
      $movie = pg_fetch_all($queryResult);
      return $movie;
  } catch(Exception $e) {
      echo $e->getMessage();
  }
  }

  // Get a single movie from the database
  function getMovie($dbConn,$id) {
    try {
        $movieQuery = "SELECT * FROM public.\"Movies\" WHERE id=$id";
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

  function deleteMovie($dbConn, $movie_id) {
    try{
      $deleteQuery = "DELETE FROM public.\"Movies\" WHERE id = '$movie_id'";
      $deleteResult = pg_query($dbConn, $deleteQuery);
      return $deleteResult;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }

  function deleteCommentsForMovie($dbConn, $movie_id ,$user_id) {
    try{
      $deleteQuery = "DELETE FROM public.\"movie_comments\" WHERE movie_id = '$movie_id' AND user_id = '$user_id'";
      $deleteResult = pg_query($dbConn, $deleteQuery);
      return $deleteResult;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  if(isset($_POST["delete_movie"])) {
    $movie_id = $_POST['movie_id'];
    $user_id = $_SESSION['user_id'];
    $movieDeletedResult = deleteMovie($dbConn, $movie_id);
    $commentsDeletedResult = deleteCommentsForMovie($dbConn, $movie_id ,$user_id);
    if ($movieDeletedResult && $commentsDeletedResult) {
      // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3].
      echo "
      <div class='alert alert-success alert-dismissible fade show text-center mx-auto my-auto' role='alert'>
        Movie deleted successfully
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
    }
  }
?>