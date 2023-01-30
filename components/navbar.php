<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MovieReviewApp
  </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
  <!-- Navbar -->
  <section class=" pb-2">
    <nav class="navbar navbar-expand-lg navbar-inverse d-flex justify-content-between border border-light">
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo-white.png" class="img-fluid logo" style="width: 100px; height: 100px; border-radius:70%; overflow: hidden; margin-top: -6px;">
      </a>
<h5>Your movie thoughts</h5>
      <button class="navbar-toggle ml-auto iconClass" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="" role="button">
          <i class="fa fa-bars" aria-hidden="true" style="color:black"></i>
        </span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <?php
        if (strpos($_SERVER['REQUEST_URI'], 'login.php') === false && strpos($_SERVER['REQUEST_URI'], 'signUp.php') === false) { ?>
          <form class="d-flex align-items-center mr-auto ml-auto search-form" role="search" method="post">
            <input class="form-control me-2 search-bar" name="search_term" type="search" placeholder="Search movies.." aria-label="Search">
            <button class="btn btn-outline-dark ml-2 search-bar-button" type="submit">Search</button>
          </form>
        <?php } ?>
        <ul class="navbar-nav mr-0 ">
          <li class="nav-item active ml-auto">
            <a class="nav-link border border-light " href="index.php">
              <span>Movies</span>
              <span class="sr-only"></span>
            </a>
          </li>

          <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {  ?>
            <li class="nav-item ml-3">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-o" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a class="dropdown-item" type="button" href="./yourAccount.php">Your Account<span class="sr-only"></a></li>
                <li><a class="dropdown-item" type="button" href="./scripts/logout.php">Logout<span class="sr-only"></span></a></li>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/22109dfc6e.js"></script>
  <script src="./scripts/scripts.js"></script>
</body>

</html>