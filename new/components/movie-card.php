<div class='col-lg-3 col-md-4 col-sm-6'>
  <div class='card fixed-height'>
    <!-- <img class='card-img-top' src='<?php echo $poster; ?>' alt='Card image cap'> -->
    <img class='card-img-top' src='./images/moviePlaceholder.jpg' alt='Card image cap'>
    <div class='card-body d-flex flex-column text-center'>
        <h5 class='card-title truncate'><?php echo $title; ?></h5>
        <p class='card-text truncate'>Genre: <?php echo $genre; ?></p>
    </div>
    <div class='card-footer text-center mb-4'>
        <a class='btn btn-primary' href='movie-reviews.php?movie_id=<?php echo $movieId; ?>'>Movie reviews</a>
    </div>
  </div>
</div>
