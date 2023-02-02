<?php
session_start();

if (isset($_SESSION["user_id"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) {

?>
  <!DOCTYPE html>
  <html lang="en">

  <?php include('./components/header.php'); ?>

  <body class="site-background">
    <div class="col">
      <?php include('./components/navbar.php'); ?>

      <div class="row">
        <div class="col-lg-3 mb-5">
          <div class="d-flex justify-content-center py-4"><img src="./assets/images/user_profile_icon.png" class="img-fluid" alt="profile picture"><br><br><br></div>

          <ul class="list-group">
            <li class="list-group-item" style="color: blue;"><?php echo $_SESSION["username"]; ?></li>
            <li class="list-group-item" style="color: blue;"><?php echo $_SESSION["email"]; ?></li>
          </ul>

          <div class="d-flex justify-content-center py-4"><a class="btn btn-outline-danger w-100" href="logout.php">Logout</a></div>

        </div>
        <div class="col-lg-9 my-4 text-content">
          <h2 class="text-primary">The story of my life</h2>
          <hr />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque turpis eu molestie molestie.
          Integer tristique quam facilisis urna sagittis pulvinar. Nunc lacinia faucibus nisl, vel sodales elit lobortis nec.
          Vivamus et odio vel justo dignissim semper. Integer sit amet vehicula est, pellentesque elementum ex. Lorem ipsum dolor sit amet,
          consectetur adipiscing elit. Maecenas a felis eros. Nunc ultricies odio a urna pharetra molestie. Duis vitae arcu nulla. Morbi
          rhoncus felis non tellus mollis, vel porttitor ante tincidunt. Sed vulputate volutpat fringilla. Sed varius, magna id eleifend rutrum,
          velit odio sagittis leo, sit amet egestas orci dui vel ex. Phasellus dapibus tempor orci eget semper.

          Mauris tincidunt dolor nec ipsum eleifend ullamcorper. Donec sed commodo lorem. Vestibulum finibus quam quis urna venenatis pharetra.
          Ut suscipit velit sit amet turpis convallis consectetur. Praesent tristique vulputate venenatis. Nam vehicula laoreet elit, eget lacinia
          sapien dignissim non. Nullam in egestas tortor. Vestibulum sit amet elit bibendum odio congue fermentum. Sed volutpat ultricies magna,
          facilisis pharetra sapien luctus id. In id maximus nibh. Morbi pulvinar sodales urna, et posuere est vulputate ac. Suspendisse facilisis,
          lacus non placerat mollis, lectus nisi condimentum mi, imperdiet ultrices mi risus vel sapien. Donec sed ligula non massa congue malesuada.
        </div>
      </div>

      </>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </html>

<?php
} else {
  header("Location: login.php");
  exit();
}
?>