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
?>