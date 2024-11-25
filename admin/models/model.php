<?php

    require_once __DIR__ . '/connection.php';

    class Model{
        protected $id;
        protected static $table_name = "";

        function __construct($id){
            $this->id = $id;
        }

        function get_id(){
            return $this->id;
        }

        public static function from_array($array){
            return new static($array[0]);
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
    }

?>