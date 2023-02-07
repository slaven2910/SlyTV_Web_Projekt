<?php
include '../scripts/connect.php';

if (!$dbConn) {
    echo "Ein Fehler ist aufgetreten.\n";
    exit;
}

$title = $_POST["title"];
$publishingyear = $_POST["publishingyear"];
$genre = $_POST["genre"];
$plot = $_POST["plot"];
$actors = $_POST["actors"];

//save useradata to give it back if image is not the right format
$userdata = "title=" . $title . "&publishingyear=" . $publishingyear . "&genre=" . $genre . "&plot=" . $plot . "&actors=" . $actors;

//get filetype of the uploaded image
$filetype = $_FILES['image']['type'];

//validates if the image format is ok
if(
    $filetype != "image/jpg" &&
	$filetype != "image/jpeg" &&
    $filetype != "image/png" 
){
    echo "Sorry this file type is not supported";
    header("Location: ../create-movie.php?error=file_format_is_not_supported&$userdata");
    exit;
}

//get more values from the uploaded image
$filename = $_FILES['image']['name'];
$tmpfilename = $_FILES['image']['tmp_name'];

//rename the uploaded file and move it to the images folder
$fileasarry = explode('.', $filename);
$fileextesion = end($fileasarry);
$newfilename = str_replace(" ", "-", $title) . "." . $fileextesion;
$destination = "../assets/images/". $newfilename;
move_uploaded_file($tmpfilename, $destination);

//count the rows in Movies to determine id
$query = "SELECT * FROM public.\"Movies\"";
$rowtable = pg_query($dbConn, $query);
$id = 1 + pg_num_rows($rowtable);


// SQL statement to add movie to the database
$statement = "INSERT INTO public.\"Movies\" (id, title, genre, publishingyear, plot, image, actors) VALUES ($id, '$title', '$genre', $publishingyear, '$plot', '$newfilename', '$actors')";
$queryResult = pg_query($dbConn, $statement);

if($queryResult){
    header("Location: ../movie-reviews.php?movie_id=$id");
    exit();
} else  {
    header("Location: ../create-movie.php?error=php-insert-failed&$userdata");
    exit();
}
?>