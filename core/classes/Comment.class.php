<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
    class Comment {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insertData($name, $phone, $rating, $comment) {
            $name    = $this->fm->validation($name);
            $phone   = $this->fm->validate_phone_number($phone);
            $comment = $this->fm->validation($comment);
            $rating  = (int)$rating;

            if($phone == false) {
                $msg = "<p class='text-danger'>Please check the phone number</p>";
                return $msg;
            }

            if(empty($name) || empty($phone) || empty($comment)) {
                $msg = "<p class='text-danger'>Please check the fieds again</p>";
                return $msg;
            }


            $query = "INSERT INTO tbl_comment VALUES (null,'$name', '$phone', '$rating', '$comment')";
            $commentInsert = $this->db->insert($query);

            if($commentInsert) {
                $msg = "<p class='text-success'>Comment accepted!</p>";
                return $msg;
            } else {
                $msg = "<p class='text-danger'>Comment could not be registered! Please try again</p>";
                return $msg;
            }
        }

        public function getComments() {
            $query  = "SELECT * FROM tbl_comment ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }
    }