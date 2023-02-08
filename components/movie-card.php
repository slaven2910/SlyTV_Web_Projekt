
<!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <div class="col-lg-3 col-md-4 col-sm-6 pb-4">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <div class="card border-radius">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="movie-card-image border-radius mt-3" style="background-image: url(<?php $path="./assets/images/"; echo $path . $poster?>)"></div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="card-body d-flex flex-column text-center">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <h5 class="card-title truncate"> <?php echo "$title "; ?> </h5>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <p class="card-text truncate">Genre: <?php echo $genre; ?></p>
    </div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="card-footer text-center mb-4">
      <!-- Bezugnahme auf Design-Elemente von [@thelaazyguy, Css Button Hover #2 - Background]. -->
      <div class="button-wrapper">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <?php if (!strpos($_SERVER['REQUEST_URI'], 'delete-movie.php') === false){
          echo "<form method='post'>";
        } ?>
        <input type="hidden" name="movie_id" value="<?php echo $movieId ?>">
      <<?php if (!strpos($_SERVER['REQUEST_URI'], 'index.php') === false){echo "a class='btn btn-sm bg-primary uppercase'";}else echo "button class='btn btn-sm bg-primary text-white uppercase'"; ?>
         <?php if (!strpos($_SERVER['REQUEST_URI'], 'index.php') === false){echo "href='movie-reviews.php?movie_id=$movieId'";}
                     else{echo "name='delete_movie' type='submit'";}
               ?>> 
        <span class="add-review-button">
          <?php if (!strpos($_SERVER['REQUEST_URI'], 'index.php') === false){ echo "Add a review";}
                else{ echo "Delete this movie";}
          ?>
        </span>
      <<?php if (!strpos($_SERVER['REQUEST_URI'], 'index.php') === false){echo "/a";}else echo "/button"; ?> >
        <?php 
          if (!strpos($_SERVER['REQUEST_URI'], 'delete-movie.php') === false){
            echo "</form>";
          } 
        ?>
      </div>
    </div>
  </div>
</div>

