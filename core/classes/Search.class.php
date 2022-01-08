<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../helpers/Format.php');
 include_once ($filepath.'/../lib/Database.php');
?>

<?php
    class Search {
        private $db;
        private $fm;

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function searchTutorAndCourse($value) {
            $value = $this->fm->validation($value);
            $initQuery      = "SELECT tbl_tutor.*, tbl_course.* 
                                FROM tbl_tutor 
                                INNER JOIN tbl_course 
                                ON tbl_tutor.tutorId = tbl_course.tutorId 
                                WHERE tbl_tutor.tutorName 
                                LIKE '%$value%' 
                                OR 
                                tbl_course.courseName 
                                LIKE '%$value%'";
            $tutorAndCourse = $this->db->select($initQuery);
            return $tutorAndCourse;
        }
    }
?>