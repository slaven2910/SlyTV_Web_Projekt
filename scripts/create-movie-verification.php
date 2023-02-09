
<?php
include '../scripts/connect.php';
// removes unnecessary data and prevents cross-site scripting / character escape
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$title = validate($_POST["title"]);
$publishingyear = validate($_POST["publishingyear"]);
$genre = validate($_POST["genre"]);
$plot = validate($_POST["plot"]);
$actors = validate($_POST["actors"]);
$user_id = $_SESSION['user_id'];

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
    header("Location: ../create-movie.php?error=file format is not supported&$userdata");
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
$statement = "INSERT INTO public.\"Movies\" (id, title, genre, publishingyear, plot, image, actors, user_id) VALUES ($id, '$title', '$genre', $publishingyear, '$plot', '$newfilename', '$actors', '$user_id')";
$queryResult = pg_query($dbConn, $statement);

if($queryResult){
    header("Location: ../movie-reviews.php?movie_id=$id");
    exit();
} else  {
    header("Location: ../create-movie.php?error=some information you typed in was not valid&$userdata");
    exit();
}
?>