<?php
require_once 'db-connect/dbConnection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href=".\dist\css\styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="darkbg">
<div class="container">
    <!-- Navbar -->
    <?php include('./components/navbar.php'); ?>

<section>
<div class="well">
<?php
$id = $_GET["movie_id"];
echo $id;
$sqlSelect = "SELECT * from public.\"Movies\" where id=$id";
$queryResult = executeSQL($sqlSelect);
foreach($queryResult as $row){
  $movieId = $row['id'];
  $title = $row['title'];
  $plot = $row['plot'];
  $poster = $row['image'];

  $temp = "images\{$poster}";
  //SO geht es ohne Probelem aber aus dem $poster kommt was falsches raus

  echo "
  <div class='row'>
      <h2 class='text-light mx-auto d-block'>$title</h2>
  </div>
  <div class='row'>
      <img src='$temp' class='thumbnail mx-auto d-block' style='height:400px;width:400px;'>
  </div>
<div class='row'>
      <h3 class='mx-auto d-block text-light'>Plot:</h3>
      <p class='mx-auto d-block text-light'>$plot </p>
      <hr>
  </div>
";

}
?>
<!-- comment section -->
<?php include('./components/commentSection.php'); ?>
</div>
</section>





</div>
</div>
</body>
</html>