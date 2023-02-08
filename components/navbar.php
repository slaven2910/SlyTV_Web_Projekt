<!DOCTYPE html>
<html lang="en">

<?php include('./components/header.php'); ?>

<body>

  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <section class="pb-2">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <nav class="navbar  navbar-expand-lg navbar-inverse d-flex justify-content-between border border-light">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <a class="navbar-brand" href="index.php">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <img src="assets/images/logo-white.png" class="img-fluid logo" style="width: 100px; height: 100px; border-radius:70%; overflow: hidden; margin-top: -6px;">
      </a>
    <h3>Your movie thoughts</h3>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <button class="navbar-toggler ml-auto iconClass" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span role="button">
          <!-- Bezugnahme auf Design-Elemente von [Font Awesome 5.15.3]. -->
          <i class="fa fa-bars" aria-hidden="true" style="color:black"></i>
        </span>
      </button>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <?php
        if (!strpos($_SERVER['REQUEST_URI'], 'index.php') === false) { ?>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <form class="d-flex align-items-center mx-auto search-form" role="search" method="post">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <input class="form-control me-2 search-bar" name="search_term" type="search" placeholder="Search movies.." aria-label="Search">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <button class="btn btn-outline-dark search-bar-button" type="submit">Search</button>
          </form>
        <?php } ?>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <ul class="navbar-nav mr-0 ">
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <li class="nav-item active ml-auto">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <a class="nav-link border border-light text-right mr-5" href="index.php">
              <span>Movies</span>
              <span class="sr-only"></span>
            </a>
          </li>
          <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {  ?>
          <li class="nav-item active ml-auto">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <a class="nav-link border border-light text-right mr-5" href="create-movie.php">
              <span>Add a Movie</span>
              <span class="sr-only"></span>
            </a>
          </li>
          <?php } ?>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <div class="vr mx-3"></div>

          <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {  ?>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <li class="nav-item dropdown ml-5">
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- Bezugnahme auf Design-Elemente von [Font Awesome 5.15.3]. -->
              <i class="fa fa-user-o"></i>
              </a>
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <ul class="dropdown-menu dropdown-menu-end">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <li><a class="dropdown-item"  href="./yourAccount.php">Your Reviews<span class="sr-only"></span></a></li>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <li><a class="dropdown-item"  href="./delete-movie.php">Your Movies<span class="sr-only"></span></a></li>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <li><a class="dropdown-item" href="./scripts/logout.php">Logout<span class="sr-only"></span></a></li>
              </ul>
            </li>
          <?php } else { ?>

            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <li class="nav-item active ml-auto">
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <a class="nav-link border border-light" href="./login.php">Login <span class="sr-only"></span></a>
            </li>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <li class="nav-item active ml-auto">
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <a class="nav-link border border-light" href="./signUp.php">Register <span class="sr-only"></span></a>
            </li>

          <?php } ?>
        </ul>
      </div>
    </nav>
  </section>
  <!-- Zugriff auf die Deklaration des Designs von [Font Awesome 5.15.3]. -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!-- Zugriff auf die Deklaration des Designs von [JQuery 3.5.1 Slim]. -->
  <script src="https://use.fontawesome.com/22109dfc6e.js"></script>
</body>

</html>