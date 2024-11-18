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
            $user = null;
            if ($result -> $conn->query("SELECT * FROM users WHERE id=$id")){
                $rawdata = $result->fetch_all();

                $user = new User(
                    $rawdata['id'],
                    $rawdata['username'],
                    $rawdata['password'],
                    $rawdata['role']
                );
            }

            return $user;
        }


        public static function get_all(){
            global $conn;
            $users = null;
            if ($result = $conn->query("SELECT * FROM users")){
                $rawdatas = $result->fetch_all();
                
                foreach ($rawdatas as $rawdata){
                    $users[] = new User(
                        $rawdata[0],
                        $rawdata[1],
                        $rawdata[2],
                        $rawdata[3]
                    );
                }
            }

            return $users;
        }
    }

?>