<?php
require_once ("config.php");

class Info extends Db_object{
    protected static $db_table = "info";
    protected static $db_table_fields = array("id","name" , "money", "pay");
    public $id;
    public $name;
    public $money;
    public $pay;

    public function check_roal(){

        if($this->pay == 1){
            echo '<div class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></div>';
        }else{
            echo '<div class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></div>';
        }

    }
    public function check_name($name){

        global $database;
 $name = $database->escape_string($name);
       $sql = $database->query("SELECT * FROM ". static::$db_table. " WHERE name = '$name'");

       return mysqli_num_rows($sql);

    }
}