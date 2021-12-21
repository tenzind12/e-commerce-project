<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../helpers/Format.php');
 include_once ($filepath.'/../lib/Database.php');
?>

<?php 

class Course {
    private $db;
    private $fm;

    public function __construct() { 
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function courseInsert($data, $file) {
        $courseName = $this->fm->validation($data['courseName']);
        $tutorId    = $this->fm->validation($data['tutorId']);
        $catId      = $this->fm->validation($data['catId']);
        $description = $this->fm->validation($data['description']);
        $price      = $this->fm->validation($data['price']);
        $courseType = $this->fm->validation($data['courseType']);

        $img_name = $file['image']['name'];
        $img_size = $file['image']['size'];
        $img_tmp  = $file['image']['tmp_name'];
        
        // to get the image extension 
        $explodeImgName = explode('.', $img_name);
        $extension      = strtolower(end($explodeImgName));
        
        if($courseName == "" || $tutorId == "" || $catId == "" || $price == "" || $description == "" || $courseType == "" ) {
            $msg = "<p class='text-danger'>Fields cannot be empty!</span>";
            return $msg;
        }
        
        // verification of image format & size
        $allowedImages = ['jpg', 'jpeg', 'gif', 'png'];
        if(!in_array($extension, $allowedImages)) {
            $msg = "<p class='text-danger'>Image supported ( ".implode(', ', $allowedImages)." )</p>";
            return $msg;
        }
        if($img_size > 1048576) {
            $msg = "<p class='text-danger'>Image size should be less than 1MB</p>";
            return $msg;
        }


        // renaming images with md5() and time
        $uniqueImgName = substr(md5(time()), 0, 10) . '.' .$extension;
        $newImgLocation = 'upload/'.$uniqueImgName;
        
        move_uploaded_file($img_tmp, $newImgLocation);
        $query = "INSERT INTO tbl_course(`courseName`, `image`, `imageSize`, `imageType`, `tutorId`, `catId`, `price`, `courseType`, `description`)
            VALUES ('$courseName', '$newImgLocation', '$img_size', '$extension', '$tutorId', '$catId', '$price', '$courseType', '$description')";

        $insert_row = $this->db->insert($query);

        if($insert_row) {
            $msg = "<p class='text-success'>Course inserted successfully</p>";
            return $msg;
        }else {
            $msg = "<p class='text-danger'>Course insertion failed!</p>";
            return $msg;
        }
    }

    // Get all courses inner join tbl_tutor and tbl_category ///////////////////////////////////////////////////////
    public function getAllCourse() {
        $query = "SELECT tbl_course.*, tbl_tutor.tutorName, tbl_category.catName
                  FROM tbl_course
                  INNER JOIN tbl_tutor
                  ON tbl_course.tutorId = tbl_tutor.tutorId
                  INNER JOIN tbl_category
                  ON tbl_course.catId = tbl_category.catId
                  ORDER BY tbl_course.courseId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    // Get course by id ///////////////////////////////////////////////////////
    public function getCourseById($id) {
        $query = "SELECT * FROM tbl_course WHERE courseId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    // Update course ///////////////////////////////////////////////////////
    public function updateCourse($data, $file, $id) {
        $courseName = $this->fm->validation($data['courseName']);
        $catId = $this->fm->validation($data['catId']);
        $tutorId = $this->fm->validation($data['tutorId']);
        $description = $this->fm->validation($data['description']);
        $price = $this->fm->validation($data['price']);
        $courseType = $this->fm->validation($data['courseType']);

        if($courseName == "" || $catId == "" || $tutorId == "" || $description == "" || $price == "" || $courseType == "") {
            $msg = "<p class='text-danger'>All the fields should be filled</p>";
            return $msg;
        }

        // image files
        $img_name = $file['image']['name'];
        $img_size = $file['image']['size'];
        $img_tmp = $file['image']['tmp_name'];

        // verification of image
        $explodeImgName = explode('.', $img_name);
        $extension = strtolower(end($explodeImgName));
        $allowedImages = ['jpg', 'jpeg', 'png', 'gif'];
        

        $uniqueImgName = substr(md5(time()), 0, 10) . "." . $extension;
        $newImgLocation = "upload/".$uniqueImgName;
        move_uploaded_file($img_tmp, $newImgLocation);

        
        // If new image is uploaded %%%%%
        if($img_size > 0) {
            if(!in_array($extension, $allowedImages)) {
                $msg = "<p class='text-danger'>Image supported ( ".implode(', ', $allowedImages)." )</p>";
                return $msg;
            }
            if($img_size > 1048576) {
                $msg = "<p class='text-danger'>Image size should be less than 1MB</p>";
                return $msg;
            }
            $query = "UPDATE tbl_course SET courseName = '$courseName',
                        `image`= '$newImgLocation', imageSize = '$img_size',
                        imageType = '$extension', tutorId = '$tutorId',
                        catId = '$catId', price = '$price', courseType = '$courseType',
                        `description` = '$description'
                      WHERE courseId = '$id' ";

            $updateCourse = $this->db->update($query);
            if($updateCourse) {
                $msg = "<p class='text-success'>Course updated successfully</p>";
                return $msg;
            }else {
                $msg = "<p class='text-danger'>Update failed !</p>";
                return $msg;
            }
        }
            
        // If no new image is uploaded %%%
        $query = "UPDATE tbl_course SET courseName = '$courseName', 
                    tutorId = '$tutorId', catId = '$catId', price = '$price', 
                    courseType = '$courseType', `description` = '$description' 
                  WHERE courseId = '$id' ";
        $updateCourse = $this->db->update($query);
            
        if($updateCourse) {
            $msg = "<p class='text-success'>Course updated successfully</p>";
            return $msg;
        }else {
            $msg = "<p class='text-danger'>Update failed !</p>";
            return $msg;
        }
    }

    // Delete course///////////////////////////////////////////////////////
    public function deleteCourse($id) {
        // Delete image from 'UPload' folder
        $imgQuery = "SELECT * FROM tbl_course WHERE courseId = '$id' ";
        $getImage = $this->db->select($imgQuery);
        if($getImage) while($rows = $getImage->fetch()) unlink($rows['image']);

        $query = "DELETE FROM tbl_course WHERE courseId = '$id' ";
        $delCourse = $this->db->delete($query);
        if($delCourse) {
            $msg = "<p class='text-success'>Course deleted successfully</p>";
            return $msg;
        }else {
            $msg = "<p class='text-danger'>Course deletion successfully</p>";
            return $msg;
        }
    }

    /*--------------------THE CLIENT SIDE COURSE FUNCTIONS---------------------------------------------------------- */

    // GET FEATURED COURSE ///
    public function getFeaturedCourse() {
        $query = "SELECT * FROM tbl_course WHERE courseType = 0 ORDER BY courseId LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    // GET NEW COURSES
    public function getNewCourse() {
        $query = "SELECT * FROM tbl_course ORDER BY courseId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    // GET COURSE BY courseId
    public function getSingleCourse($id) {
        $query = "SELECT tbl_course.*, tbl_category.catName, tbl_tutor.tutorName
                FROM tbl_course
                INNER JOIN tbl_category
                ON tbl_course.catId = tbl_category.catId
                INNER JOIN tbl_tutor
                ON tbl_course.tutorId = tbl_tutor.tutorId
                AND tbl_course.courseId = '$id'
                ORDER BY tbl_course.courseId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    // getting course by courseName
    public function getCourseByName($courseName) {
        $query = "SELECT * FROM tbl_course WHERE courseName = '$courseName'";
        $result = $this->db->select($query);
        return $result;
    }
}