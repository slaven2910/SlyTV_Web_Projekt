<?php
session_start();

if (isset($_SESSION["user_id"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <?php include('./components/header.php'); ?>

  <body class="site-background">
    <div class="container-fluid">

      <?php include('./components/navbar.php'); ?>

      <section class="content-wrapper">
        <div class="row">
          <div class="col-lg-3 mb-5">
            <div class="d-flex justify-content-center py-4"><img src="./assets/images/user_profile_icon.png" class="img-fluid" alt="profile picture"><br><br><br></div>

            <ul class="list-group">
              <li class="list-group-item" style="color: black;"><?php echo $_SESSION["username"]; ?></li>
              <li class="list-group-item" style="color: black;"><?php echo $_SESSION["email"]; ?></li>
            </ul>

            <div class="d-flex justify-content-center py-4"><a class="btn btn-outline-danger w-100" href="./scripts/logout.php">Logout</a></div>

          </div>
          <div class="col-lg-9 my-4 text-content">
            <h2 class="text-primary pb-2">Your reviews</h2>
            <hr />

            <?php include('./scripts/connect.php');

            // Movie comments
            $movieCommentsQuery = 'SELECT public."movie_comments".id as comment_id, public."movie_comments".comment, 
              public."movie_comments".created_at,  public."Movies".title, public."Movies".id as movie_id
              FROM public."movie_comments" FULL OUTER JOIN public."Movies"  ON public."movie_comments".movie_id = public."Movies".id 
              WHERE public."movie_comments".user_id = ' . $_SESSION["user_id"] . ' ORDER BY created_at desc';

            $resultMovieComments = pg_query($dbConn, $movieCommentsQuery);

            if (pg_num_rows($resultMovieComments) > 0) {
              $rows = pg_fetch_all($resultMovieComments);

              foreach ($rows as $row) {
                // weiß nicht ob man das braucht

                $mCommentId = $row['comment_id'];
                $mId = $row['movie_id'];
                $mTitle = $row['title'];
                $mComment = $row['comment'];
                $mCreatedAt = date("d/m/Y H:i", strtotime($row['created_at']));
                ?>

                <form  id='comments' method='post'>
                  <ul class='list-group'>
                    <li class='list-group-item d-flex justify-content-between align-items-center'>
                      <div class='d-flex flex-column'>
                        <small class='text-left'>- <?php echo $_SESSION["username"]; ?></small>
                        <p class='text-left comment-multiple-lines' style="height:auto;" id="comment-text"><?php echo $mComment; ?></p>
                        <small class='text-left'><?php echo "Posted at: $mCreatedAt for $mTitle";?></small>
                      </div>
                      <div class='d-flex'>
                        <input type='hidden' name='comment_id' value='<?php $comment_id; ?>'>
                        <a 
                        href="#" 
                        class="edit-button btn btn-success mr-2"
                        name='edit-button' 
                        data-bs-toggle="modal" 
                        data-bs-target="#edit-comment-modal" 
                        data-comment-id="<?php $comment_id; ?>" 
                        data-movie-id="<?php $movie_id; ?>" 
                        data-comment-text="<?php $comment; ?>">
                        <i class='fa-sharp fa-solid fa-pen'></i>
                        </a>
                        <button 
                          type='submit' 
                          name='delete' 
                          class='btn btn-danger delete-button ml-2' 
                          id='delete-button' 
                          onclick="return confirm('Are you sure you want to delete this comment?');"
                        ><i class='fa-sharp fa-solid fa-trash'></i></button>    
                      </div>
                    </li>
                    <hr >
                  </ul>
                </form>

                <div class="modal fade" id="edit-comment-modal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="text-left pt-2 pl-3">Edit your comment:</h5>
                          <button type="button" class="btn-close justify-content-end" data-bs-dismiss="modal" aria-label="Close">
                          </button>
                      </div>
                      
                      <div class="modal-body">
                        <form id="edit-comment-form" method='post'>
                          <div class='d-flex flex-column'>
                            <small class='text-left'>- <?php echo $_SESSION["username"]; ?></small>
                            <input type="hidden" id="comment-id" name="comment_id">
                            <input type="hidden" id="movie-id" name="movie_id">
                            <textarea id="edit-comment-text"  name="new_comment_input"></textarea>     
                            <small class='text-left'><?php echo "Posted at: $mCreatedAt "?></small>   
                            <div class="row pt-3">
                              <div class="col-6">          
                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                              </div>
                              <div class="col-6 d-flex justify-content-end">          
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
                    var commentId = $(this).data('comment_id');
                    var commentText = $(this).data('comment');
                    var movieId = $(this).data('movie-id');
                    $('#comment-id').val(commentId);
                    $('#movie-id').val(movieId);
                    $('#comment-text').val(commentText);
                    $('#edit-comment-text').val(commentText);
                  });
                </script> <?php
              }
            }

            // Series comments
            // $seriesCommentsQuery = 'SELECT public."series_comments".id as comment_id, public."series_comments".comment, 
            // public."series_comments".created_at,  public."Series".title, public."Series".id as series_id
            // FROM public."series_comments" FULL OUTER JOIN public."Series" ON public."series_comments".series_id = public."Series".id 
            // WHERE public."series_comments".user_id = ' . $_SESSION["user_id"] . ' ORDER BY created_at desc';

            // $resultSeriesComments = pg_query($dbConn, $seriesCommentsQuery);

            // if (pg_num_rows($resultSeriesComments) > 0) {
            //   $rows = pg_fetch_all($resultSeriesComments);

            //   foreach ($rows as $row) {
            //     // weiß nicht ob man das braucht
            //     $sCommentId = $row['comment_id'];
            //     $sId = $row['series_id'];
            //     $sTitle = $row['title'];
            //     $sComment = $row['comment'];
            //     $sCreatedAt = date("d/m/Y H:i", strtotime($row['created_at']));
            //   }
            // }
            ?>
          </div>
        </div>
      </section>
    </div>
    <?php include('./components/footer.php') ?>
  </body>
  </html>

<?php
} else {
  header("Location: login.php");
  exit();
}
?>