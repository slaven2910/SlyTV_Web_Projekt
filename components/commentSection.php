<?php
require_once 'post-comment.php';
require_once 'delete-comment.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieReviewApp
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="..\dist\css\styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
<body>
<div class="darkbg">
<section>
  <h3 class="whiteText">Comments:</h3>
<hr color="white">
<?php 
  $movie_id = $_GET["movie_id"];
  $user_id = $_SESSION['user_id'];
?>
<form id="comment-form" action="/post-comment.php" method="post">
  <label class="whiteText" for="comment">Your movie thoughts..</label><br>
  <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
  <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>">
  <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
  <input class="btn btn-dark border border-light textWhite mb-3" type="submit" value="Submit">
</form> 

<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('comment-form');
  form.addEventListener('submit', event => {
    event.preventDefault(); // Prevent the form from being submitted

    // Get the form data
    const formData = new FormData(form);
    console.log(formData);
    for (const [key, value] of formData.entries()) {
      console.log(key, value);
    }

    // Send a Fetch request to the server
    fetch('post-comment.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        // Update the comments on the page
        document.getElementById('comments').innerHTML = data;
        location.href = location.href;
        console.log("refreshed")
      });
  });
});
</script>

<hr>
</section>
<!-- other comments -->
<section>
<?php
$movie_id = $_GET["movie_id"];

$commentsQuery = "SELECT u.username, mc.comment, mc.id
FROM public.\"Users\" u
INNER JOIN public.\"movie_comments\" mc ON u.user_id = mc.user_id
WHERE mc.movie_id = $movie_id
";
$queryResult = executeSQL($commentsQuery);
foreach($queryResult as $row){
  $user_name = $row['username'];
  $comment = $row['comment'];
  $commentId = $row['id'];
 
  echo "
  <form  id='comments' method='post' action='delete-comment.php'>
  <ul class='list-group'>
  <li class='list-group-item'>
    <div class='d-flex bd-highlight'>
    <small class='mr-auto p-2 bd-highlight'>- $user_name</small>
    <p> $comment </p>
    <input type='hidden' name='id' value='$commentId'>
    <a href='edit.php' class='p-2 bd-highlight' name='edit-button'><i class='fa-sharp fa-solid fa-pen'></i></a>
    <div id='form-container'>
    <form id='delete-form'>
    <input type='hidden' name='id' value='$commentId' >
    <button type='submit' class='btn btn-danger delete-button' id='delete-button'>Delete</button>    
    </form>
    </div>
    
</li>
<hr >
</ul>
</form>
$commentId
";
?>

<script> 
document.addEventListener('DOMContentLoaded', () => {
  
  const submitButton = document.getElementById('delete-button');
  const modal = document.getElementById('my-modal');
  const okButton = document.getElementById('modal-ok-button');
/*   console.log(okButton);
  console.log(submitButton); */
  /* console.log(modal); */


  submitButton.addEventListener('click', event => {
    console.log('submit button clicked');
    event.preventDefault(); // Prevent the form from being submitted immediately
    modal.style.display = 'block'; // Show the confirmation modal
  });

  okButton.addEventListener('click', event => {
    console.log('ok button clicked');
    event.preventDefault(); // Prevent the form from being submitted immediately

    // Get the form data
    const formData = new FormData(document.getElementById("delete-form"));
    console.log(formData);

    // Send a Fetch request to the server
    fetch('delete-comment.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        // Update the comments on the page
        document.getElementById('comments').innerHTML = data;
/*         location.href = location.href;
 */        console.log("refreshed")
      });
  });
});
</script>

<!-- <script>
  function openConfirmationModal() {
  if (confirm("Are you sure you want to do this?")) {
    // user clicked "OK"
    // do something
  } else {
    // user clicked "Cancel"
    // do something else
  }
}
function onSubmit(){
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('delete-form');
  form.addEventListener('submit', event => {
    event.preventDefault(); // Prevent the form from being submitted

    // Get the form data
    const formData = new FormData(form);
    console.log(formData);
    for (const [key, value] of formData.entries()) {
      console.log(key, value);
    }

    // Send a Fetch request to the server
    fetch('delete-comment.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        // Update the comments on the page
        document.getElementById('comments').innerHTML = data;
        location.href = location.href;
        console.log("refreshed")
      });
  });
});
}
</script> -->

<!-- Confirmation modal -->

<div id="my-modal" class="modal">
  <div class="modal-content">
    <p>Are you sure you want to do this?</p>
    <div class="modal-buttons">
      <button id="modal-cancel-button">Cancel</button>
      <button id="modal-ok-button">OK</button>
    </div>
  </div>
</div>

<!-- <div id="confirm-modal" class="modal">
  <div class="modal-content">
    <p>Are you sure you want to delete this comment? This action is irreversible.</p>
    <button id="confirm-button">Delete</button>
    <button id="cancel-button">Cancel</button>
  </div>
</div> -->

<?php } ?>
 
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</div>
</body>
</html>