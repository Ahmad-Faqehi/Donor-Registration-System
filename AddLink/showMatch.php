<?php 

$string = file_get_contents("apiSecc.json");

$json_a = json_decode($string, true);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <title>All Matches</title>
    <style>
        
        input {
            width: 10px;
            }

    </style>
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
        <div class="pt-2"></div>
    <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">Host</th>
      <th scope="col">Goust</th>
      <th scope="col">Copy</th>
      <th scope="col">Add Link</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  
  $site = "http://table.super-kora.tv/img/";

  foreach ($json_a as $person_name) {

    $id = $person_name['id'];
    $t1 =  $person_name['logoHost_Name'];
    $t1_logo =  $person_name['logoHost_logo'];
    $t2 =  $person_name['logoGuest_Name'];
    $t2_logo =  $person_name['logoGuest_logo'];
    $time = $person_name['date_match'];
    $timematch = $person_name['timematch'];
    $endtime = $person_name['endtime'];
    $copmt = $person_name['copmt'];
    $comme = $person_name['comme'];
    $chan = $person_name['chan'];
    $gameStatus = $person_name['gameStatus'];

    $url = $person_name['URL'];

    if($person_name['logoHost_Src'] !== 'url' ){
      $t1_logo = $site . $person_name['logoHost_logo'];
    }

    if($person_name['logoGuest_Src'] !== 'url' ){
      $t2_logo = $site . $person_name['logoGuest_logo'];
    }


  ?>

    <tr>
      <td><?=$t1?></td>

      <td><?=$t2?></td>
      <td><input type="text" id="myInput<?=$id?>" value="<?=$id?>"> <button onclick="myFunction(<?=$id?>)" class="btn btn-dark">Copy</button></td>
      <td><a href="AddLink.php?id=<?=$id?>">Add Custome Link</a></td>
    </tr>   

<?php } ?>

  </tbody>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
<script>
function myFunction(id) {
  /* Get the text field */
  var copyText = document.getElementById("myInput"+id);

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}

</script>
</body>
</html>
