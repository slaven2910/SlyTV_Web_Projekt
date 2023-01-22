
<section>
<script> var $dbConn = <?php echo json_encode($dbConn); ?>; </script>

<?php



if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
    // user is logged in
    $current_user = $_SESSION["user_id"];
  } else {
    // user is not logged in
    // redirect user to login page
    header("Location: login.php");
    exit;
  }
$current_user = $_SESSION["user_id"];
$movie_id = $_GET["movie_id"];
$comments = getComments($dbConn, $movie_id);
foreach($comments as $row){
  $user_name = $row['username'];
  $comment = $row['comment'];
  $comment_id = $row['id'];
  $created_at = date("d/m/Y H:i", strtotime($row['created_at']));
  $user_id  = $row['user_id'];
?>

<form  id='comments' method='post'>
  <ul class='list-group'>
    <li class='list-group-item d-flex justify-content-between align-items-center'>
      <div class='d-flex flex-column'>
        <small class='text-left'>- <?php echo $user_name ?></small>
        <p class='text-left' id="comment-text"><?php echo $comment ?></p>
        <small class='text-left'><?php echo "Posted at: $created_at "?></small>
      </div>
      <div class='d-flex'>
        <input type='hidden' name='comment_id' value='<?php echo $comment_id ?>'>
        <?php  if($current_user == $user_id) { ?>
        <a 
        href="#" 
        class="edit-button btn btn-success"
        name='edit-button' 
        data-toggle="modal" 
        data-target="#edit-comment-modal" 
        data-comment-id="<?php echo $comment_id; ?>" 
        data-movie-id="<?php echo $movie_id; ?>" 
        data-comment-text="<?php echo $comment; ?>">
        <i class='fa-sharp fa-solid fa-pen'></i>
        </a>
        <button 
          type='submit' 
          name='delete' 
          class='btn btn-danger delete-button' 
          id='delete-button' 
          onclick="return confirm('Are you sure you want to delete this comment?');"
        ><i class='fa-sharp fa-solid fa-trash'></i></button>    
        <?php  } ?>
      </div>
    </li>
    <hr >
  </ul>
</form>

<div class="modal fade" id="edit-comment-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="row">
        <div class="col-9">
          <h5 class="text-left pt-2 pl-3">Edit your comment:</h5>
        </div>
        <div class="col-3">
          <button type="button" class="close text-right px-2" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="modal-body">
        <form id="edit-comment-form" method='post'>
          <div class='d-flex flex-column'>
            <small class='text-left'>- <?php echo $user_name ?></small>
            <input type="hidden" id="comment-id" name="comment_id">
            <input type="hidden" id="movie-id" name="movie_id">
            <textarea id="edit-comment-text" name="new_comment_input"></textarea>     
            <small class='text-left'><?php echo "Posted at: $created_at "?></small>   
            <div class="row">
              <div class="col-6">          
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              <div class="col-6">          
                <button type="submit" id="update-button" name="update" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $('.edit-button').click(function() {
    var commentId = $(this).data('comment-id');
    var commentText = $(this).data('comment-text');
    var movieId = $(this).data('movie-id');
    $('#comment-id').val(commentId);
    $('#movie-id').val(movieId);
    $('#comment-text').val(commentText);
    $('#edit-comment-text').val(commentText);
  });
</script>


<?php } ?>
 </section>
