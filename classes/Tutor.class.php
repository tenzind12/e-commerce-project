<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
?>

<?php
    class Tutor {
        private $db;
        private $fm;

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();            
        }

        // Inserting tutor name into Database
        public function tutorInsert($tutorName) {
            $tutorName = $this->fm->validation($tutorName);

            if(empty($tutorName)) {
                $msg = "<p class='text-danger'>Tutor name is empty.</p>";
                return $msg;
            }

            $query = "INSERT INTO tbl_tutor (tutorName) VALUES ('$tutorName')";
            $tutorInsert = $this->db->insert($query);

            if($tutorInsert) {
                $msg = "<p class='text-success'>Tutor inserted successfully</p>";
                return $msg;
            }else {
                $msg = "<p class='text-danger'>Tutor insertion failed!</p>";
                return $msg;
            }
        }

        // Reading tutor list
        public function getAllTutor() {
            $query = "SELECT * FROM tbl_tutor ORDER BY tutorId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        // Updating tutor by id
        public function getTutorById($id) {
            $query = "SELECT * FROM tbl_tutor WHERE tutorId = '$id' ";
            $result = $this->db->select($query);
            return $result; 
        }

        public function updateTutor($tutorName, $id) {
            $tutorName = $this->fm->validation($tutorName);

            if(empty($tutorName)) {
                $msg = "<p class='text-danger'>Tutor name empty!</p>";
                return $msg;
            }

            $query = "UPDATE tbl_tutor SET tutorName = '$tutorName' WHERE tutorId = '$id' ";
            $result = $this->db->update($query);
            if($result) {
                $msg = "<p class='text-success'>Tutor updated successfully.</p>";
                return $msg;
            }else {
                $msg = "<p class='text-danger'>Tutor not updated!</p>";
                return $msg;
            }
        }

        // To delete tutor
        public function deleteTutorById($id) {
            $query = "DELETE FROM tbl_tutor WHERE tutorId = '$id' ";
            $result = $this->db->delete($query);
            if($result) {
                $msg = "<p class='text-success'>Tutor deleted successfully.</p>";
                return $msg;
            }else {
                $msg = "<p class='text-error'>Tutor not deleted!</p>";
                return $msg;
            }
        }
    }

?>