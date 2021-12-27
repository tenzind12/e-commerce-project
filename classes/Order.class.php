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

        public function getAllCourse($cliendId) {
            $query = "SELECT tbl_course.*, tbl_order.* 
                    FROM tbl_course 
                    INNER JOIN tbl_order 
                    ON tbl_order.courseId = tbl_course.courseId 
                    WHERE tbl_order.clientId = '$cliendId'";
            $result = $this->db->select($query);
            return $result;
        }

        
    }

?>