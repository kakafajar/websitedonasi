<?php

    require_once __DIR__ . '/connection.php';
    require_once __DIR__ . '/model.php';

    class Transaksi{
        protected $id;
        protected $donatur;
        protected $idmodel;
        protected $jumlah;
        protected $pesan;
        protected $tanggal;


        function __construct($id, $donatur, $idmodel, $jumlah, $pesan, $tanggal){
            $this->id = $id;
            $this->donatur = $donatur;
            $this->idmodel = $idmodel;
            $this->jumlah = $jumlah;
            $this->pesan = $pesan;
            $this->tanggal = $tanggal;
        }


        public static function from_array($array){
            return new Transaksi(
                $array[0],
                $array[1],
                $array[2],
                $array[3],
                $array[4],
                $array[5]
            );
        }


        function get_id(){
            return $this->id;
        }

        
        function get_donatur(){
            return $this->donatur;
        }


        function get_idmodel(){
            return $this->idmodel;
        }


        function get_jumlah(){
            return $this->jumlah;
        }


        function get_pesan(){
            return $this->pesan;
        }


        function get_tanggal(){
            return $this->tanggal;
        }

        
        public static function get($id){
            global $conn;
            $transaction = null;

            $result = $conn->query("SELECT * FROM transaksi WHERE id=$id");
            if ($result->num_rows > 0){
                $rawdata = $result->fetch_all();

                $transaction = Transaksi::from_array($rawdata);
            }

            return $transaction;
        }


        public static function get_all(){
            global $conn;
            $transactions = null;

            $result = $conn->query("SELECT * FROM transaksi");
            if ($result->num_rows > 0){
                $rawdatas = $result->fetch_all();
                
                foreach ($rawdatas as $rawdata){
                    $transactions[] = Transaksi::from_array($rawdata);
                }
            }

            return $transactions;
        }
    }

?>