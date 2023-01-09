
<!-- upload comment -->

<?php
if (session_status() == PHP_SESSION_NONE) {
    // Start the session
    session_start();
  }

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  // Redirect the user to the login page
  header('Location: /login.php');
  exit;
}

// Connect to the database
$pdo = new PDO('pgsql:host=localhost, dbname=SlyTV', 'postgres', 'aspire938');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the comment, movie_id, and user_id values from the form
  $comment = $_POST['comment'];
  $movie_id = $_POST['movie_id'];
  $user_id = $_SESSION['user_id'];

  if($comment === ""){
    echo "
          Hello, world! This is a toast message.
      ";
  }else{
     // Insert the new comment into the movie_comments table
  $stmt = $pdo->prepare('INSERT INTO movie_comments (user_id, movie_id, comment) VALUES (?, ?, ?)');
  $stmt->execute([$user_id, $movie_id, $comment]);
  }
 
}

?>


