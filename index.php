<?php 
require_once 'db-connect/dbConnection.php';
session_start();

  // Save the current URL in a session variable
  $_SESSION['original_page'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieReviewApp
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
  <div class="darkbg">
<div class="container">
<!-- Navbar -->
<?php include('./components/navbar.php'); ?>

<section>
<div class="row py-5">
<?php

$sqlSelect = "select * from public.\"Movies\"";
$queryResult = executeSQL($sqlSelect);
foreach($queryResult as $row){
  $movieId = $row['id'];
  $title = $row['title'];
  $genre = $row['genre'];
  $publishingYear = $row['publishingyear'];
  // TODO: need to change later
  
  $plot = $row['plot'];
  $poster = $row['image'];
  $dom = new DOMDocument();
 
  echo "<div class='col-md-3 '>
  <div class='well text-center'>
  <div>
  <h5 class='whiteText row justify-content-center'>${title}</h5>
  </div>
      <img src='$poster' style='height: 14rem; object-fit: cover;'>
      <a class='btnStylez' id='toMovieDetailsButton' href='movieDetails.php?movie_id=$movieId'>Movie Details</a>
  </div>
</div>";
}
?>
<script>
  document.getElementById('toMovieDetailsButton').onClick = function(){
    <?php $_SESSION['original_page'] = "movieDetails.php?movie_id=$movieId"?>
    //check the login status
    if(!<?php echo $_SESSION['logged_in']; ?>){
      //The user isnt logged in, redircct tbem to the login page
      this.document.setAttribute('href', 'login.php');
    }
    
  }
</script>
</div>
</section>
</div>
</div>
</body>
</html>