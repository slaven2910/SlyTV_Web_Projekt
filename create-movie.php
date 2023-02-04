<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-a-Movie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<?php include('./components/navbar.php'); ?>
<div>
    <form action="send-to-database.php" method="POST">
    <h2>Füge einen Film hinzu</h2>
    <br>
    <div class="form-outline form-white mb-4">
        <input type="name" name="Title" />
        <label for="typePasswordX">Name des Films</label>
    </div>
    <br>
    <div>	

    </div>
    <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>