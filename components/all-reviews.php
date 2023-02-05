<hr color="white">

<!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
<section class="mt-5">
  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
<h3 class="mb-4">Reviews:</h3>
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

  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <ul class='list-group'>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <li class='list-group-item d-flex justify-content-between align-items-center'>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <div class='d-flex flex-column'>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <small class='text-left' id="username">- <?php echo "$user_name $comment_id"; ?></small>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <p class='text-left comment-multiple-lines' style="height:auto;" id="comment-text"><?php echo $comment ?></p>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <small class='text-left'><?php echo "Posted at: $created_at "?></small>
      </div>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <div class='d-flex'>
        <input type='hidden' name='comment_id' value='<?php echo $comment_id ?>'>
        <?php  if($current_user == $user_id) { ?>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <a 
        href="#" 
        class="edit-button btn btn-success mr-2"
        name='edit-button' 
        data-bs-toggle="modal" 
        data-bs-target="#edit-comment-modal" 
        data-comment-id="<?php echo $comment_id; ?>" 
        data-movie-id="<?php echo $movie_id; ?>" 
        data-comment-text="<?php echo $comment; ?>"
        data-user-name="<?php echo $user_name; ?>"
        data-created-at="<?php echo $created_at; ?>">

        <!-- Bezugnahme auf Design-Elemente von [Font Awesome 5.15.3]. -->
        <i class='fa-sharp fa-solid fa-pen'></i>
        </a>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <button 
          type='submit' 
          name='delete' 
          class='btn btn-danger delete-button ml-2' 
          id='delete-button' 
          onclick="return confirm('Are you sure you want to delete this comment?');"
        ><i class='fa-sharp fa-solid fa-trash'></i></button>    
        <?php  } ?>
      </div>
    </li>
    <hr >
  </ul>
</form>

<!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
<div class="modal fade" id="edit-comment-modal" tabindex="-1" aria-hidden="true">
  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
  <div class="modal-dialog modal-dialog-centered">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="modal-content">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="modal-header">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <h5 class="text-left pt-2 pl-3">Edit your comment:</h5>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <button type="button" class="btn-close justify-content-end" data-bs-dismiss="modal" aria-label="Close">
          </button>
      </div>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <div class="modal-body">
        <form id="edit-comment-form" method='post'>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <div class='d-flex flex-column'>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <input type="text" readonly style="border: 0; outline:none;" class='text-left' id="user-name" name="user_name">
            <input type="hidden" id="comment-id" name="comment_id">
            <input type="hidden" id="movie-id" name="movie_id">
            <textarea id="edit-comment-text"  name="new_comment_input"></textarea>     

            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <small class='text-left'>Posted at:  
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <input type="text" readonly style="border: 0; outline:none;" class='text-left' id="created-at" name="created_at">
            </small> 
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="row pt-3">
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <div class="col-6">          
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
              </div>
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <div class="col-6 d-flex justify-content-end">          
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <button type="submit" id="update-button" name="update" class="btn btn-dark">Save changes</button>
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

    var username = $(this).data('user-name');
    var createdAt = $(this).data('created-at');
    $('#comment-id').val(commentId);
    $('#movie-id').val(movieId);
    $('#user-name').val(username);
    $('#comment-text').val(commentText);
    $('#created-at').val(createdAt);
    $('#edit-comment-text').val(commentText);
  });
</script>

</div>
 </section>
