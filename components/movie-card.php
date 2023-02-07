
<!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <div class="col-lg-3 col-md-4 col-sm-6 pb-4">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <div class="card border-radius">
    <div class="movie-card-image border-radius mt-3" style="background-image: url(<?php $path="./assets/images/"; echo $path . $poster?>)"></div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="card-body d-flex flex-column text-center">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <h5 class="card-title truncate"> <?php echo $title; ?> </h5>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <p class="card-text truncate">Genre: <?php echo $genre; ?></p>
    </div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="card-footer text-center mb-4">
      <!-- Bezugnahme auf Design-Elemente von [Animated CSS Buttons]. -->
      <div class="button-wrapper">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <a class="btn btn-sm bg-primary uppercase" href="movie-reviews.php?movie_id=<?php echo $movieId; ?>"> <span class="add-review-button">Add a review</span></a>
      </div>
    </div>
  </div>
</div>

