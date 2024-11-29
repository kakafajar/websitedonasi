<?php

    require_once __DIR__ . '/connection.php';

    class Model{
        protected $id;
        protected static $table_name = "";
        protected static $columns = [];

        function __construct($id){
            $this->id = $id;
        }

        function get_id(){
            return $this->id;
        }

        public static function from_array($array){
            return new static($array[0]);
        }

        public static function get($id){
            global $conn;
            $data = null;

            $result = $conn->query("SELECT * FROM " . static::$table_name . " WHERE " . static::$columns[0] . "=$id");
            if ($result->num_rows > 0){
                $rawdata = $result->fetch_all()[0];

                $data = static::from_array($rawdata);
            }

            return $data;
        }
        
        public static function get_all(){
            global $conn;
            $datas = [];
            
            $query = $conn->query("SELECT * FROM " . static::$table_name);
            if ($query->num_rows > 0){
                foreach ($query->fetch_all() as $raw_data){
                    $datas[] = static::from_array($raw_data);
                }
            }
            
            return $datas;
        }

        public static function insert($array){
            global $conn;
            
            $formatted_array = "'" . implode("','", $array) . "'";
            $sql = "INSERT INTO " . static::$table_name . " VALUES (null, $formatted_array )";
            
            $query = $conn->query($sql);
        }

        public static function update($id, $array){
            global $conn;
            
            $set_params = [];
            for ($i=1; $i < count(static::$columns); $i++) { 
                $column = static::$columns[$i];
                $arrayitem = $array[$i-1];
                if ($arrayitem != null){
                    $set_params[] = "$column='$arrayitem'";
                }
            }
            $sql = "UPDATE " . static::$table_name . " SET " . implode(',', $set_params) . " WHERE " . static::$columns[0] .  "=$id ";
            $query = $conn->query($sql);
        }

        public static function delete($id){
            global $conn;

            $sql = "DELETE FROM " . static::$table_name . " WHERE " . static::$columns[0] . "=$id";
            $query = $conn->query($sql);
        }

    }

?>