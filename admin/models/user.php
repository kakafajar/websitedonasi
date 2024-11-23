<?php

    require_once 'connection.php';

    class User{
        protected $id;
        protected $username;
        protected $password;
        protected $role;


        function __construct($id, $username, $password, $role){
            $this->id=$id;
            $this->username=$username;
            $this->password=$password;
            $this->role=$role;
        }


        public static function from_array($array){
            return new User(
                $array[0],
                $array[1],
                $array[2],
                $array[3]
            );
        }


        function get_id(){
            return $this->id;
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


        public static function get($id){
            global $conn;
            $user = null;

            $result = $conn->query("SELECT * FROM users WHERE id=$id");
            if ($result->num_rows > 0){
                $rawdata = $result->fetch_all();

                $user = User::from_array($rawdata);
            }

            return $user;
        }


        public static function get_all(){
            global $conn;
            $users = null;

            $result = $conn->query("SELECT * FROM users");
            if ($result->num_rows > 0){
                $rawdatas = $result->fetch_all();
                
                foreach ($rawdatas as $rawdata){
                    $users[] = User::from_array($rawdata);
                }
            }

            return $users;
        }
    }

?>