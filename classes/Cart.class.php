<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>
<?php
class Cart {
    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addToCart($quantity, $id) {
        $quantity = $this->fm->validation($quantity);
        $session_id = session_id();

        // GET ALL DATA FROM tbl_course
        $squery = "SELECT * FROM tbl_course WHERE courseId = '$id' ";
        $result = $this->db->select($squery)->fetch();
            $courseName = $result['courseName'];
            $image = $result['image'];
            $price = $result['price'];
            $date = date('Y-m-d');
        
        $query = "INSERT INTO `tbl_cart`(`amount`, `quantity`, `date_cart`, `sessionId`, `image`, `courseId`, `courseName`)
                  VALUES ('$price','$quantity','$date','$session_id','$image','$id','$courseName' )";
        $inserted_row = $this->db->insert($query);

        if($inserted_row) header('location: cart.php');
        else header('Location: 404.php');

    }

    

}

?>