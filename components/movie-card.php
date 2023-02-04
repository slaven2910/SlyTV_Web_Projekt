
  <div class="col-lg-3 col-md-4 col-sm-6 pb-4">
  <div class="card border-radius">
    <div class="movie-image-placeholder border-radius" style="background-image: url(<?php $path = './assets/images/'; echo $path . $poster?>)"
      ></div>
    <div class="card-body d-flex flex-column text-center">
      <h5 class="card-title truncate"> <?php echo $title; ?> </h5>
      <p class="card-text truncate">Genre: <?php echo $genre; ?></p>
    </div>
    <div class="card-footer text-center mb-4">
      <div class="button-wrapper">
      <a class="btn bg-primary uppercase" href="movie-reviews.php?movie_id=<?php echo $movieId; ?>"> <span>Add a review</span></a>
      </div>
    </div>
  </div>
</div>
