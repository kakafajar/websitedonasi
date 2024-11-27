<?php
    require_once __DIR__ . '/connection.php';
    require_once __DIR__ . '/model.php';

    class User extends Model{
        protected static $table_name = "users";
        protected static $columns = [
            'id',
            'username',
            'password',
        ];

        protected $username;
        protected $password;

        function __construct($id, $username, $password){
            $this->id=$id;
            $this->username=$username;
            $this->password=$password;
        }

        public static function from_array($array){
            return new User(
                $array[0],
                $array[1],
                $array[2]
            );
        }

        function get_username(){
            return $this->username;
        }

        function get_password(){
            return $this->password;
        }

        function get_role(){
            return $this->role;
        }
        
    }

?>