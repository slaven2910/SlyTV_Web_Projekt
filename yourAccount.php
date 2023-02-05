<?php
session_start();

if (isset($_SESSION["user_id"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <?php include('./components/header.php');
  
  $user_name = $_SESSION["username"];
  $user_id = $_SESSION["user_id"]; ?>

  <body class="site-background">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
    <div class="container-fluid">

      <?php include('./components/navbar.php'); ?>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
      <section class="content-wrapper">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <div class="row">
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <div class="col-lg-3 mb-5">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="d-flex justify-content-center py-4"><img src="./assets/images/user_profile_icon.png" class="img-fluid" alt="profile picture"><br><br><br></div>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <ul class="list-group">
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <li class="list-group-item" style="color: black;"><?php echo $user_name; ?></li>
              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
              <li class="list-group-item" style="color: black;"><?php echo $_SESSION["email"]; ?></li>
            </ul>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <div class="d-flex justify-content-center py-4"><a class="btn btn-outline-danger w-100" href="./scripts/logout.php">Logout</a></div>

          </div>
          <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
          <div class="col-lg-9 my-4 text-content">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
            <h2 class="text-primary pb-2">Your reviews</h2>
            <hr />

            <?php include('./scripts/connect.php');
                  include 'scripts/review.php';

            // Movie comments
            $movieCommentsQuery = 'SELECT public."movie_comments".id as comment_id, public."movie_comments".comment, 
              public."movie_comments".created_at,  public."Movies".title, public."Movies".id as movie_id
              FROM public."movie_comments" FULL OUTER JOIN public."Movies"  ON public."movie_comments".movie_id = public."Movies".id 
              WHERE public."movie_comments".user_id = ' . $user_id . ' ORDER BY created_at desc';

            $resultMovieComments = pg_query($dbConn, $movieCommentsQuery);

            if (pg_num_rows($resultMovieComments) > 0) {
              $rows = pg_fetch_all($resultMovieComments);

              foreach ($rows as $row) {
                // weiß nicht ob man das braucht
                $comment_id = $row['comment_id'];
                $movie_id = $row['movie_id'];
                $movie_title = $row['title'];
                $comment = $row['comment'];
                $created_at = date("d/m/Y H:i", strtotime($row['created_at']));
                ?>

                <form  id='comments' method='post'>
                  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                  <ul class='list-group'>
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                    <li class='list-group-item d-flex justify-content-between align-items-center'>
                      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                      <div class='d-flex flex-column'>
                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                        <small class='text-left'>- <?php echo $user_name; ?></small>
                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                        <p class='text-left comment-multiple-lines' style="height:auto;" id="comment-text"><?php echo $comment; ?></p>
                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                        <small class='text-left'><?php echo "Posted at: $created_at for $movie_title";?></small>
                      </div>
                      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                      <div class='d-flex'>
                      <input type='hidden' name='comment_id' value='<?php echo $comment_id ?>'>
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
                        data-created-at="<?php echo $created_at; ?>"
                        data-movie-title="<?php echo $movie_title; ?>">
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
                        >
                        <!-- Bezugnahme auf Design-Elemente von [Font Awesome 5.15.3]. -->
                        <i class='fa-sharp fa-solid fa-trash'></i></button>    

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
                            <small class='text-left'>- <?php echo $user_name; ?></small>
                            <input type="hidden" id="comment-id" name="comment_id">
                            <input type="hidden" id="movie-id" name="movie_id">
                            <textarea id="edit-comment-text"  name="new_comment_input"></textarea>     
                            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                            <small class='text-left'>Posted at: 
                              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                              <input type="text" readonly style="border: 0; outline:none; width: 115px;" class='text-left' id="created-at" name="created_at"> 
                              for
                              <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                              <input type="text" readonly style="border: 0; outline:none;" class='text-left' id="movie-title" name="movie_title"> 
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
                    var movieTitle = $(this).data('movie-title');
                    $('#comment-id').val(commentId);
                    $('#movie-id').val(movieId);
                    $('#comment-text').val(commentText);
                    $('#created-at').val(createdAt);
                    $('#movie-title').val(movieTitle);
                    $('#edit-comment-text').val(commentText);
                  });
                </script>
                <?php
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
    <div class="fixed-bottom">
    <?php include './components/footer.php'; ?>
    </div>
  </body>
  </html>

<?php
} else {
  header("Location: login.php");
  exit();
}
?>