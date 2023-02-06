<!DOCTYPE html>
<html>
<?php include('./components/header.php'); ?>

<body class="site-background">
<div class="container-fluid ">
<?php include('./components/navbar.php'); ?>
<section class="content-wrapper text-left">
<div>
    
    <form action="send-to-database.php" method="POST">
    <h2>Add a movie</h2>
    <br>
    <div class="form-outline form-white mb-4">
        <input type="name" name="title" />
        <label>Movie Name</label>
    </div>
    <br>
    <div class="form-outline form-white mb-4">
        <input type="month" name="publishingyear" />
        <label>Publishing Year</label>
    </div>
    <br>
    <div class="form-outline form-white mb-4">
        <input type="name" name="genre" />
        <label>Genre</label>
    </div>
    <br>
    <div class="form-outline form-white mb-4">
        <input type="name" name="plot" />
        <label>Plot</label>
    </div>
    <br>
    <div class="form-outline form-white mb-4">
        <input type="name" name="actors" />
        <label>Actors</label>
    </div>
    <br>
    <div class="form-outline form-white mb-4">
        <input type="file" name="image" />
        <label>Movie Image</label>
    </div>
    <input type="submit" value="Submit">
    </form>
</div>
</section>
</div>
</body>
</html>