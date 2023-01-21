<?php
$pdo = new PDO('pgsql:host=localhost; dbname=SlyTV', 'postgres', '1234');
/* 
// Check if the ID of the comment to be deleted has been sent in the request
if (isset($_POST['id'])) {
    // Get the ID of the comment to be deleted
    $commentId = (int)$_POST['id'];
  
    // Delete the comment from the database
    $stmt = $pdo->prepare("DELETE FROM movie_comments WHERE id = :id");
    // Bind the values
    $stmt->bindValue(':id', $commentId, PDO::PARAM_INT);
  
    // Execute the query
    $stmt->execute();
  } */


  

/* 
if (isset($_POST['id']) ) {
    $commentId = (int)$_POST['id'];

   
        // delete the comment from the database
        $stmt = $pdo->prepare("DELETE FROM movie_comments WHERE id = :id");
        $stmt->bindValue(':id', $commentId, PDO::PARAM_INT);
        $stmt->execute();
}

 */


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the comment, movie_id, and user_id values from the form
  $commentId = $_POST['id'];
 

  
  $stmt = $pdo->prepare("DELETE FROM movie_comments WHERE id = :id");
  $stmt->bindValue(':id', $commentId, PDO::PARAM_INT);
  $stmt->execute();

 
}


?>