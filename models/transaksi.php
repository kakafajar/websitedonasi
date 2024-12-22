<?php

    require_once __DIR__ . '/connection.php';
    require_once __DIR__ . '/model.php';
    require_once __DIR__ . '/modelpembayaran.php';

    class Transaksi extends Model{
        protected static $table_name = "transaksi";
        protected static $columns = [
            'transaksi_id',
            'donatur',
            'email',
            'no_hp',
            'id_model',
            'jumlah',
            'pesan',
            'bukti_transfer',
            'status',
            'tanggal'
        ];
        
        protected $donatur;
        protected $idmodel;
        protected $email;
        protected $no_hp;
        protected $model;
        protected $jumlah;
        protected $pesan;
        protected $bukti_transfer;
        protected $status;
        protected $tanggal;

        function __construct($id, $donatur, $email, $no_hp, $idmodel, $jumlah, $pesan, $bukti_transfer, $status, $tanggal){
            $this->id = $id;
            $this->donatur = $donatur;
            $this->email = $email;
            $this->no_hp = $no_hp;
            $this->idmodel = $idmodel;
            $this->jumlah = $jumlah;
            $this->pesan = $pesan;
            $this->bukti_transfer = $bukti_transfer;
            $this->status = $status;
            $this->tanggal = $tanggal;
        }

        public static function from_array($array){
            return new Transaksi(
                $array[0],
                $array[1],
                $array[2],
                $array[3],
                $array[4],
                $array[5],
                $array[6],
                $array[7],
                $array[8],
                $array[9]
            );
        }


        function get_id(){
            return $this->id;
        }

        
        function get_donatur(){
            return $this->donatur;
        }

        function get_email(){
            return $this->email;
        }

        function get_no_hp(){
            return $this->no_hp;
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

        function get_bukti_transfer(){
            return $this->bukti_transfer;
        }

        function get_status(){
            return $this->status;
        }

        function get_tanggal(){
            return $this->tanggal;
        }

        public static function get_from_date_range($from, $to=''){
            global $conn;
            $datas = [];

            if ($to != ''){
                if ($from != ''){
                    $sql = "SELECT * FROM transaksi WHERE tanggal BETWEEN '$from' AND '$to'";
                }
                else{
                    $sql = "SELECT * FROM transaksi WHERE tanggal <= '$to'";
                }
            } else{
                $sql = "SELECT * FROM transaksi WHERE tanggal >= '$from'";
            }
            $query = $conn->query($sql);
            if ($query->num_rows > 0){
                foreach ($query->fetch_all() as $raw_data){
                    $datas[] = static::from_array($raw_data);
                }
            }

            return $datas;
        }

        public static function update_status_from_array($ids, $status){
            global $conn;
            
            $ids_imploded = implode(',', $ids);
            
            $sql = "UPDATE transaksi SET status='$status' WHERE transaksi_id IN ($ids_imploded)";
            $query = $conn->query($sql);
        }

    }

?>