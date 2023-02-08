<?php
session_start();

if (isset($_SESSION["user_id"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <?php include('./components/header.php');
  
  $user_name = $_SESSION["username"];
  $user_id = $_SESSION["user_id"]; ?>

  <body class="site-background">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="container-fluid">

      <?php include('./components/navbar.php'); ?>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <section class="content-wrapper">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <div class="row">
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <div class="col-lg-3 mb-5">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="d-flex justify-content-center py-4"><img src="./assets/images/user_profile_icon.png" class="img-fluid" 
              alt="profile picture"><br><br><br></div>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <ul class="list-group">
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <li class="list-group-item" style="color: black;"><?php echo $user_name; ?></li>
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <li class="list-group-item" style="color: black;"><?php echo $_SESSION["email"]; ?></li>
            </ul>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="d-flex justify-content-center py-4">
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <a class="btn btn-outline-danger w-100" href="./scripts/logout.php">Logout</a>
            </div>

          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <div class="col-lg-9 my-4 text-content">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <h2 class="text-primary pb-2">Your movies:</h2>
            <hr />
            <div class="row mb-4 py-5">
            <?php include('./scripts/movie.php');
                $movies = getMoviesForUser($dbConn, $user_id);
                foreach($movies as $movie){
                    $movieId = $movie['id'];
                    $title = $movie['title'];
                    $genre = $movie['genre'];
                    $publishing_year = $movie['publishingyear'];
                    $plot = $movie['plot'];
                    $poster = $movie['image'];
                    include './components/movie-card.php';
                }
            ?>
          </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="fixed-bottom">
      <?php include './components/footer.php'; ?>
    </div>
  </body>
  </html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>