<?php

    require_once __DIR__ . '/connection.php';
    require_once __DIR__ . '/model.php';

    class ModelPembayaran extends Model{
        protected static $table_name = "model_pembayaran";
        protected static $columns = [
            'id_model',
            'metode',
            'keterangan'
        ];

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

    }

?>