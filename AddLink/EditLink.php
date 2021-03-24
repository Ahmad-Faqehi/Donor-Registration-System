<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Link</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="showMatch.php">Show ID of Matches</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AddLink.php">Add New Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="EditLink.php">Edit Link</a>
      </li>

    </ul>

  </div>
</nav>

<div class="container">

<div class="p-4">
<?php if(!isset($_GET['update'])) : ?>
<form action="" method="get">
<div class="form-group">
    <label for="id">ID of Match</label>
    <input type="number" class="form-control" name="update">
    <br>
    <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
<?php endif; ?>
<?php
$msg = "";
$connection = mysqli_connect("localhost", "u743098254_star", "&WwaI33j", "u743098254_star");
if(isset($_POST['submit'])):


$id = mysqli_real_escape_string($connection,$_POST['id']);
$url = mysqli_real_escape_string($connection,$_POST['link']);


$sql = "UPDATE `apiurl` SET `url`='$url' WHERE id = $id";
$result = mysqli_query($connection,$sql);
if($result){
    $msg = '
    <div class="alert alert-success" role="alert">
    Update Done 
  </div>
    ';
}
endif;
echo $msg;
?>

<?php 

if(isset($_GET['update']) && !empty($_GET['update']) ):

$ids = (int)$_GET['update'];
$id = mysqli_real_escape_string($connection,$ids);

$sql = "SELECT * FROM apiurl where id = $id LIMIT 1";
$result =  mysqli_query($connection,$sql);
$count = mysqli_num_rows($result);
if($count == 0){

    $msg = '
    <div class="alert alert-danger" role="alert">
    There is No Result for this ID '.$id.' <a href="EditLink.php" class="btn btn-link"> Search Agine </a>  </div>';
    echo $msg;
}else{
$row = mysqli_fetch_assoc($result);


?>

    <form action="" method="post">

    <div class="form-group">
    <label for="id">ID of Match</label>
    <input type="number" class="form-control" name="id" value="<?=$id?>" readonly>
    </div>

    <div class="form-group">
    <label for="Link">Link</label>
    <input type="url" class="form-control" name="link" value="<?=$row['url']?>">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Updatee</button>
    </form>
    
    <?php 
}endif;
    ?>


    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

</body>
</html>