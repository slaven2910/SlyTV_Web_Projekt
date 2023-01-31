<!DOCTYPE html>
<html lang="en">

<?php include('./components/header.php'); ?>

<body>
  <!-- Navbar -->
  <section class=" pb-2">
    <nav class="navbar navbar-expand-lg navbar-inverse d-flex justify-content-between border border-light">
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo-white.png" class="img-fluid logo" style="width: 100px; height: 100px; border-radius:70%; overflow: hidden; margin-top: -6px;">
      </a>
    <h3>Your movie thoughts</h3>
      <button class="navbar-toggler ml-auto iconClass" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="" role="button">
          <i class="fa fa-bars" aria-hidden="true" style="color:black"></i>
        </span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <?php
        if (!strpos($_SERVER['REQUEST_URI'], 'index.php') === false) { ?>
          <form class="d-flex align-items-center mx-auto search-form" role="search" method="post">
            <input class="form-control me-2 search-bar" name="search_term" type="search" placeholder="Search movies.." aria-label="Search">
            <button class="btn btn-outline-dark search-bar-button" type="submit">Search</button>
          </form>
        <?php } ?>
        <ul class="navbar-nav mr-0 ">
          <li class="nav-item active ml-auto">
            <a class="nav-link border border-light text-right" href="index.php">
              <span>Movies</span>
              <span class="sr-only"></span>
            </a>
          </li>
          

          <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {  ?>
            <li class="nav-item dropdown ml-3">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user-o"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item"  href="./yourAccount.php">Your Account<span class="sr-only"></span></a></li>
                <li><a class="dropdown-item" href="./scripts/logout.php">Logout<span class="sr-only"></span></a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="nav-item active ml-auto">
              <a class="nav-link border border-light" href="./login.php">Login <span class="sr-only"></span></a>
            </li>
            <li class="nav-item active ml-auto">
              <a class="nav-link border border-light" href="./signUp.php">Register <span class="sr-only"></span></a>
            </li>

          <?php } ?>
        </ul>
      </div>
    </nav>



  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/22109dfc6e.js"></script>
  <script src="./scripts/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>