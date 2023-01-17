<?php
session_start();

if (isset($_SESSION["user_id"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      <?php echo $_SESSION["username"] . "'s Profile"; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
  </head>

  <body>
    <?php include('./components/navbar.php'); ?>

    <div class="row">
      <div class="col-lg-3 mb-5">
        <div class="d-flex justify-content-center py-4"><img src="png/default_profile.png" class="img-fluid" alt="profile picture"><br><br><br></div>

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


  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </html>

<?php
} else {
  header("Location: login.php");
  exit();
}
?>