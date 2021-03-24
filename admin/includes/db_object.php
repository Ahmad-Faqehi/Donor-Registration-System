<?php

class Db_object{

    public static function find_all(){

        return static::find_by_query("SELECT * FROM ". static::$db_table. " ");

    }


    
    public static function find_last_five(){

        return static::find_by_query("SELECT * FROM ". static::$db_table. " ORDER BY `hashtag`.`id` DESC ");

    }

    public static function find_by_tag($search){

        return static::find_by_query("SELECT * FROM ". static::$db_table. " WHERE hashtag_name LIKE '{$search}%' LIMIT 1 ");

    }

    public function total_numbers()
    {
        global $database;
        return mysqli_num_rows($database->query("SELECT * FROM ". static::$db_table.""));
    }

    public function total_money()
    {
        global $database;
       $result = $database->query("SELECT SUM(money) AS value_sum  FROM ". static::$db_table." WHERE pay = 1");
       $row = mysqli_fetch_assoc($result); 
       $sum = $row['value_sum']; 
       return $sum;
    }
        public function total_money_not()
    {
        global $database;
       $result = $database->query("SELECT SUM(money) AS value_sum  FROM ". static::$db_table."");
       $row = mysqli_fetch_assoc($result); 
       $sum = $row['value_sum']; 
       return $sum;
    }

    public function states()
    {
        global $database;
       $result = $database->query("SELECT st FROM statues WHERE id = 1");
       $row = mysqli_fetch_assoc($result); 
       $sum = $row['st']; 
       return $sum;
    }

    public function total_number_search($search)
    {
        global $database;
        return mysqli_num_rows($database->query("SELECT * FROM ". static::$db_table." WHERE hashtag_name LIKE '{$search}%'"));
    }


    public static function find_by_query($sql){

        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = static::instantation($row);
        }
        return $the_object_array;
    }


    public static function find_by_id($id){
        global $database;
        $the_result_array = static::find_by_query("SELECT * FROM ". static::$db_table. " WHERE id = $id");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }



    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute,$object_properties);
    }


    public static function instantation($the_recoder){

        $calling = get_called_class();
        $the_object = new $calling;

        foreach ($the_recoder as $the_attribute => $value){

            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }

        }
        return $the_object;
    }


    protected function clean_properties() {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }


    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        $properties = $this->clean_properties();
        global $database;
        $sql  ="INSERT INTO " . static::$db_table . " (" . implode(",",array_keys($properties)) .  ")";
        $sql .= "VALUES('" . implode("','" , array_values($properties)) . "')";


        if($database->query($sql)):
            $this->id = $database->the_insert_id();
            return true;
        else:
            return false;
        endif;

    }


    public function update(){

        $prperties= $this->clean_properties();
        $prperties_paris = array();

        foreach ($prperties as $key => $value){
            $prperties_paris[] = "{$key} = '{$value}'";

        }
        global $database;
        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $prperties_paris);
        $sql .= "WHERE id= ". $database->escape_string($this->id);
        $database->query($sql);

    }


    public function delete(){
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " " ;
        $sql .= "WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false ;
    }


    protected function properties(){

        $prperties = array();
        foreach (static::$db_table_fields as $db_fields){

            if(property_exists($this,$db_fields )){

                $prperties[$db_fields] = $this->$db_fields;

            }

        }
        return $prperties;
    }

}
