<?php 
include('./scripts/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieReviewApp
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body class="site-background">
<div class="container-fluid">
<!-- Navbar -->
<?php include('./components/navbar.php'); ?>
<section class="content-wrapper">
<div class="row mb-4 py-5">

<?php
if (isset($_POST['search_term'])) {
    $search_term = $_POST['search_term'];
    $movies = searchMovies($dbConn, $search_term);
    if(count($movies) == 0){
        echo "
        <div class='alert alert-warning alert-dismissible fade show fixed-top text-center' role='alert'>
        No movies found for '$search_term'.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
        ";

        $movies = getMovies($dbConn);
        foreach($movies as $movie){
            $movieId = $movie['id'];
            $title = $movie['title'];
            $genre = $movie['genre'];
            $publishing_year = $movie['publishingyear'];
            $plot = $movie['plot'];
            $poster = $movie['image'];
            include './components/movie-card.php';
        }
    }else{
        foreach($movies as $movie){
            $movieId = $movie['id'];
            $title = $movie['title'];
            $genre = $movie['genre'];
            $publishing_year = $movie['publishingyear'];
            $plot = $movie['plot'];
            $poster = $movie['image'];
        include './components/movie-card.php';
        }
    }
} else {
    $movies = getMovies($dbConn);
        foreach($movies as $movie){
            $movieId = $movie['id'];
            $title = $movie['title'];
            $genre = $movie['genre'];
            $publishing_year = $movie['publishingyear'];
            $plot = $movie['plot'];
            $poster = $movie['image'];
            include './components/movie-card.php';
        }
}
?>


</div>
</section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>