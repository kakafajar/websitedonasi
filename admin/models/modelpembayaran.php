<?php

    require_once 'connection.php';

    class ModelPembayaran{
        protected $id;
        protected $nama;
        protected $keterangan;


        function __construct($id, $nama, $keterangan){
            $this->id = $id;
            $this->nama = $nama;
            $this->keterangan = $keterangan;
        }


        public static function from_array($array){
            return new ModelPembayaran(
                $array[0],
                $array[1],
                $array[2],
            );
        }


        function get_id(){
            return $this->id;
        }

        
        function get_nama(){
            return $this->nama;
        }


        function get_keterangan(){
            return $this->keterangan;
        }


        public static function get($id){
            global $conn;
            $modelpembayaran = null;

            $result -> $conn->query("SELECT * FROM model_pembayaran WHERE id_model=$id");
            if ($result->num_rows > 0){
                $rawdata = $result->fetch_all();

                $modelpembayaran = ModelPembayaran::from_array($rawdata);
            }

            return $modelpembayaran;
        }


        public static function get_all(){
            global $conn;
            $modelpembayarans = null;

            $result = $conn->query("SELECT * FROM model_pembayaran");
            if ($result->num_rows > 0){
                $rawdatas = $result->fetch_all();
                
                foreach ($rawdatas as $rawdata){
                    $modelpembayarans[] = ModelPembayaran::from_array($rawdata);
                }
            }

            return $modelpembayarans;
        }


    }

?>