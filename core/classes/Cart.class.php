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

        // GET ALL DATA FROM tbl_course with courseId that we get on preview.php?id=
        $selectQuery = "SELECT * FROM tbl_course WHERE courseId = '$id' ";
        $result = $this->db->select($selectQuery)->fetch();
            $courseName = $result['courseName'];
            $image = $result['image'];
            $price = $result['price'];
            $date = date('Y-m-d');

        // CHECK DATABASE TO SEE IF CUSTOMER ORDER SAME THING AGAIN 
        $checkQuery = "SELECT * FROM tbl_cart WHERE courseId = '$id' AND sessionId = '$session_id' ";
        $checkResult = $this->db->select($checkQuery);
        if($checkResult) {
            $msg = "<p class='text-danger mt-2'>The course is already added to the cart !</p>";
            return $msg;
        }
        
        $finalQuery = "INSERT INTO `tbl_cart`(`amount`, `quantity`, `date_cart`, `sessionId`, `image`, `courseId`, `courseName`)
                  VALUES ('$price','$quantity','$date','$session_id','$image','$id','$courseName' )";
        $inserted_row = $this->db->insert($finalQuery);

        if($inserted_row) echo "<script>window.location='cart.php';</script>";
        else echo "<script>window.location='404.php';</script>";

    }

    // getting the cart by session id
    public function getAllCart() {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sessionId = '$sId' ";
        $result = $this->db->select($query);
        return $result;
    }

    // updating the qty of course in cart
    public function updateQty($cartId, $quantity) {
        $cartId = $this->fm->validation($cartId);
        $quantity = $this->fm->validation($quantity);
        $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
        $updateCart = $this->db->update($query);

        if($updateCart) {
            // i use this to update the value in cart menu
            echo "<script>window.location='cart.php';</script>";
        }else {
            $msg = "<p class='text-danger text-left'>Course quantity could not be updated !</p>";
            return $msg;
        }
    }

    // deleting the course from cart
    public function deleteCart($cartId) {
        $query = "DELETE FROM tbl_cart WHERE cartId = '$cartId'";
        $deleteCart = $this->db->delete($query);
        if($deleteCart) {
            echo "<script>window.location = 'cart.php'; </script>";
        }else {
            $msg = "<p class='text-danger text-left'>Course could not be removed !</p>";
            return $msg;
        }
    }

    public function delAllCart() {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sessionId = '$sId' ";
        $this->db->delete($query);
    }
}

?>