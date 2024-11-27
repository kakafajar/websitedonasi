<?php

    require_once __DIR__ . '/connection.php';
    require_once __DIR__ . '/model.php';
    require_once __DIR__ . '/modelpembayaran.php';

    class Transaksi extends Model{
        protected static $table_name = "transaksi";
        protected static $columns = [
            'transaksi_id',
            'donatur',
            'id_model',
            'jumlah',
            'pesan',
            'tanggal'
        ];
        
        protected $donatur;
        protected $idmodel;
        protected $model;
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

        function get_model(){
            if ($this->model == null){
                $model = ModelPembayaran::get($this->get_idmodel());
            }
            return $model;
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

    }

?>