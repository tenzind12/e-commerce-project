<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
    class Order {
        private $db;
        private $fm;

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function addToOrder($courseId, $clientId) {
            $query = "INSERT INTO tbl_order VALUES (null, '$courseId', '$clientId')";
            $this->db->insert($query);
            echo "<script>location.reload()</script>";
        }

        
    }

?>