<?php
$id = $_GET["movie_id"];
//Get movie data
$movie = getMovie($dbConn, $id);
$title = $movie['title'];
$genre = $movie['genre'];
$publishing_year = $movie['publishingyear'];
$plot = $movie['plot'];
$poster = $movie['image'];
//Get rating data
$ratings = getMovieRatingAvg($dbConn, $id);
if ($ratings) {
  $ratingAvg = round($ratings['avg_rating'], 2);
}
echo "
<section>
<div class='well'>
  <div class='row'>
    <img class='thumbnail mx-auto d-block poster' src='./images/moviePlaceholder.jpg' alt='Card image cap'>
  </div>
  <div class='row'>
    <h2 class='text-light mx-auto d-block'> $title </h2>
  </div>
  <div class='row'>
    <h5 class='text-light mx-auto d-block'>Rating: $ratingAvg </h5>
  </div>
  <div class='row'>
    <h5 class='mx-auto d-block text-light'>Publishing Year: $publishing_year</h5>
  </div>
  <div class='row'>
    <h5 class='mx-auto d-block text-light'>Genre: $genre</h5>
  </div>
  <div class='row'>
    <h5 class='mx-auto d-block text-light'>Plot:</h3>
  </div>
  <div class='row'>
    <p class='mx-auto d-block text-light'>$plot </p>
  </div>
</div>
</section>
";
?>
