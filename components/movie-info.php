<?php
$id = $_GET["movie_id"];
//Get movie data
$movie = getMovie($dbConn, $id);
$title = $movie['title'];
$genre = $movie['genre'];
$publishing_year = $movie['publishingyear'];
$plot = $movie['plot'];
$poster = $movie['image'];
$actors = $movie['actors'];
//Get rating data
$ratings = getMovieRatingAvg($dbConn, $id);
if ($ratings) {
  $ratingAvg = round($ratings['avg_rating'], 2);
}

?>
<!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
<section class='mb-5'>
  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
<div class='well'>
  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <div class='row justify-content-center'>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class='col-lg-4'>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <img class='thumbnail d-block poster' src='./assets/images/moviePlaceholder.jpg' alt='Card image cap'>
    </div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class='col-lg-4 movie-infos align-self-center'>
        <p>Title: <strong><?php echo $title ?></strong></p>
        <p>Rating: <strong><?php echo $ratingAvg ?></strong> </p>
        <p>Publishing Year: <strong><?php echo $publishing_year ?></strong></p>
        <p>Genre: <strong><?php echo $genre ?></strong></p>
        <p>Actors: <strong><?php echo $actors ?></strong></p>
        <p>Plot: <strong><?php echo $plot ?></strong></p>
    </div>
  </div>

</div>
</section>