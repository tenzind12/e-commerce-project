<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
    class Category {
        private $db;
        private $fm;

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();            
        }

        // Inserting category name into Database
        public function catInsert($catName) {
            $catName = $this->fm->validation($catName);

            if(empty($catName)) {
                $msg = "<p class='text-danger'>Category name is empty.</p>";
                return $msg;
            }

            $query = "INSERT INTO tbl_category (catName) VALUES ('$catName')";
            $catInsert = $this->db->insert($query);

            if($catInsert) {
                $msg = "<p class='text-success'>Category inserted successfully</p>";
                return $msg;
            }else {
                $msg = "<p class='text-danger'>Category insertion failed!</p>";
                return $msg;
            }
        }

        // Reading category list
        public function getAllCat() {
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        // Update Category by ID
        public function getCatById($id) {
            $query = "SELECT * FROM tbl_category WHERE catId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function catUpdate($catName, $id) {
            $catName = $this->fm->validation($catName);
            if(empty($catName)) {
                $msg = "<p class='text-danger'>Category name empty!</p>";
                return $msg;
            }
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id' ";
            $updateCat = $this->db->update($query);
            if($updateCat) {
                $msg = "<p class='text-success'>Category updated successfully.</p>";
                return $msg;
            }else {
                $msg = "<p class='text-danger'>Category not updated!</p>";
                return $msg;
            }
        }

        public function delCatById($id) {
            $query = "DELETE FROM tbl_category WHERE catId = '$id' ";
            $deleteCat = $this->db->delete($query);
            if($deleteCat) {
                $msg = "<p class='text-success'>Category deleted successfully.</p>";
                return $msg;
            }else {
                $msg = "<p class='text-danger'>Category deletion failed!</p>";
                return $msg;
            }
        }
    }

?>