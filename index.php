<?php 
include('./scripts/movie.php');
?>

<!DOCTYPE html>
<html lang="en">
        
    <?php include('./components/header.php'); ?>

    <body class="site-background">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
        <div class="container-fluid">
            <!-- Navbar -->
            <?php include('./components/navbar.php'); ?>
            <section class="content-wrapper">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. -->
                <div class="row mb-4 py-5">

                    <?php
                    if (isset($_POST['search_term'])) {
                        $search_term = $_POST['search_term'];
                        $movies = searchMovies($dbConn, $search_term);
                        if(count($movies) == 0){
                            // Bezugnahme auf Design-Elemente von [Bootstrap 5.2.3]. 
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show text-center mx-auto mb-5' role='alert'>
                            No movies found for '$search_term'.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";

                            $movies = getMovies($dbConn);
                            foreach($movies as $movie){
                                $movieId = $movie['id'];
                                $title = $movie['title'];
                                $genre = $movie['genre'];
                                $publishing_year = $movie['publishingyear'];
                                $plot = $movie['plot'];
                                $poster = $movie['image'];
                                include './components/movie-card.php';
                            }
                        }else{
                            foreach($movies as $movie){
                                $movieId = $movie['id'];
                                $title = $movie['title'];
                                $genre = $movie['genre'];
                                $publishing_year = $movie['publishingyear'];
                                $plot = $movie['plot'];
                                $poster = $movie['image'];
                            include './components/movie-card.php';
                            }
                        }
                    } else {
                        $movies = getMovies($dbConn);
                            foreach($movies as $movie){
                                $movieId = $movie['id'];
                                $title = $movie['title'];
                                $genre = $movie['genre'];
                                $publishing_year = $movie['publishingyear'];
                                $plot = $movie['plot'];
                                $poster = $movie['image'];
                                include './components/movie-card.php';
                            }
                    }
                    ?>

                </div>
            </section>
        </div>
        <?php include './components/footer.php'; ?>

    </body>
</html>