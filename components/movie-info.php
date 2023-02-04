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

//Add path to poster
$image = ".assets/images/" . $poster;

echo "
<section class='mb-5'>
<div class='well'>
  <div class='row justify-content-center'>
    <div class='col-md-4'>
        <img class='thumbnail d-block poster' src=$image alt='Card image cap'>
    </div>
    <div class='col-md-4 movie-infos align-self-center'>
        <p>Title: <strong>$title</strong></p>
        <p>Rating: <strong>$ratingAvg</strong> </p>
        <p>Publishing Year: <strong>$publishing_year</strong></p>
        <p>Genre: <strong>$genre</strong></p>
        <p>Plot: <strong>$plot</strong></p>
    </div>
  </div>

</div>
</section>

"
?>
