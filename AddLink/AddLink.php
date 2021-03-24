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

<?php
function shortadd(){

    if(isset($_GET['id'])){
        return $_GET['id'];
    }

}
$msg = "";
if(isset($_POST['submit'])):

$connection = mysqli_connect("localhost", "u743098254_star", "&WwaI33j", "u743098254_star");

$id = mysqli_real_escape_string($connection,$_POST['id']);
$url = mysqli_real_escape_string($connection,$_POST['link']);

$check = mysqli_query($connection,"SELECT * FROM `apiurl` WHERE id = $id");
$count = mysqli_num_rows($check);

if($count > 0){
    $sql = "UPDATE `apiurl` SET `url`= '$url' WHERE id = $id";
}else{
    $sql = "INSERT INTO `apiurl`(`id`, `url`) VALUES ($id,'$url')";
}



$result = mysqli_query($connection,$sql);
if($result){
    $msg = '
    <div class="alert alert-success" role="alert">
    Add Done 
  </div>
    ';
}
endif;
echo $msg;
?>

    <form action="" method="post">

    <div class="form-group">
    <label for="id">ID of Match</label>
    <input type="number" class="form-control" value="<?php echo shortadd(); ?>" name="id">
    </div>

    <div class="form-group">
    <label for="Link">Link</label>
    <input type="url" class="form-control" name="link">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form> 
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

</body>
</html>