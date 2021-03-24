<?php include "includes/init.php"; ?>
<?php 

global $database;
$result = $database->query("UPDATE `statues` SET `st` = '1' WHERE `statues`.`id` = 1;");
redirect("index.php");
?>