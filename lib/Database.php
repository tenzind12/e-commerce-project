<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../config/config.php');
?>
<?php

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbName = DB_NAME;

        public $link;
        public $error;

        public function __construct() {
            $this->connectDB();
        }

        // connection to database with PDO
        private function connectDB() {
            $dsn = 'mysql:host=' .$this->host. ';dbname=' .$this->dbName;
            $this->link = new PDO($dsn, $this->user, $this->pass);
            $this->link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            if(!$this->link) {
                $this->error = "Connection to the database Failed";
                return false;
            }
        }

        // Reading datas from database
        public function select($query) {
            $result = $this->link->query($query) or die($this->link->errorCode());
            if($result->rowCount() > 0) return $result;
            else return false;
        }

        // Inserting datas into database
        public function insert($query) {
            $insert_row = $this->link->prepare($query);
            $insert_row->execute([$query]);
            if($insert_row) return $insert_row;
            else return false;
        }

        public function update($query) {
            $update_row = $this->link->prepare($query);
            $update_row->execute([$query]);
            if($update_row) return $update_row;
            else return false;
        }

        // Deleting data from database
        public function delete($query) {
            $delete_row = $this->link->prepare($query);
            $delete_row->execute([$query]);
            return $delete_row;
        }
    }