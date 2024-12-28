<?php

    require_once __DIR__ . '/connection.php';
    require_once __DIR__ . '/model.php';
    require_once __DIR__ . '/transaksi.php';

    class ModelPembayaran extends Model{
        protected static $table_name = "model_pembayaran";
        protected static $columns = [
            'id_model',
            'metode',
            'keterangan',
            'is_deleted'
        ];

        protected $id;
        protected $nama;
        protected $keterangan;
        protected $is_deleted;
        protected $transaksi = [];

        function __construct($id, $nama, $keterangan, $is_deleted){
            $this->id = $id;
            $this->nama = $nama;
            $this->keterangan = $keterangan;
            $this->is_deleted = $is_deleted;
        }

        public static function from_array($array){
            return new ModelPembayaran(
                $array[0],
                $array[1],
                $array[2],
                $array[3]
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

        function get_is_deleted(){
            return $this->is_deleted;
        }

        function get_transaksi(){
            global $conn;

            if (count($this->transaksi) <= 0){
                $sql = "SELECT * FROM transaksi where id_model =" . $this->get_id();
                $query = $conn->query($sql);
                if ($query->num_rows > 0){
                    foreach ($query->fetch_all() as $raw_data){
                        $this->transaksi[] = Transaksi::from_array($raw_data);
                    }
                }

                // if (! $query){
                //     throw new Exception($conn->error);
                // }
            }

            return $this->transaksi;
        }

        public static function get_all_active(){
            global $conn;

            $datas = [];

            $sql = "SELECT * from model_pembayaran where is_deleted='0'";
            $query = $conn->query($sql);
            if ($query->num_rows > 0){
                foreach ($query->fetch_all() as $raw_data){
                    $datas[] = static::from_array($raw_data);
                }
            }

            if (! $query){
                throw new Exception($conn->error);
            }
            return $datas;
        }

        public static function delete_safe($id){
            global $conn;

            $model = ModelPembayaran::get($id);
            $sql = "DELETE FROM model_pembayaran WHERE id_model=$id";
            if (count($model->get_transaksi()) > 0){
                $sql = "UPDATE model_pembayaran SET is_deleted='1' WHERE id_model=$id";
            }

            $query = $conn->query($sql);
            
            if (! $query){
                throw new Exception($conn->error);
            }
        }

        public static function delete_safe_from_array($ids){
            foreach ($ids as $id) {
                ModelPembayaran::delete_safe($id);
            }
        }

    }

?>