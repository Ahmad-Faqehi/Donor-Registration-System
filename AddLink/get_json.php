<?php


$data = file_get_contents('http://table.super-kora.tv/tmp/cacheid/fel.php');
file_put_contents('apiSecc.json', $data);

?>